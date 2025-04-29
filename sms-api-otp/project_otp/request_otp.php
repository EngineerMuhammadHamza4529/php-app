<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Request OTP</h2>
        <form action="send_otp.php" method="post">
            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" class="form-control" id="mno" name="mno" placeholder="Enter your mobile number" required>
            </div>
            <button type="submit" name="request_otp" class="btn btn-primary btn-block">Request OTP</button>
        </form>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery (Optional for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
