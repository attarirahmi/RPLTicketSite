<?php include("../Template/header.php");
include ("../Template/Navbar Admin.php");
session_start();
if(!isset($_SESSION['username'])){
    // not logged in
    header('Location: index.php');
}
?>

<body background="../User/Bg_img.jpg">
<div class="row " style="margin-top:100px">
    <div class="col-4">
    </div>
    <div class="col-4">
    <div class="card text-center">
        <div class=" card-header bg-info" >
            <h5 style="margin-bottom:-0px" class="text-white" > Cari Pemesanan </h5>
        </div>
        <div class="card-body text-left">
            <form action="Data Pemesanan.php" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control" name="order_id" placeholder="Order_id" required>
                </div>
                <div class="text-right">
                    <input type="submit" value="Cari" name="submit" />
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="col-4">
    </div>
</div>
<?php include("../Template/footer.php");?>