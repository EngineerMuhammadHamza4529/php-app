

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Live Search with PHP and AJAX</h1>
    <input type="text" id="search" placeholder="Search for products...">
    <div id="result"></div>

    <script>
        $(document).ready(function(){
            $('#search').on('input', function(){
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                } else {
                    $('#result').html('');
                }
            });
        });
    </script>
</body>
</html>
