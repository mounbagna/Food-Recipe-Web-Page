<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Request</title>
   <link rel="stylesheet" href="css/styles.css">

   <!--Bootstrap links for responsive project-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style>
      header {
         background-color: black;
         padding: 0px;
         width: 100%;
         margin: auto;
      }

      header a {
         text-decoration: none;
         color: white;
      }

      header li {
         display: inline;
         padding: 0 10px 0 10px;


      }

      header nav {
         float: right;
      }

      header a:hover {
         color: white;
      }

      #branding {
         float: left;
         color: white;
      }


      .containers {
         overflow: hidden;
         margin: auto;
         width: 90%;

      }
   </style>

</head>

<body>
   <header style="height: 80px;">

      <div class="containers">
         <nav class="navi">
            <ul>

               <li><a href="customer_login.php">Login</a></li>
               <li><a href="customer_page.php">Back</a></li>
               <li><a href="home_page.php">Home-Page</a></li>
            </ul>
         </nav>
      </div>

   </header>
   <section style="height: 10; width: 10;">
      <div class="reg_img">
         <div class="box2">
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console; color:white">&nbspFood Recipe Management System</h1>
            <h1 style="text-align: center;font-size: 25px; color:white">REQUEST FOR FOOD RECIPE</h1>
            <form name="request_book" action="" method="post">
               <br>
               <div class="login">
                  <input class="form-control" type="text" name="name" placeholder="User Name" required="">
                  <br>
                  <input class="form-control" type="number" name="id" placeholder="Recipe's ID" required="">
                  <br>

                  <input class="form-control" type="email" name="email" placeholder="Email" required="">
                  <br>
                  <input class="form-control" type="text" name="phone" required="" placeholder="phone number">
                  <br>


                  <input class="btn btn-default" type="submit" name="submit" value="Request" style="color: black; width: 70px; height: 30px;">
               </div>
            </form>
         </div>
      </div>

   </section>
   <?php
   if (isset($_POST['submit'])) {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $id = (int)$_POST['id'];
      $date = date("Y-m-d");
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone =  mysqli_real_escape_string($conn, $_POST['phone']);

      $insert = "INSERT INTO recipe_request(name,id,date, email,phone) VALUES('$name','$id','$date','$email','$phone')";
      mysqli_query($conn, $insert);
   }
   ?>
</body>

</html>