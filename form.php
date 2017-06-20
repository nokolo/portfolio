<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<script src="validate.js"></script>
<link rel="stylesheet" href="css/bio.css">
</head>
<body> 
<div class="topNav" id="menutop">
<ul class="breadcumbs">
<li> <a href="bio.html">Biography</a></li>
<li> <a href="sports.html">Favorite Sports Teams</a></li>
<li> <a href="recipes.html">Favorite Recipes</a></li>
<li class="active"> <a href="form.php">Register Contacts</a></li>
<li> <a href="resume1.html">Resume</a></li>
<li> <a href="../gallery.html">Gallery</a></li>
<li> <a href="loginfin.php">Login</a></li>
 </ul>
</div>

<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit']))
{
  echo "<meta http-equiv='refresh' content='0'>";
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $website = mysqli_real_escape_string($conn, $_POST['website']);
   $sql = "
  INSERT INTO myguests (id, firstname, lastname, email) VALUES (NULL, '". $firstname ."','". $lastname ."', '". $website ."')";

if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully";
} else {
    echo  "<br>Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?> 

<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $genderErr = $websiteErr = "";
$firstname = $lastname = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = " First Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed"; 
    }
  }
    if (empty($_POST["lastname"])) {
    $lastnameErr = " Last Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Register your contact info!</h2>
<p><span class="error">* required field.</span></p>
<form id="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate onsubmit="return validateForm();">  
 <b>First Name:</b> <input type="text" name="firstname" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
 <b>Last Name:</b> <input type="text" name="lastname" value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  <b>Website:</b> <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    ajax_call = function() {
        $.ajax({ 
            type: "GET",
            url: "form.php",
            dataType: "html",                
            success: function (response) {
               //window.location.reload(true);
               
            }
        });
    };
   
});



</script>

</body>
</html>