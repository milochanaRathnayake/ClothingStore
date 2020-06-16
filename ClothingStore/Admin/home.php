<?php
namespace Admin;

require_once '../autoload.php';

use Controller\ItemDAO;
use Domain\Item;
use Controller\StockDAO;
use Domain\Stock;
$item_management = '';
$stock_management = '';
if (isset($_POST['add_items']) && isset($_POST['item_name']) && isset($_POST['item_description']) && file_exists($_FILES['item_image']['tmp_name']) && isset($_POST['item_size'])) {
    $itemDao = new ItemDAO();
    if ($itemDao->save(new Item(null, ucwords($_POST['item_name']), ucfirst($_POST['item_description']), $_FILES['item_image']['name'], $_POST['item_size']))) {
        $target = '../images/';
        if ($_FILES['item_image']['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES['item_image']['tmp_name'], $target . basename($_FILES['item_image']['name']));
            $item_management = 'Item Added';
        }
    }
}

if(isset($_POST['remove_items']) && isset($_POST['search_item_name'])){
    $itemDao = new ItemDAO();
    if($itemDao->delete()) $item_management = 'Item deleted';
    else $item_management = 'Error occured!';
    
}

if (isset($_POST['add_stock']) && isset($_POST['stock_item_id']) && isset($_POST['stock_qty']) && isset($_POST['item_unit_price'])) {
    $stockDao = new StockDAO();
    if ($stockDao->save(new Stock(null, $_POST['stock_item_id'], $_POST['stock_qty'], date('Y-m-d'), $_POST['item_unit_price'])))
        $stock_management = 'Stock added!';
    else
        $stock_management = 'Error occured!';
}

?>
<!DOCTYPE html>
<html style="width: 100%; height: 100%;">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Y&amp;M Clothing - Management Console</title>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body style="width: 100%; height: 100%;">
<?php require_once 'nav.php';?>
    <div class="table-responsive" style="margin-top: 70px">
		<table class="table">
			<tbody>
				<tr>
					<td>
						<div class="card">
							<div class="card-body">
								<h4 class="text-center card-title">Item Management</h4>
								<form action="home.php" method="POST"
									enctype="multipart/form-data">
									<div class="form-group">
										<label>Item</label><select class="selectpicker form-control"
											style="width: 100%" name = "search_item_name" data-live-search = "true">
											<optgroup label="Select Item" style="width: 100%">
												<?php

                                                $items = new ItemDAO();
                                                foreach ($items->getAll() as $item) {
                                                    ?>
												<option value="<?php echo $item->getId(); ?>"><?php echo $item->getName();?></option>
												<?php } ?>
											</optgroup>
										</select> 
										<input class="form-control" type="hidden">
									</div>
									<div class="btn-group" role="group" style="width: 100%;">
										<button class="btn btn-primary" type="submit"
											name="search_item">Search</button>
									</div>
									<div class="form-group">
										<label>Item</label><input class="form-control" type="text"
											name="item_name">
									</div>
									<div class="form-group">
										<label>Description</label><input class="form-control"
											type="text" name="item_description">
									</div>
									<div class="form-group">
										<label>Size</label><select class="form-control"
											name="item_size"><optgroup label="Select one size">
												<option value="1">XS</option>
												<option value="2">S</option>
												<option value="3">M</option>
												<option value="4">L</option>
												<option value="5">XL</option>
												<option value="6">XXL</option>
												<option value="7">XXXL</option>
											</optgroup></select>
									</div>
									<div class="form-group">
										<label>Image:</label><input type="file" style="height: 38px;"
											accept=".jpg,.jpeg" name="item_image">
									</div>
									<div class="btn-group" role="group" style="width: 100%;">
										<button class="btn btn-primary" type="submit"
											style="width: 30%; margin: 5px;" name="add_items">Add</button>
										<button class="btn btn-primary" type="button"
											style="width: 30%; margin: 5px;" name="edit_items">Edit</button>
										<button class="btn btn-primary" type="button"
											style="width: 30%; margin: 5px;" name="remove_items">Remove</button>
									</div>
									<div class="form-group" id="item_management">
										<h6 style="color: red"><?php if(isset($item_management)) echo $item_management; ?></h6>
									</div>
								</form>
							</div>
						</div>
					</td>
					<td>
						<div class="card">
							<div class="card-body">
								<h4 class="text-center card-title">Inventory Management</h4>
								<form action="home.php" method="post">
									<div class="form-group">
										<label>Item</label><select class="form-control"
											name="stock_item_id"><optgroup label="Select Item">
												<?php

                                                $items = new ItemDAO();
                                                foreach ($items->getAll() as $item) {
                                                    ?>
												<option value="<?php echo $item->getId();?>"><?php echo $item->getName();?></option>
												<?php }?>
											</optgroup></select>
									</div>
									<div class="form-group">
										<label>Qantity</label><input class="form-control"
											type="number" name="stock_qty">
									</div>
									<div class="form-group">
										<label>Unit Price</label><input class="form-control"
											type="number" name="item_unit_price">
									</div>
									<div class="btn-group" role="group" style="width: 100%;">
										<button class="btn btn-primary" type="submit"
											style="width: 30%; margin: 5px;" name="add_stock">Add</button>
										<button class="btn btn-primary" type="submit"
											style="width: 30%; margin: 5px;" name="remove_stock">Remove</button>
									</div>
									<div class="form-group">
										<h6 style="color: red; text-align: center;"><?php if(isset($stock_management)) echo $stock_management;?></h6>
									</div>
								</form>
								<div class="form-group"></div>
							</div>
						</div>
					</td>

				</tr>
				<tr>
					<td>
						<div class="card">
							<div class="card-body">
								<h4 class="text-center card-title">User Management</h4>
								<form>
									<div class="form-group"></div>
									<div class="form-group"></div>
								</form>
							</div>
						</div>
					</td>
					<td>
						<div class="card">
							<div class="card-body">
								<h4 class="text-center card-title">Shipping Management</h4>
								<form>
									<div class="form-group"></div>
									<div class="form-group"></div>
								</form>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>

</html>