<?php include("../Template/header.php");
include ("../Template/navbar.php"); ?>
<link rel="stylesheet" href="style.css">

<body background="../User/Bg_img.jpg">
<!-- <div img src="../User/Picture 1.png" alt="Landing Page Picture"> -->
    <div class="row " style="margin-top:100px">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class=" card-header bg-info" >
                    <h5 style="margin-bottom:-0px" class="text-white" > Pemesanan Tiket </h5>
                </div>
                <div class="card-body text-left">
                <form action="Pesan Tiket.php" method="GET">
                    <div class="form-group">
                        <label for="Route">Route</label>
                        <select class="form-control" name="Route" required>
                            <option value="JB">Jakarta-Bandung</option>
                            <option value="BJ">Bandung-Jakarta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <select class="form-control" name="Quantity" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <input type="submit" name="submit" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
        <div class="col-4">
        </div>
    </div>

<?php include("../Template/footer.php");?>