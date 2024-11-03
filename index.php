<?php

// Set the content type to HTML
header("Content-Type: text/html; charset=UTF-8");

// Start the HTML output
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>My PHP Server</title>";
echo "</head>";
echo "<body>";
echo "<h1>Hello, World!</h1>";
echo "<p>Welcome to my PHP server running in Docker!</p>";
echo "<p>Current Date and Time: " . date('Y-m-d H:i:s') . "</p>";
echo "</body>";
echo "</html>";

?>