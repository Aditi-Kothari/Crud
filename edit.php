

<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['id'];
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $mail=$_POST["mail"];
    $phone=$_POST["phone"];

	// update user data
   
	$result = mysqli_query($conn, "UPDATE users SET `FirstName` = '$fname', `LastName` = '$lname', `E-mail` = '$mail', `Phone No` = '$phone' WHERE id=$id");

	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

while($row = mysqli_fetch_array($result))
{
	$fname =  $row['FirstName'] ;
    $lname = $row['LastName'] ;
	$mail =  $row['E-mail'] ;
	$phone = $row['Phone No'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>



<div class="box">
            <div class="title">
                Edit/Update
            </div>
            <form action="edit.php" method="post">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" value="<?php echo $lname; ?>">
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" placeholder="Enter Your E-mail" name="mail" value="<?php echo $mail; ?>">
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone" value="<?php echo $phone; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="btn">
                    <button type="submit"name="update" >Update</button>
                </div>
            </form>
        </div>
</body>
</html>