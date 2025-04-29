<?php
// Database connection details
$host = 'localhost';
$dbname = 'sms_db';
$username = 'root';
$password = '';

if (isset($_POST['ok'])) {
    $mobileNo = $_POST['mno'];
    $msg = $_POST['msg'];

    // Connect to the database
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert the message into the database
        $stmt = $pdo->prepare("INSERT INTO messages (mobile_no, message) VALUES (:mobile_no, :message)");
        $stmt->bindParam(':mobile_no', $mobileNo);
        $stmt->bindParam(':message', $msg);
        $stmt->execute();

        // Send the SMS
        $url = 'https://9lq61y.api.infobip.com/sms/1/text/single'; // Use the correct endpoint

        $data = array(
            'from' => 'ServiceSMS',
            'to' => $mobileNo,
            'text' => $msg
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: App bfa3da3af7eeef01e6b393e49dfa6ff7-70acf20d-e9ac-4523-8854-b64b26e3aba9',
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_status == 200) {
            echo "Message sent successfully: " . $response;
        } else {
            echo 'Unexpected HTTP status: ' . $http_status . ' ' . curl_error($ch);
        }

        curl_close($ch);
    } catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
    }
}
?>
