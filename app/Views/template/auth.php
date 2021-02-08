<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <?= $this->include('template/_style.php'); ?>
</head>

<body>
    <?= $this->renderSection('content'); ?>

    <?= $this->include('template/_script.php'); ?>
</body>

</html>