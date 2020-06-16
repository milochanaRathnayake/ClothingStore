<?php
require_once 'autoload.php';
include_once 'Domain/Customer.php';
$msg = '';
use Controller\ItemDAO;
session_start();

if(isset($_GET['item']) && isset($_GET['add_to_cart'])){
    if(isset($_SESSION['customer'])){
        if(isset($_SESSION['cart']['item'])){
            $arr = $_SESSION['cart']['item'];
            if(!in_array($_GET['item'], $arr)){
                array_push($arr, $_GET['item']);
                $_SESSION['cart']['item'] = $arr;
                $msg = 'Product added to cart!';
            }else{
                $msg = 'Product already in the cart!';
            }
        }else{
            $_SESSION['cart']['item'] = array($_GET['item']);
            $msg = 'Product added to cart!';
        }
        
    }else{
        header('Location:login.php?location='.urlencode($_SERVER['REQUEST_URI']));
    }
}

if (isset($_GET['item'])) {
    $itemDao = new ItemDAO();
    $item = $itemDao->getByIdWithPrice($_GET['item']);
    if ($item != null) {}
    ?>
<!DOCTYPE html>
<html style="width: 100%; height: 100%;">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Product - Y&amp;M Clothing</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
	integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
	crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="width: 100%; height: 100%;">
<?php require_once 'nav.php';?>
<div style="margin-top: 100px">
	<a href="gallery.php"><i class="fas fa-arrow-circle-left" style="font-size: 60px;"></i></a>
	<div class="d-flex align-items-center">
		<div style="margin-right: 30%; margin-left: 20%;">

			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr></tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="card" style="width: 100%; height: 100%;">
									<div class="card-body" style="width: 100%; height: 100%;">
										<img src="<?php echo 'images/'.$item->getImage();?>"
											height="400px" width="400px">
									</div>
								</div>
							</td>
							<td>
								<div class="card" style="height: 440px; width: 600px">
									<div class="card-body">
										<h4 class="card-title"><?php echo $item->getName();?></h4>
										<h6 class="text-muted card-subtitle mb-2">Rs. <?php echo $item->getPrice();?></h6>
										<p class="card-text"><?php echo $item->getDescription();?></p>
										<form method="get" action="product_detail.php">
											<input type="hidden" name="item"
												value="<?php echo $item->getId();?>">
											<button class="btn btn-primary" type="submit" name="add_to_cart">Add to Cart</button>
										</form>
										<h5 style="color:red"><?php echo $msg; ?></h5>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php

} else {
    header('Location: gallery.php');
}
?>