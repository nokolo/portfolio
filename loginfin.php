<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
      $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
      $lastname = mysqli_real_escape_string($db,$_POST['lastname']); 
      
      $sql = "SELECT * FROM myguests WHERE firstname = '$firstname' and lastname = '$lastname'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);

      $error = "Your Login Name or Password is invalid";
      
		
      if($count == 1) {
         //session_register("firstname");
         $_SESSION['username']= "username"; 
         $_SESSION['login_user'] = $firstname;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
     }
   }
?>
<!DOCTYPE html>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="css/bio.css">
       <style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   <div class="topNav" id="menutop">
<ul class="breadcumbs">
<li> <a href="bio.html">Biography</a></li>
<li> <a href="sports.html">Favorite Sports Teams</a></li>
<li> <a href="recipes.html">Favorite Recipes</a></li>
<li> <a href="form.php">Register Contacts</a></li>
<li> <a href="resume1.html">Resume</a></li>
<li> <a href="../gallery.html">Gallery</a></li>
<li class="active"> <a href="loginfin.php">Login</a></li>
 </ul>
</div><br><br><br>

<!--


-->
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>First Name  :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                  <label>Last Name  :</label><input type = "text" name = "lastname" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>
    
   </body>
</html>