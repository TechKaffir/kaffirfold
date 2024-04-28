<?php
$payment = new Payment;
$id = basename($_GET['url']);
$pay = $payment->scp_specific($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= 'Payment Receipt' ?></title>
    <link rel="stylesheet" href="<?= ROOT . '/assets/css/pdf.css' ?>">
</head>

<body>
    <div class="main">
        <div class="header-text">
            <div class="header-info">
                <h3>Customer ID: <?= $pay->user_id ?></h3>
                
                <h2><?= $pay->firstname . ' ' . $pay->surname ?></h2>

                <span class="_rec_label_title">Email Address</span>: <?= $pay->email ?> <br>
                <span class="_rec_label_title">Contact No.</span>: <?= $pay->phone ?> <br>
            
            </div>
            <div class="header-info landlord-sec">
                <img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" width="200px" alt="">
                <p style="font-size:14px">
                    Company Address: <br>
                    <?= STREET_ADDRESS ?> <br><?= SUBURB ?> <br> <?= CITY ?>, <?= PROVINCE ?> <br>
                    <?= COUNTRY ?>, <?= ZIP_CODE ?> <br>
                    Phone: <?= CONTACT_NUMBER ?> <br>
                    Email Address: <?= EMAIL_ADDRESS ?>
                </p>
            </div>
        </div>
        <div class="clear-fix" style="margin-bottom: 60px;"></div>

        <h3>PAYMENT DETAILS</h3> <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice #</th>
                        <th>Notes</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rc = 1 ?>
                    <tr>
                        <td><?= $rc++ ?></td>
                        <td><?= $pay->invoice ?></td>
                        <td><?= $pay->notes ?></td>
                        <td><?= 'R' . $pay->amount ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3>TRANSACTION</h3>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= $pay->pay_date ?></td>
                        <td><?= $pay->type ?></td>
                        <td><span class="btn btn-success"><?= 'R' . $pay->amount ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Paid Watermark-->
        <p class="watermark">PAID</p>
    </div>
    <div class="footer">
        <p class="text-center">
            Thank you for the payment you made with us @ <?= APP_NAME ?> <br>
            Powered by <a class="text-danger" href="https://techsolutions.jongibrandz.co.za" target="_blank">Jongibrands Tech Solutions</a>
        </p>
    </div>

</body>

</html>