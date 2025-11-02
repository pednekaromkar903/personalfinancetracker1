<?php
$conn = mysqli_connect("localhost", "root", "", "personal_finance_tracker");

if ($conn) {
    echo "Connection Successful<br>";
} else {
    echo "Connection Failed";
    mysqli_close($conn);
}

if ($conn && isset($_POST['submit'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];

    $sql = "INSERT INTO User (FullName, Email, Password, Address, Phone)
            VALUES ('$FullName', '$Email', '$Password', '$Address', '$Phone')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User added successfully.";
    } else {
        echo "Error in insertion: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    Full Name: <input type="text" name="FullName"><br>
    Email: <input type="email" name="Email"><br>
    Password: <input type="password" name="Password"><br>
    Address: <input type="text" name="Address"><br>
    Phone: <input type="text" name="Phone"><br>
    <input type="submit" name="submit" value="Add User">
</form>