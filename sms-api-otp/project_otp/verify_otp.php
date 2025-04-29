<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Verify OTP</h2>
        <form action="verify_otp_action.php" method="post">
            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" class="form-control" id="mno" name="mno" value="<?php echo htmlspecialchars($_GET['mno']); ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter the OTP" required>
            </div>
            <button type="submit" name="verify_otp" class="btn btn-primary btn-block">Verify OTP</button>
        </form>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery (Optional for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
