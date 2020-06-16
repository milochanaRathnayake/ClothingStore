<?php 
spl_autoload_register();
use Domain\Customer;
use Controller\CustomerDAO;
$errorlog = "";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['username']) && isset($_POST['password'])){
    $cutomer = new Customer(null, $_POST['name'], $_POST['username'], $_POST['contact'], $_POST['email']);
    $dao = new CustomerDAO($cutomer);
    
    if($dao->save(password_hash($_POST['password'], PASSWORD_ARGON2ID)))
        header('Location:index.php');
    else
        $errorlog = 'Error occured in the system!';
}
?>
<!DOCTYPE html>
<html style="width: 100%;height: 100%;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ClotingStoreDesign</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="width: 100%;height: 100%;min-height: 100%;">
<?php require_once 'nav.php';?>
    <!-- Start: 1 Row 3 Columns -->
    <div class="d-flex align-items-center" style="width: 100%;background-color: rgb(33,37,41);height: 100%;background-image: url(&quot;assets/img/istockphoto-1172679327-170667a.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center" style="margin: 0;">
                <div class="col-lg-6 col-xl-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Sign In</h4>
                            <form action="signin.php" method="post">
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Full Name</label><input class="border-dark shadow form-control" type="text" name="name"></div>
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Email</label><input class="border-dark shadow form-control" type="text" name="email"></div>
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Contact</label><input class="border-dark shadow form-control" type="text" name="contact"></div>
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Username</label><input class="border-dark shadow form-control" type="text" name="username"></div>
                                <div class="form-group text-left"><label style="font-family: Catamaran, sans-serif;">Password</label><input class="border-dark shadow form-control" type="password" name="password"></div>
                                <button class="btn custom-button" type="submit" style="width: 100%;background-color: rgb(33,37,41);color: rgb(255,255,255);font-family: Catamaran, sans-serif;">Sign in</button>
                                <div class="form-group text-center" style="color: red" id="errorlog"><?php if(isset($errorlog)) echo $errorlog;?></div>
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