<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use Dompdf\Dompdf;

class Transaction extends BaseController
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
    }

    public function index()
    {
        $data = [
            'title'  => 'Transaction List',
            'active' => 'order',
            'trans' => $this->transactionModel->getAllTransaction(),
        ];

        return view('admin/transaction/index', $data);
    }

    public function detail($transaction_code)
    {
        $data = [
            'title'  => 'Transaction Detail',
            'active' => 'order',
            'trans' => $this->transactionModel->getTransBy($transaction_code),
            'detail' => $this->transactionModel->getTransDetailBy($transaction_code),
        ];


        return view('admin/transaction/detail', $data);
    }

    public function report_view()
    {
        $data = [
            'title' => 'Transaction Report',
            'active' => 'order',
            'date_min' => $this->transactionModel->getMinPaymentDate(),
        ];

        return view('admin/transaction/report_view', $data);
    }

    public function report_pdf($start_date, $end_date)
    {
        $data = [
            'vendors' => $this->transactionModel->getVendorInTransactionBetweenDate($start_date, $end_date),
            'soldProducts' => $this->transactionModel->getSoldProductBetweenDate($start_date, $end_date)
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin/transaction/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('transaction.pdf', ["Attachment" => false]);
    }
}
