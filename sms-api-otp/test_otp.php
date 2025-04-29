<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send OTP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Send OTP</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" class="form-control" id="mno" name="mno" placeholder="Enter your mobile number" required>
            </div>
            <button type="submit" name="ok" class="btn btn-primary btn-block">Send OTP</button>
        </form>
    </div>

    <!-- Alert Handling -->
    <script>
        // Check if there is a success message in the query string
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            alert(urlParams.get('success'));
        }
    </script>
    
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
                header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OTP sent successfully to ' . htmlspecialchars($mobileNo));
                exit;
            } else {
                echo 'Unexpected HTTP status: ' . $http_status . ' ' . curl_error($ch);
            }
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }
    ?>
</body>
</html>
