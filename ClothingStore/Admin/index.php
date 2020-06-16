<?php 
namespace Admin;
use Domain\Admin;
use Controller\AdminDAO;

require_once '../autoload.php';
$errorlog = '';

if(isset($_POST['username']) && isset($_POST['password'])){
    $dao = new AdminDAO(new Admin(null,null,$_POST['username'],null,null, null));
    if($dao->verify($_POST['password'])){
        header('Location:home.php');
    }else{
        $errorlog = 'Username or password is incorrect';
    }
}
?>
<!DOCTYPE html>
<html style="min-height: 100%;height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ClotingStoreDesign</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link rel="stylesheet" href="../assets/css/untitled.css">
</head>

<body class="d-flex justify-content-center" style="min-height: 100%;height: 100%;">
<?php require_once '../nav.php';?>
    <!-- Start: 1 Row 3 Columns -->
    <div class="d-flex align-items-center" style="width: 100%;background-color: rgb(33,37,41);background-image: url(&quot;../assets/img/istockphoto-1172679327-170667a.jpg&quot;);background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row justify-content-center" style="margin: 0;">
                <div class="col-lg-6 col-xl-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Log In</h4>
                            <form action="/clothingstore/admin/" method="post">
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Username</label><input class="border-dark shadow form-control" type="text" name="username"></div>
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Password</label><input class="border-dark shadow form-control" type="password" name="password"></div>
                                <button class="btn custom-button" type="submit" style="width: 100%;background-color: rgb(33,37,41);color: rgb(255,255,255);font-family: Catamaran, sans-serif;">Log in</button>
                                <div class="form-group"><a href="reset.php" style="font-family: Catamaran, sans-serif;">Forgot Password?</a></div>
                                <div class="form-group text-center" id="errorlog" style="color:red"><?php if(isset($errorlog)) echo $errorlog;?></div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: 1 Row 3 Columns -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>