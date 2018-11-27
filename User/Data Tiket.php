<?php include("../Template/header.php");
include ("../Template/navbar.php"); ?>
<body background="../User/Bg_img.jpg" >
<!-- <div img src="../User/Picture 1.png" alt="Landing Page Picture"> -->
    <div class="row " style="margin-top:100px">
        <div class="col-4">
        </div>
        <div class="col-4">
        <div class="card text-center">
            <div class=" card-header bg-info" >
                <h5 style="margin-bottom:-0px" class="text-white" > Data Pemesanan Tiket </h5>
            </div>
            <div class="card-body text-left">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="No Telepon">
                    </div>
                    <div class="text-right">
                        <a class="btn btn-primary" href="Invoice.php" role="button"> Submit </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="col-4">
        </div>
    </div>
<!-- </div> -->
<?php include("../Template/footer.php");?>