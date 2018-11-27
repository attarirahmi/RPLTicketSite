<?php include("../Template/header.php"); 
include ("../Template/navbar.php");
include("../config.php");

if(isset($_GET['submit'])){
    $route = $_GET['Route'];
    $quantity = $_GET['Quantity'];
} else {
    die("Akses dilarang...");
}
?>

<link rel="stylesheet" href="style.css">

<body background="../User/Bg_img.jpg" >
<div class="row " style="margin-top:100px">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class=" card-header bg-info" >
                    <h5 style="margin-bottom:-0px" class="text-white" > Jadwal Tiket </h5>
                </div>
                <div class="card-body text-left">
                    <p>Route:
                    <?php
                        if ($route == "JB") {
                            echo "Jakarta-Bandung";
                        } else {
                            echo "Bandung-Jakarta";
                        }
                    ?></p>
                    <p style="margin-top:-15px"> Jumlah Tiket: <?php echo $quantity; ?> </p>

                    <?php
                    $today = date("Y-m-d H:i:s");
                    $query = mysqli_query($db,
                        "SELECT t_schedule.departure
                        FROM t_schedule
                        WHERE t_schedule.departure NOT IN (SELECT t_order.departure FROM t_order) AND
                            t_schedule.departure > NOW() AND
                            t_schedule.departure <= DATE_ADD(NOW(), INTERVAL 30 DAY) AND
                            t_schedule.route = 'JB'
                        UNION
                        SELECT t_schedule.departure
                        FROM t_schedule
                        INNER JOIN t_order ON t_order.departure=t_schedule.departure
                        WHERE t_schedule.departure > NOW() AND
                            t_schedule.departure <= DATE_ADD(NOW(), INTERVAL 30 DAY) AND
                            t_schedule.route = 'JB'
                        HAVING 10 - COUNT(t_schedule.departure) >= 2
                        order by departure ASC");
                    ?>
                    <form action="Invoice.php" method="POST">
                        <input type = "hidden" name = "Route" value = "<?php echo $route; ?>" />
                        <input type = "hidden" name = "Quantity" value = "<?php echo $quantity; ?>" />
                        <div class="form-group">
                            <label for="Departure">Pilih Tanggal Keberangkatan: </label>
                            <select name="Departure" required>
                                <?php if  (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) { ?>
                                        <option><?php echo $row['departure']; ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                    <hr style="height:5px">
                    <h5 class="card-title text-info text-center"> Data Pemesan </h5>    
                    <div class="form-group">
                            <input type="text" class="form-control" name="customer_name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="customer_email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="customer_phonenumber" placeholder="No Telepon" required>
                        </div>
                    <div class="text-right" style="margin-top:20px">
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