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
          <a class="navbar-brand" href="">Inventory Management</a>
        </div>

        <ul class="nav navbar-nav">
          <li class="active"><a href="">Home</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

          <li class="active"><a id = "signup" data-toggle="modal" data-target="#signModal" href=""><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li class="active"><a id ="login" data-toggle="modal" data-target="#loginModal" href=""><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

        </ul>

      </div>

    </nav>    

          
    <div align = "center" id = "user" class = "container">


    </div>




<!- Modal >
<div id="signModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

    <h4 class="modal-title">Create an Account</h4>
        <button style = "color:red" type="button" class="close" data-dismiss="modal">&times;</button>
        

      </div>

      <div align ="center" class="modal-body">

         <p id = "msg"></p>
      
        <input style="width:50%" class = "form-control" type = "text" name="name" placeholder="Enter name...." required="required">

        <input style="width:50%" class = "form-control" type = "email" name="email" placeholder="Enter Email...." required="required">

        <input style="width:50%" class = "form-control" type = "password" name="password" placeholder="Enter password...." required="required">

        <input style="width:50%" class = "form-control" type = "password" name="repeat_password" placeholder="Repeat Password...." required="required">

        <button id = "signUpSubmit" type="submit" class = "btn btn-primary btn-sm">Submit</button>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>


<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

    <h4 class="modal-title">Log into your account</h4>
        <button style="color:red" type="button" class="close" data-dismiss="modal">&times;</button>
        

      </div>

      <div align ="center" class="modal-body">

            
      <input style="width:50%" class = "form-control" type = "email" name="email" placeholder="Enter Email...." required="required">

      <input style="width:50%" class = "form-control" type = "password" name="password" placeholder="Enter password...." required="required">

      <button id = "logInSubmit" type="submit" class = "btn btn-primary btn-sm">Submit</button>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div

    


</body>

<script type="text/javascript">

   
$("document").ready(function(){
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $("#signUpSubmit").click(function(e){
       
         e.preventDefault();
         
         var name = $("input[name=name]").val();
         var email = $("input[name=email]").val();
         var password = $("input[name=password]").val();
         var repeat_password = $("input[name=repeat_password]").val();


        $.ajax({

            type: 'POST',
            url : '/signup',
            data: {name:name,email:email,password:password,repeat_password:repeat_password},

            success:function(data) {
              $("#msg").html(data.msg);
            },
            error:function()
            {
                alert('Error');
            }
        });
        
    });



});
</script>
   

</html