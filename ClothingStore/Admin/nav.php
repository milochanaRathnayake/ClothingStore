<?php 
namespace Admin;
require_once '../autoload.php';
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
				if(empty($_SESSION['admin'])){
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
				    <li class="nav-i tem" role="presentation"><a class="nav-link"
					href="account.php" style="padding-top: 5px"><?php echo $_SESSION['admin']->getName(); ?></a></li>
				    <li class="nav-item" role="presentation"><a class="nav-link"
					href="../logout.php">Log out</a></li>
				    <?php 
				}?> 
			</ul>
		</div>
	</div>
</nav>