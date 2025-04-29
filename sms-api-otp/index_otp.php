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
        <form action="otp_sms.php" method="post">
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
    

</body>
</html>
