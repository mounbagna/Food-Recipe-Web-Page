<?php

include "config.php";
$query = "select * from recipe_request";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book Request</title>
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="style.css">
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

<body class="bg-dark">
   <header style="height: 80px;">

      <div class="containers">
         <nav class="navi">
            <ul>
               <li><a href="admin_login.php">LOGIN</a></li>
               <li><a href="admin_page.php">BACK</a></li>
               <li><a href="home_page.php">HOME-PAGE</a></li>
            </ul>
         </nav>
      </div>

   </header>

   <section>
      <div class="card-header">
         <h2 style="text-align: center;">CUSTOMER'S REQUESTS</h2>
      </div>
      <DIV class="card-body">
         <table class="table table-bordered text-center" border="2">
            <tr style="background-color: black; color:aliceblue;">
               <th>Customer Name</th>
               <th>ID</th>
               <th>Date</th>
               <th>Email</th>
               <th>Phone Number</th>
               <th>action</th>
            </tr>

            <tr>
               <?php
               while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td><span class='btn btn-danger'><a href='delete.php?name=" . $row['name'] . "'>Delete</a> </span></td>";

                  echo "</tr>";
               }
               ?>
            </tr>
         </table>
      </DIV>
   </section>


   <section style="height: 15; width: 15;">
      <section style="height: 15; width: 15;">
         <div class="reg_img">
            <div class="box2">
               <br><br><br>
               <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">&nbsp REPLY TO THE USER</h1>

               <form name="reply" action="" method="post">
                  <br>
                  <div class="login">
                     <input class="form-control" type="text" name="message" placeholder="Enter reply" required="">
                     <br>
                     <input class="form-control" type="email" name="email" placeholder="Email" required="">
                     <br>
                     <input class="btn btn-default" type="submit" name="submit" value="reply" style="color: black; width: 70px; height: 30px;">
                  </div>
               </form>
            </div>
         </div>

      </section>
      <?php
      if (isset($_POST['submit'])) {
         $email = mysqli_real_escape_string($conn, $_POST['email']);
         $msg = mysqli_real_escape_string($conn, $_POST['message']);

         $select = " SELECT * FROM customer WHERE email = '$email' ";
         $result = mysqli_query($conn, $select);

         $insert = "INSERT INTO reply(email,message) VALUES('$email','$msg')";
         mysqli_query($conn, $insert);

         $msge = $_POST['message'] . " .";
         $from = "from: abdellaabasse@iut-dhaka.edu";
         if (mail($_POST['email'], "Reply to Request", $msge, $from)) {
            echo "The message has been succesfully sent";
            // header("location:request.php");
            exit;
         } else {

            $error[] = 'email not sent';
         }
      }

      ?>
      <br><br><br><br><br>
      <footer>
         <?php include "footer.php"; ?>
      </footer>
</body>

</html>