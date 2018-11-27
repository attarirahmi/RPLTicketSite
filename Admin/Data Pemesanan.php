<?php include("../Template/header.php");
include ("../Template/Navbar Admin.php");
include("../config.php");

if(isset($_GET['submit'])){
    $order_id = $_GET['order_id'];
} else {
    die("Akses dilarang...");
}
    //select dari t_order
    $query = mysqli_query($db, "SELECT * FROM `t_order` WHERE `order_id` LIKE '$order_id'");
    $order = mysqli_fetch_array($query);

    $quantity = $order['quantity'];
    $customer_name = $order['customer_name'];
    $customer_email = $order['customer_email'];
    $departure = $order['departure'];
    $payment_proof = $order['payment_proof'];

    //select dari t_customer
    $query = mysqli_query($db, "SELECT `customer_phonenumber` FROM `t_customer` WHERE `customer_name` LIKE '$customer_name' AND `customer_email` LIKE '$customer_email'");
    $customer = mysqli_fetch_array($query);

    $customer_phonenumber = $customer['customer_phonenumber'];

    //select dari t_schedule
    $query = mysqli_query($db, "SELECT `route` FROM `t_schedule` WHERE `departure` LIKE '$departure'");
    $schedule = mysqli_fetch_array($query);
    $route = $schedule['route'];
?>

<body background="../User/Bg img 2.jpg">
    <div class="row " style="margin-top:100px">
        <div class="col-2">
        </div>
        <div class="col-8">
        <div class="card text-center" style="margin-bottom:100px">
            <div class=" card-header bg-info" >
                <h5 style="margin-bottom:-0px" class="text-white" > Data Pemesanan </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">    
                        <div class="card" style="margin-bottom:20px ">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> ID Pemesanan </h5>
                                <?php echo $order_id; ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Nama </h5>
                                <?php echo $customer_name; ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Email </h5>
                                <?php echo $customer_email; ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> No Telepon </h5>
                                <?php echo $customer_phonenumber; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">      
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Jumlah Tiket </h5>
                                <?php echo $quantity; ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Status Pembayaran </h5>
                                <?php
                                    if ($payment_proof == "F") {
                                        echo "Belum Dibayar";
                                    } else {
                                        echo "Lunas";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Tanggal Keberangkatan/Kedatangan </h5>
                                <?php
                                    $d=strtotime($departure);
                                    if ($route == "JB") {
                                        $jam = "(13.00 - 17.00)";
                                    } else {
                                        $jam = "(09.00 - 12.00)";
                                    }
                                    echo date("l, Y-m-d", $d)." ".$jam;
                                ?>
                            </div>
                        </div>
                        <div class="card" style="margin-bottom:50px">
                            <div class="card-body" style="padding:10px">
                                <h5 class="card-title text-info"> Rute </h5>
                                <?php
                                    if ($route == "JB") {
                                        echo "Jakarta-Bandung";
                                    } else {
                                        echo "Bandung-Jakarta";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <a class="btn btn-info" href="Index.php" role="button"> Cari Lainnya </a>
                </div>
            </div>
        </div>  
    </div>
</div>



<?php include("../Template/footer.php");?>