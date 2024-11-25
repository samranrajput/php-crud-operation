<?php
include 'db.php';

// Users table se data fetch karne ki query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Users</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        div{
            width: 100%;
            text-align: center;
        }
        div a {
            text-decoration: none;
            text-align: center;
            background-color: black;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">User Records</h1>
    <div>
        <a href="create.php">Add</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Agar query ka result rows return kare to data display karein
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a href='update.php?id={$row['id']}'>Edit</a>
                            </td>
                            <td>
                                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
