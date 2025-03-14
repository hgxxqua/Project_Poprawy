<!-- filepath: e:\CHUKU_PROJECT_ANAL\main.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_poprawy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['class'])) {
    // Get form data
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $class = $_POST['class'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, class) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $user, $email, $pass, $class);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
} else {
    echo "Form data is missing";
}

$conn->close();
?>