<?php
    // Database connection details
    $host = 'localhost';
    $dbname = 'sms_db';
    $username = 'root';
    $password = '';

    if (isset($_POST['ok'])) {
        $mobileNo = $_POST['mno'];

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);
        $msg = "Your OTP is: $otp";

        // Connect to the database
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert the OTP and mobile number into the database
            $stmt = $pdo->prepare("INSERT INTO otps (mobile_no, otp, created_at) VALUES (:mobile_no, :otp, NOW())");
            $stmt->bindParam(':mobile_no', $mobileNo);
            $stmt->bindParam(':otp', $otp);
            $stmt->execute();

            // Send the OTP via SMS
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

            curl_close($ch);

            if ($http_status == 200) {
                // Redirect with a success message
                header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OTP sent successfully');
                exit;
            } else {
                echo 'Unexpected HTTP status: ' . $http_status . ' ' . curl_error($ch);
            }
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }
    ?>