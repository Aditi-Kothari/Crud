<?php
include_once("config.php");


if(isset($_POST['Submit'])) {
    $fname= $_POST["fname"];
    $lname=$_POST["lname"];
    $mail=$_POST["mail"];
    $phone=$_POST["phone"];

    // include database connection file
include_once("config.php");

$sql="INSERT INTO `users` (`id`, `FirstName`, `LastName`, `E-mail`, `Phone No`) VALUES (NULL, '$fname','$lname','$mail','$phone')";
        $result= mysqli_query($conn,$sql);
        if($result){
            $insert = true;
        }else{
            echo"error" .mysqli_error($conn);
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud</title>
</head>
<body>

<div class="box">
            <div class="title">
                Registration Form
            </div>
            <form action="/Crud/index.php" method="post">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" placeholder="Enter First Name">
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" placeholder="Enter Last Name">
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" placeholder="Enter E-mail" name="mail">
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone" placeholder="Enter Mobile Number">
                </div>
                
                <div class="btn">
                    <button type="submit" name="Submit" >Submit</button>
                </div>
            </form>
        </div>

       
        <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr.no</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php

$sql= "SELECT * FROM `users`";
 $result= mysqli_query($conn,$sql);
 $sno=0;
while($row=mysqli_fetch_assoc($result)){
   $sno = $sno +1;
   echo "<tr>
<td scope='row' data-label='Sr.no'>". $sno ."</td>
<td data-label='First Name'>". $row['FirstName'] ."</td>
<td data-label='Last Name'>". $row['LastName'] ."</td>
<td data-label='E-mail'> ". $row['E-mail'] ."</td>
<td data-label='Phone No.'>" . $row['Phone No'] ."</td>
<td data-label='Update'><a href='edit.php?id=$row[id]' class='btnedit'>Edit</a>  <a href='delete.php?id=$row[id]' class='btndel'>Delete</a></td>
 </tr>";
}

?>


            </tbody>
        </table>
    </div>
   