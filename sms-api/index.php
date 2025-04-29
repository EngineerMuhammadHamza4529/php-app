<!DOCTYPE html>
<html>
<head>
<title>Send SMS Registration Form to Mobile</title>
<style>
.container{
	width: 300px;
	margin: 50px auto;
	border:2px solid;
	padding: 20px 20px 20px 20px;
	background-color: darkcyan;  
}  
</style>
</head>
<body>
<center><h1>Registration Form With Send SMS in Mobile Live Example</h1></center>
<div class="container">

	<form action="" method="post">
		<table>
		<tr>
		<td>Name :</td>
		<td><input type="text" name="name" placeholder="Enter Name"></td>
		</tr>
		<tr>
		<td>Email :</td>
		<td><input type="email" name="email" placeholder="Enter Email"></td>
		</tr>
		<tr>
		<td>Contact No :</td>
		<td><input type="text" name="contact" placeholder="Contact No"></td>
		</tr>
		<tr>
		<td></td>
		<td>
		 <button type="submit"  name="submit">Submit</button>
		</td>
		</tr>
		</table>
	</form>
	
</div>
<center><a href="view_data.php" >View Data</a></center>
</body>
</html>

<?php
$conn = mysqli_connect("localhost","root","","sms");

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	
	if($name=='' || $email=='' || $contact==''){
		echo "<script>alert ('All fields are required!')</script>";
		exit();
	} else{
		
		$query = "INSERT INTO register(name,email,contact) VALUES ('$name','$email','$contact')";
	
		$run_query = mysqli_query($conn,$query);
		
		// SMS Code Start Here
		
		 $msg = urlencode('www.tools4noobs.com/dsaf');
 
  $dest_mobileno=$contact;
 $sms = urlencode(htmlspecialchars("Congratulation ".$name." you have registration Successfully "));
 $username = "ASRGROUP"; //use your sms api username
 $pass = "123456"; //enter your password
 $senderid = "ASRGRP";//BTOYOU use your sms api sender id
 $priority = "ndnd";//BTOYOU use your sms api sender id
 $stype = "normal";//BTOYOU use your sms api sender id
        $sms_url = sprintf("http://bhashsms.com/api/sendmsg.php?user=$username&pass=$pass&sender=$senderid&phone=$dest_mobileno&text=$sms&priority=$priority&stype=$stype");
 
 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,$sms_url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch,CURLOPT_TIMEOUT, '3');
 $content = trim(curl_exec($ch));
 curl_close($ch);
		//SMS Code End Here
		
		echo "<script>alert('Submited Successfully!')</script>";
	}
}

?>








