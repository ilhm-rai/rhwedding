<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Libraries\Pdf;
use App\Models\CartModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\NotificationModel;
use App\Models\ProductModel;
use Dompdf\Dompdf;

class Order extends BaseController
{

    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $transactionModel;
    protected $transDetailModel;
    protected $cartModel;
    protected $notificationModel;
    protected $productModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->cartModel = new CartModel();
        $this->notificationModel = new NotificationModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Order & Shop',
            'active' => 'vendor_order',
            'trans' => $this->transactionModel->getMyVendorTransaction(),
        ];
        // dd($data);
        return view('transaction/order/index', $data);
    }

    public function confirm($code)
    {
        $data = [
            'title'  => 'Detail Order',
            'active' => 'vendor_order',
            'trans' => $this->transactionModel->getTransBy($code),
            'detail' => $this->transactionModel->getTransDetailBy($code),
        ];
        // dd($data);
        return view('transaction/order/confirm', $data);
    }

    public function accept($id)
    {
        $code = $this->request->getVar('code');
        $userId = $this->request->getVar('user-id');
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 1,
            'reason_reject' => null
        ]);
        $order = $this->transDetailModel->getDetailTransBy($id);
        // kirim notifikasi kepada pembeli
        $this->notificationModel->save([
            'user_id' => $userId,
            'message' => 'Order for ' . $order['product_name'] . ' has been approved',
            'link' => '/order/' . $code
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Accepted');
        return redirect()->to('/vendors/transaction/confirm/' . $code);
    }

    public function reject()
    {
        $id = $this->request->getVar('detail-id');
        $code = $this->request->getVar('code');
        $reason = $this->request->getVar('reason');
        $userId = $this->request->getVar('user-id');
        // dd($reason,$id,$code,$userId);
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 0,
            'reason_reject' => $reason
        ]);
        $order = $this->transDetailModel->getWhere(['id' => $id])->getRowArray();

        $this->notificationModel->save([
            'user_id' => $userId,
            'message' => 'Order for ' . $order['product_name'] . ' has been rejected',
            'link' => '/order/' . $code
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Rejected');
        return redirect()->to('/vendors/transaction/confirm/' . $code);
    }

    public function insertTransaction()
    {
        date_default_timezone_set("Asia/Bangkok");
        $invoice = $this->cartModel->getInvoice();
        $items = $this->cartModel->getItemInUserCart(['process_into_transaction' => 1]);
        $event_date = date('Y-m-d', strtotime($this->request->getVar('event_date')));
        $event_time = date('H:i:s', strtotime($this->request->getVar('event_time')));
        $event_address = $this->request->getVar('event_address');
        $transaction_code = strtoupper(uniqid('TRA-'));

        $data = [
            'transaction_code' => $transaction_code,
            'user_id' => user()->id,
            'total_pay' => $invoice,
            'event_date' => $event_date,
            'event_time' => $event_time,
            'event_address' => $event_address
        ];

        $this->transactionModel->insertTransaction($data);

        $transaction_id = $this->transactionModel->getIdTransactionByCode($transaction_code);

        foreach ($items as $item) {
            $transaction_detail[] = [
                'transaction_id' => $transaction_id,
                'product_id' => $item['product_id']
            ];
        }

        $isInsertItemSuccess = $this->transactionModel->insertTransactionDetail($transaction_detail);

        if ($isInsertItemSuccess != false) {
            $this->cartModel->deleteItemAfterTransaction();
        }

        // kirim notifikasi pesanan barang kepada owner vendor
        foreach ($items as $item) {
            $product = $this->productModel->getProductById($item['product_id']);
            $message = 'New orders for ' . $item['product_name'] . ' require confirmation';
            $this->notificationModel->save([
                'user_id' => $product['owner'],
                'message' =>  $message,
                'link' => '/vendors/transaction/confirm/' . $transaction_code
            ]);
        }
        //  kirim notifikasi ke pada pembeli
        $message_buyer = 'Order with code ' . $transaction_code . ' is being processed';
        $this->notificationModel->save([
            'user_id' => user()->id,
            'message' => $message_buyer,
            'link' => '/vendors/transaction/' . $transaction_code
        ]);

        // arahkan ke order
        session()->setFlashdata('message', 'Order with code ' . $transaction_code . ' is being processed, please wait for the confirmation of your order');
        return redirect()->to('/order');

    }

    public function report_view()
    {
        $data = [
            'title' => 'Transaction Report',
            'active' => 'vendor_order',
            'date_min' => $this->transactionModel->getMinPaymentDate(true)
        ];

        return view('transaction/order/report_view', $data);
    }

    public function report_pdf($start_date, $end_date)
    {
        $data = [
            'soldProducts' => $this->transactionModel->getSoldProductBetweenDate($start_date, $end_date)
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('transaction/order/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('transaction.pdf', ["Attachment" => false]);
    }
}
