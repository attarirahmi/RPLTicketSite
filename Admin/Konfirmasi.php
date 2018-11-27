<?php include("../Template/header.php");
include ("../Template/Navbar Admin.php");
include("../config.php");

if(isset($_POST['submit'])){
    $order_id = $_POST['x'];
} else {
    die("Akses dilarang...");
}

header('Refresh: 2; URL = Konfirmasi Pembayaran.php');
?>

<body background="../User/Bg_img.jpg">
<div class="row " style="margin-top:100px">
    <div class="col-4">
    </div>
    <div class="col-4">
    <div class="card text-center">
        <div class=" card-header bg-info" >
            <h5 style="margin-bottom:-0px" class="text-white" > Konfirmasi Pembayaran </h5>
        </div>
        <div class="card-body text-left">
            <?php
            if(mysqli_query($db, "UPDATE `t_order` SET `payment_proof` = 'T' WHERE `order_id` = $order_id")){ 
                echo "Status pembayaran berhasil diubah."; 
            } else { 
                echo "Status pembayaran tidak berhasil diubah.";
            }
            ?>
            </br>Anda akan diarahkan ke laman sebelumnya... 
        </div>
    </div>
</div>
    <div class="col-4">
    </div>
</div>
<?php include("../Template/footer.php");?>