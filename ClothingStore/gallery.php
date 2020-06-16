<?php
spl_autoload_register();
use Controller\ItemDAO;
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Gallery - Y&amp;M Clothing</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
 	<?php include_once 'nav.php';?>
    <h1 class="text-center align-self-center" style="margin-top: 120px;">Product
		Gallary</h1>
	<!-- Start: 1 Row 4 Columns -->
	<div>
		<div class="container">
            <div class="row">
            <?php
            $itemDao = new ItemDAO();
            foreach ($itemDao->getItemWithPrice() as $item) {
                ?>
				<div class="col-md-3" style="margin-bottom: 30px">
					<div class="card">
						<div class="card-body justify-content-center align-self-center">
							<img src="<?php echo 'images/'.$item->getImage();?>" class="img-fluid" style="max-height: 240px; max-width: 240px" loading="lazy">
							<form action="product_detail.php" method="get">
								<input type="hidden" name="item" value="<?php echo $item->getId();?>">
								<button class="btn text-center card-title" style="width: 100%; font-size: 14pt;margin-top: 5px" type="submit"><?php echo $item->getName(); ?></button>
							</form>
							<h5 class="text-center"><?php echo 'Rs. '.$item->getPrice();?></h5>
							<h6 class="text-center"><?php echo $item->getSize();?></h6>
							
						</div>
					</div>
				</div>
				
            <?php
            }
            ?>
           </div> 
        </div>
	</div>
	<!-- End: 1 Row 4 Columns -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>