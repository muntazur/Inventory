<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.7 Ajax Request example</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

<nav class="navbar navbar-inverse">

		  <div class="container-fluid">

		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Inventory ManageMent</a>
		    </div>

		    <ul class="nav navbar-nav">

		      <li class="active"><a href="#">Home</a></li>

		      <li class="dropdown">

			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
			        <span class="caret"></span></a>

			        <ul class="dropdown-menu">

				          <li><a href="#" data-toggle="modal" data-target="#categoryModal">Add Category</a></li>
				          <li><a id = "manageCategories" href="#">Manage Categories</a></li>
			        </ul>

		      </li>


		      <li class="dropdown">

			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Brands
			        <span class="caret"></span></a>

			        <ul class="dropdown-menu">

				          <li><a href="#" data-toggle="modal" data-target="#brandModal">Add Brand</a></li>
				          <li><a href="#" id="manageBrands">Manage Brands</a></li>
			        </ul>

		      </li>
		      <li class="dropdown">

			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
			        <span class="caret"></span></a>

			        <ul class="dropdown-menu">

				          <li><a href="#" data-toggle="modal" data-target="#productModal">Add Product</a></li>
				          <li><a href="#" id="manageProducts">Manage Products</a></li>
			        </ul>

		      </li>

		      <li class="active"><a href="">New Order</a></li>

		    </ul>


	        <ul class="nav navbar-nav navbar-right">

	          <li class="active"><a href=""><span class="glyphicon glyphicon-user"></span>Logout</a></li>

	        </ul>

		  </div>

</nav>


<div id = "manageTable" class = "container">



</div>



<!-- Modal -->
<div id="categoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

      	<h4 class="modal-title">Add a New Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div align="center" class="modal-body">
           
          <label>Category Name</label>
          <input style="width:50%" class="form-control" type = "text" name="category" placeholder="Category name" required="required">
          
          <label>Parent Category</label>
          <select style="width:50%" class = "form-control" name="parent">

          		<option value="">
          			none
          		</option>

          </select>
          

      </div>

      <div class="modal-footer">

      	<button id="submitCategory" type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>


<!Brand Modal >
<div id="brandModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a New Brand</h4>
      </div>

      <div align="center" class="modal-body">
         
          <label>Brand Name</label>
          <input style="width:50%" class="form-control" type = "text" name="brand" placeholder="Brand name" required="required">
         

      </div>

      <div class="modal-footer">

 		<button id="submitBrand" type="submit" class="btn btn-primary btn-sm">Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>


<! Product Modal >
<div id="productModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Add a New Product</h4>
      </div>
      <div align = "center" class="modal-body">

          <label>Product Name</label>
          <input style="width:50%" class="form-control" type = "text" name="product" placeholder="Product name" required="required">

          <label>Category</label>
          <select style="width:50%" class = "form-control" name="category">

          		<option value="">
          			none
          		</option>

          </select>


          <label>Brand</label>
          <select style="width:50%" class = "form-control" name="category">

          		<option value="">
          			none
          		</option>

          </select>


          <label>Price</label>
          <input style="width:50%" class="form-control" type = "text" name="price" placeholder="price.." required="required">


          <label>Quantity</label>
          <input style="width:50%" class="form-control" type = "text" name="quantity" placeholder="quantity..." required="required">
          

      </div>
      <div class="modal-footer">

      	<button id="submitProduct" type="submit" class="btn btn-primary btn-sm">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></body>