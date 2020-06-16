<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<nav
	class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark navbar-custom">
	<div class="container">
		<a class="navbar-brand" href="index.php">Y&amp;M Clothing</a>
		<button data-toggle="collapse" class="navbar-toggler"
			data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="nav navbar-nav ml-auto">
				<?php
				if(empty($_SESSION['customer'])){
				if($_SERVER['REQUEST_URI'] != "/clothingstore/signin.php"){ ?>
					<li class="nav-item" role="presentation"><a class="nav-link"
					href="signin.php">Sign In</a></li>
				<?php }?> 
				<?php 
				if($_SERVER['REQUEST_URI'] != "/clothingstore/login.php"){ ?>
					<li class="nav-item" role="presentation"><a class="nav-link"
					href="login.php">Log In</a></li>
				<?php }
				}else{
				    ?>
				    <li class="nav-item" role="presentation"><a class="nav-link"
					href="account.php" style="padding-top: 25px"><?php echo $_SESSION['customer']->getName(); ?></a></li>
				    <li class="nav-item" role="presentation"><a class="nav-link"
					href="logout.php" style="padding-top: 25px">Log out</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link"
					href="cart.php">
					<span class="fa-stack fa-2x has-badge" data-count="<?php echo (isset($_SESSION['cart']['item'])== true) ? count($_SESSION['cart']['item']) : 0;?>">
                      <i class="fa fa-circle fa-stack-1x"></i>
                      <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    </a></li>
				    <?php 
				}?> 
			</ul>
		</div>
	</div>
</nav>