<?php
$user = new User();

$id = basename($_GET['url']);

// $sick = $sickcert->specificPatientSickCert($id);
$users = $user->findAll();
?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .align-right {
        margin-left: auto;
    }

    .header-info {
        display: inline-block;
    }

    #license {
        float: right;
        margin-top: -15px;
    }

    .qrcode-sec {
        float: right;
    }
</style>

<div class="main">
    <div class="row">
        <div style="text-align:center;">
            <img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" alt="">
        </div>
    </div>
    
    <hr>
    <h3 style="font-weight: bold;font-size:18px;text-align:center">DOCUMENT TITLE</h3>
    <div class="content" style="font-size: 12px;text-align:justify">
        
        
    </div>
    <div style="text-align: right;margin-top:80px"> <br><br><br>
      
    </div>
    <div class="footer">
        <div style="border:1px solid #ccc;width:200px;height:200px">
            <p style="color:#ccc;text-align:center;margin-top:85px">COMPANY STAMP</p>
        </div>
        <div class="qrcode-sec">
            <span style="font-size: 10px;text-align:center;margin-right:90px">To verify this document, use your smart phone's QR/Bar code scanner to scan this QR Code</span>
            <img src="<?= ROOT . '/assets/img/' . QR_CODE_PATH ?>" width="100px" alt="">
        </div>
    </div>
</div>