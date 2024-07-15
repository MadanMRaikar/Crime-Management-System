<!DOCTYPE html>
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<title>Head Login</title>
  <?php
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x'] = 1;
    $conn = mysqli_connect("localhost", "root", "", "crime_portal");
    if(!$conn)
    {
        die("could not connect" . mysqli_connect_error());
    }
    mysqli_select_db($conn, "crime_portal");
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['h_id']; // Corrected name here
        $pass = $_POST['h_pass']; // Corrected name here
        $result = mysqli_query($conn, "SELECT h_id, h_pass FROM head WHERE h_id='$name' AND h_pass='$pass'");
        
        if(mysqli_num_rows($result) == 0)
        {
            $message = "Id or Password not Matched.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
            header("location:headHome.php");
        }
    }
}
?>

 
</head>
<body style="color: black;background-image: url(locker.jpeg);background-size: 100%;background-repeat: no-repeat;back">
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="official_login.php">Official Login</a></li>
        <li class="active"><a href="headlogin.php">HQ Login</a></li>
      </ul>
    
    </div>
  </div>
 </nav>
 <div  align="center" >
  <div class="form" style="margin-top: 15%">
  <form method="post" action="headHome.php">
    <input type="text" name="h_id" placeholder="Enter Head ID">
    <input type="password" name="h_pass" placeholder="Enter Password">
    <button type="submit" name="s">Submit</button>
</form>
  </div>
</div>
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Crime Portal 2024</b></h4>
</div>


</body>
</html>

