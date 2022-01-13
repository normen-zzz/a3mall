<?php
include_once 'db.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "INSERT INTO soon (email)
     VALUES ('$email')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
