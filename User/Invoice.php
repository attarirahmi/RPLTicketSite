<?php include("../Template/header.php");
include ("../Template/navbar.php");
include("../config.php");

if(isset($_POST['submit'])){

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phonenumber = $_POST['customer_phonenumber'];
    $departure = $_POST['Departure'];
    $route = $_POST['Route'];
    $quantity = $_POST['Quantity'];

    //insert data customer
    $query = mysqli_query($db, "INSERT INTO `t_customer` (customer_name, customer_email, customer_phonenumber) VALUES ('$customer_name', '$customer_email', '$customer_phonenumber')");

    //insert data order
    $query = mysqli_query($db, "INSERT INTO `t_order` (quantity, customer_name, customer_email, departure) VALUES ($quantity, '$customer_name', '$customer_email', '$departure')");

    //select order id
    $order_id = mysqli_insert_id($db);

    //select order time
    $query = mysqli_query($db, "SELECT `order_time` FROM `t_order` WHERE `order_id` = $order_id");
    $order_time = mysqli_fetch_array($query);

    //select price for 1 ticket
    $query = mysqli_query($db, "SELECT `price` FROM `t_schedule` WHERE departure = '$departure'");
    $price = mysqli_fetch_array($query);

} else {
    die("Akses dilarang...");
}

?>

<link rel="stylesheet" href="style.css">

<body background="../User/Bg img 2.jpg">
    <div class="row " style="margin-top:100px">
        <div class="col-2">
        </div>
        <div class="col-8">
        <div class="card text-center" style="margin-bottom:100px">
            <div class=" card-header bg-info" >
                <h5 style="margin-bottom:-0px" class="text-white" > Invoice </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">    
                        <div class="card" style="margin-bottom:20px ">
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
                                <h5 class="card-title text-info"> Tanggal Keberangkatan/Kedatangan </h5>
                                <?php
                                    $d=strtotime($departure);
                                    if ($route == "JB") {
                                        $jam = "(13.00 - 17.00)";
                                    } else {
                                        $jam = "(09.00 - 12.00)";
                                    }
                                    echo date("l, d M Y", $d)." ".$jam;
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
                <div style="margin:20px 0px 50px 0px">
                    <h3 > Harga </h3>
                    <h4 class="display-4 text-info"> Rp <?php echo $price['price']*$quantity; ?> </h4>
                    <p> (<?php echo $quantity;?> tiket) </p>
                </div>
                <div style="margin-bottom:75px">
                    <h3> Kode Pembayaran </h3>
                    <h4 class="display-4 text-info"> < <?php echo $order_id; ?> > </h4>
                </div>
                <h5 style="margin-bottom:40px"> Harap melakukan pembayaran sebelum 
                    <strong class="text-danger">
                    <?php
                        echo date('l, d M Y, H:i',strtotime('+6 hour',strtotime($order_time['order_time'])));
                    ?> </strong> </h5>
            </div>
            <div class="row" style="margin-bottom:50px">
                <div class="col">
                    <h5> Rekening BNI:</h5>
                    <h4 class="text-info"> 3471032610980001 </h4>
                    <p> A/N Condro Travel Keren Banget Parah </p>
                </div>
                <div class="col">
                    <h5> Rekening Mandiri:</h5>
                    <h4 class="text-info"> 900 00 2429004 2 </h4>
                    <p> A/N Condro Travel Mandiri Banget Parah </p>
                </div>
            </div>
            <h5 > Lalu kirim bukti pembayaran ke: </h5>
            <h4 class="text-info" style="margin-bottom:50px"> cond_travel@cond.com </h4>
            <h5 style="margin-bottom:50px"> Terima kasih telah memilih COND Travel </h5>
        </div>

        <div class="col-2">
        </div>
    </div>

<?php include("../Template/footer.php");?>