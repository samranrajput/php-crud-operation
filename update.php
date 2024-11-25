<?php
include 'db.php';

// Check if ID is passed via URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing user data
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "Record not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}

// Handle the form submission to update the data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update query
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to read.php after successful update
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        a {
            text-decoration: none;
            text-align: center;
            background-color: black;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Update User</h1>
    <a href="read.php">Read</a><br><br>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
