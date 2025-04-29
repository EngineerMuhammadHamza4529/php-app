	<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>View Data</h2>
  <h3>Send SMS from Database using Php and Mysql with API</h3> 
<br>  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </thead>	
    <tbody>
<?php 
	$conn = mysqli_connect("localhost","root","","sms");
	$query ="SELECT * FROM register";
	$run_query = mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$name = $row['name'];
		$email = $row['email'];
		$contact = $row['contact'];
	
?>
	<form action="" method="post">
      <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $contact; ?></td>
        <td><input type="text" name="message" class="form-control"></td>
        <td><button type="submit" name="submit" class="btn btn-success">Send SMS</button></td>
      </tr> 
	</form>	  
	<?php } ?>
    </tbody>
  </table>
  <a href="index.php">Go Back</a>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])){
	$message = $_POST['message'];
	if($message==''){
		echo "<script>alert('Field must not be empty')</script>";
		exit();
	} else{
		
		// SMS Code Start Here
		
		 $msg = urlencode('www.tools4noobs.com/dsaf');
 
  $dest_mobileno=$contact;
 $sms = urlencode(htmlspecialchars("$name $message"));
 $username = "*****"; //use your sms api username
 $pass = "******"; //enter your password
 $senderid = "******";//BTOYOU use your sms api sender id
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
		echo "<script>alert('SMS send Successfully')</script>";
	}
}

?>