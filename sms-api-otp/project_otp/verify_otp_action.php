<?php
// Database connection details
$host = 'localhost';
$dbname = 'otp_db';
$username = 'root';
$password = '';

if (isset($_POST['verify_otp'])) {
    $mobileNo = $_POST['mno'];
    $otp = $_POST['otp'];

    // Connect to the database
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check the OTP
        $stmt = $pdo->prepare("SELECT otp FROM otps WHERE mobile_no = :mobile_no AND otp = :otp ORDER BY created_at DESC LIMIT 1");
        $stmt->bindParam(':mobile_no', $mobileNo);
        $stmt->bindParam(':otp', $otp);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "OTP Verified Successfully!";
        } else {
            echo "Invalid OTP or OTP expired.";
        }
    } catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
    }
}
?>
