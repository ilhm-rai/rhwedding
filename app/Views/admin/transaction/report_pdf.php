<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead tr,
        tfoot tr {
            background-color: #f2f2f2;
        }

        thead th,
        tfoot th {
            padding: 10px 5px;
        }

        th,
        td {
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $total = 0; ?>
    <?php foreach ($vendors as $vendor) : ?>
        <table style="width: auto;">
            <tr>
                <td>Vendor Name</td>
                <td width="5px">:</td>
                <td><?= $vendor['vendor_name']; ?></td>
            </tr>
        </table>
        <table border="1px" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Service</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Price (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($soldProducts as $soldProduct) : ?>
                    <?php if ($soldProduct['vendor_id'] == $vendor['id']) : ?>
                        <?php $total += $soldProduct['price']; ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $soldProduct['product_code']; ?></td>
                            <td><?= $soldProduct['product_name']; ?></td>
                            <td><?= $soldProduct['service_name']; ?></td>
                            <td class="text-center"><?= date('Y-m-d', strtotime($soldProduct['payment_date'])); ?></td>
                            <td class="text-center"><?= number_format($soldProduct['price'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col" colspan="5" style="text-align: left;">Total</th>
                    <th scope="col"><?= number_format($total, 0, ',', '.'); ?></th>
                </tr>
            </tfoot>
        </table>
        <br>
    <?php endforeach; ?>
</body>

</html>