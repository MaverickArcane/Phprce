<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #1abc9c; /* Turquoise background */
        }
        .error-container {
            background-color: rgba(255, 255, 255, 0.8);
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        h1 {
            color: #FF0000;
        }
    </style>
    <script src="challenge1_source.js"></script>
</head>
<body>
    <div class="error-container">
        <?php
        function getRandomHexColor() {
            $characters = '0123456789ABCDEF';
            $color = '#';
            for ($i = 0; $i < 6; $i++) {
                $color .= $characters[rand(0, 15)];
            }
            return $color;
        }

        $default_error_code = "404"; // Default error code

        if (isset($_GET['error_code'])) {
            // Disable HTML entity encoding for this specific output
            $error_code = $_GET['error_code'];
            echo "<h1>Error Code: " . $error_code . "</h1>";
        } else {
            $default_url = $_SERVER['PHP_SELF'] . '?error_code=' . $default_error_code;
            echo "<h1>Error Code: " . $default_error_code . "</h1>";
            echo "<p>Visit this URL to see the default error code: <a href=\"" . htmlspecialchars($default_url) . "\">" . htmlspecialchars($default_url) . "</a></p>";
        }
        ?>
    </div>
</body>
</html>
