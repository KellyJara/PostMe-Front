<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $destinationPath = 'uploads/' . basename($fileName);

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($tempFile, $destinationPath)) {
            // Save the path to the database
            // Connect to the database and execute a query to save the path
            // Example using MySQLi:
            $connection = new mysqli('localhost', 'username', 'password', 'database_name');
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "INSERT INTO users (photo_path) VALUES ('$destinationPath')";
            if ($connection->query($sql) === TRUE) {
                echo "Image uploaded and path saved successfully.";
            } else {
                echo "Error saving to database: " . $connection->error;
            }

            $connection->close();
        } else {
            echo "Error moving the file.";
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>