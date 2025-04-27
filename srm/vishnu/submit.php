
<?php
$servername = "localhost";
$username = "vishnu367";
$password = "vishnu763";
$dbname = "vvr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $AGE = $_POST['AGE'];

    // Handle file upload
    $target_dir = "uploads/";
    $file_name = basename($_FILES["document"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($file_type != "pdf") {
        die("Only PDF files are allowed.");
    }

    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO applications (name, email, phone, branch, AGE, document_path) 
                VALUES ('$name', '$email', '$phone', '$branch','$AGE', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }
}

$conn->close();
?>