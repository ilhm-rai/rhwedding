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
    <table border="1px">
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
            <?php foreach ($soldProducts as $soldIndex => $soldProduct) : ?>
                <?php $total += $soldProduct['price']; ?>
                <tr>
                    <th scope="row"><?= ++$soldIndex; ?></th>
                    <td><?= $soldProduct['product_code']; ?></td>
                    <td><?= $soldProduct['product_name']; ?></td>
                    <td><?= $soldProduct['service_name']; ?></td>
                    <td class="text-center"><?= date('Y-m-d', strtotime($soldProduct['payment_date'])); ?></td>
                    <td class="text-center"><?= number_format($soldProduct['price'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col" colspan="5" style="text-align: left;">Total</th>
                <th scope="col"><?= number_format($total, 0, ',', '.'); ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>