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
    
    <!Custom style>
    <link rel="stylesheet" type="text/css" href="{{asset('custom/style.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body>

<nav class="navbar navbar-inverse">

		  <div class="container-fluid">

		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Inventory Management</a>
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


<div align = "center" id = "manageTable" class = "container">




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
           
           <p id = "msgC"></p>
          <label>Category Name</label>
          <input style="width:50%" class="form-control" type = "text" name="category" placeholder="Category name" required="required">
          
          <label>Parent Category</label>
          <select style="width:50%" class = "form-control" name="parent">

          		<option value="">
          			none
          		</option>
          		<?php 

          			use App\Http\Controllers\InventoryController;
          			$table = InventoryController::getAllCategoryName();

          			foreach ($table as $row) {
          				
          				?>

          					<option values = "{{$row->name}}">{{$row->name}}</option>
          				<?php
          			}
          		?>

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

   
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a New Brand</h4>
      </div>

      <div align="center" class="modal-body">
          
          <p id="msgB"></p>
          <label>Brand Name</label>
          <input style="width:50%" class="form-control" type = "text" name="brand" placeholder="Brand name" required="required">
         

      </div>

      <div class="modal-footer">

 		<button id="submitBrand" type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>


<! Product Modal >

<div id="productModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Add a New Product</h4>
      </div>
      <div align = "center" class="modal-body">

      	  <p id="msgP"></p> 
          <label>Product Name</label>
          <input style="width:50%" class="form-control" type = "text" name="product" placeholder="Product name" required="required">

          <label>Category</label>
          <select style="width:50%" class = "form-control" name="category">

              <?php 

                //use App\Http\Controllers\InventoryController;
                //$table = InventoryController::getAllCategoryName();

                foreach ($table as $row) {
                  
                  ?>

                    <option values = "{{$row->name}}">{{$row->name}}</option>
                  <?php
                }
              ?>



          </select>


          <label>Brand</label>
          <select style="width:50%" class = "form-control" name="brand">

              <?php 

                //use App\Http\Controllers\InventoryController;
                $table = InventoryController::getAllBrandName();

                foreach ($table as $row) {
                  
                  ?>

                    <option values = "{{$row->name}}">{{$row->name}}</option>
                  <?php
                }
              ?>


          </select>


          <label>Price</label>
          <input style="width:50%" class="form-control" type = "text" name="price" placeholder="price.." required="required">


          <label>Quantity</label>
          <input style="width:50%" class="form-control" type = "text" name="quantity" placeholder="quantity..." required="required">
          

      </div>
      <div class="modal-footer">

      	<button id="submitProduct" type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

 <script type="text/javascript">
 	
 	$("document").ready(function()
 	{

	    $.ajaxSetup({

	        headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	        }

	    });
        
        //post category
 		$("#submitCategory").click(function(e)
 		{
 			e.preventDefault();

 			var name = $("input[name=category]").val();
 			var parent = $("select[name=parent]").val();

 			$.ajax({

 				type:'POST',
 				url:'/category',
 				data: {name:name,parent:parent},

 				success:function(data)
 				{
 					$("#msgC").html(data.msg);
 				},
 				error:function()
 				{
 					alert('Error');
 				}
 			});

 		});


        //post brand
 		$("#submitBrand").click(function(e)
 		{
 			e.preventDefault();

 			var name = $("input[name=brand]").val();

 			$.ajax({

 				type:'POST',
 				url:'/brand',
 				data: {name:name},

 				success:function(data)
 				{
 					$("#msgB").html(data.msg);
 				},
 				error:function()
 				{
 					alert('Error');
 				}
 			});

 		});   

 		//post Product
 		$("#submitProduct").click(function(e)
 		{
 			e.preventDefault();


 			var name = $("input[name=product]").val();
 			var category = $("select[name=category]").val();
 			var brand = $("select[name=brand]").val();
 			var price = $("input[name=price]").val();
 			var quantity = $("input[name=quantity]").val();
 			

          $.ajax({

              type:'POST',
              url:'/product',
              data:{name:name,category:category,brand:brand,price:price,quantity:quantity},

              success:function(data)
              {
                 $("#msgP").html(data.msg);
              },
              error:function(){
                 alert('error');
              }
          });

 		});

 		//manage categories
 		$("#manageCategories").click(function(e)
 		{
 			e.preventDefault();

 			$.ajax({

 				type:'GET',
 				url:'/get_categories',

 				success:function(data)
 				{
            $("#manageTable").html(data.html);
 				},
        error:function()
        {
          alert('error');
        }

 			});


  	});
    //manage brand
    $("#manageBrands").click(function(e){

        e.preventDefault();

        $.ajax({
           type:'GET',
           url:'/get_brands',
           success:function(data)
           {
              $("#manageTable").html(data.html);
           },
           error:function()
           {
              alert('error');
           }

        });
    });

    //manage product
    $("#manageProducts").click(function(e){

          e.preventDefault();

          $.ajax({
              type:'GET',
              url:'/get_products',

              success:function(data)
              {
                  $("#manageTable").html(data.html);
              }
          });
    });

});

 </script>



</html>