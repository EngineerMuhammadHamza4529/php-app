<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Number and Textarea Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Contact Form</h2>
        <form method="POST" action="send_sms.php">
    <label for="mno">Mobile Number:</label>
    <input type="text" class="form-control" id="mno" name="mno" required><br><br>
    <label for="msg">Message:</label>
    <input type="text"  class="form-control" id="msg" name="msg" required><br><br>
    <button type="submit" name="ok">Send Message</button>
</form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
