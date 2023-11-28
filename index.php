<?php
   $insert = false;
   if(isset($_POST['name'])){



   $server = "localhost";
   $username = "root";
   $password = "";

   $con = mysqli_connect($server, $username, $password);

   if(!$con) {
    die("connection to this database failed due to " . mysqli_connect_error());
   }

   $name =$_POST['name'];
   $gender =$_POST['gender'];
   $age = $_POST['age'];
   $email = $_POST['email'] ;
   $phone = $_POST['phone'];
   $desc = $_POST['desc'];
   

   $sql = " INSERT INTO `trip`.`trip` ( `Name`, `Age`, `Gender`, `Email`, `Phone No`, `Other`, `dt`) VALUES ( '$name', '$age', '$gender', 
   '$email', '$phone', '$desc', current_timestamp()); ";

   if($con->query($sql) == true){

    $insert = true;

   }

   else {
    echo "ERROR :  $sql <br> $con->error";
   }

   $con->close();

}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Srisakdi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class="bg" src="img_iit.jpg" alt="IIT">

    <div class="container">
        <h1>Welcome to IIT Mumbai US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <?php

           if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your from. We are happy to see you joining us</p>";
           }
           

        ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>


        </form>

    </div>

    <script src = "index.js"></script>

    <!-- INSERT INTO `trip` (`S no`, `Name`, `Age`, `Gender`, `Email`, `Phone No`, `Other`, `dt`) VALUES ('1', 'testname', '21', 'female', 'this@this.com', '9999999999', 'This is a good value', current_timestamp()); -->
    
</body>
</html>