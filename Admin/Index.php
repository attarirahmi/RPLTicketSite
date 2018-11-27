<?php include("../Template/header.php");
include ("../Template/Navbar Admin.php");
ob_start();
session_start();

$msg = '';

if(isset($_SESSION['username'])){
    // logged in
    header('Location: Cari Pemesanan.php');
    exit();
} else if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'admin';
                  
        header("Location: Cari Pemesanan.php"); // redirects
    } else {
        $msg = 'Username atau password Anda salah';
    }
}
?>
<body background="../User/Bg_img.jpg">

<div class="row " style="margin-top:100px">
    <div class="col-4">
    </div>
    <div class="col-4">
    <div class="card text-center">
        <div class=" card-header bg-info" >
            <h5 style="margin-bottom:-0px" class="text-white" > Laman Admin </h5>
        </div>
        
        <div class="card-body text-left">
            <form class = "form-signin" role = "form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h6><center><?php echo $msg; ?></center></h6>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="text-right">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="col-4">
    </div>
</div>
<?php include("../Template/footer.php");?>