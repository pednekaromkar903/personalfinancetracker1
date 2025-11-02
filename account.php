<?php
$conn = mysqli_connect("localhost", "root", "", "personal_finance_tracker");

if ($conn) {
    echo "Connection Successful<br>";
} else {
    echo "Connection Failed";
    mysqli_close($conn);
}

if ($conn && isset($_POST['submit'])) {
    $UserID = $_POST['UserID'];
    $AccountType = $_POST['AccountType'];
    $Balance = $_POST['Balance'];

    $sql = "INSERT INTO Account (UserID, AccountType, Balance)
            VALUES ('$UserID', '$AccountType', '$Balance')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Account created successfully.";
    } else {
        echo "Error in insertion: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    User ID: <input type="number" name="UserID"><br>
    Account Type:
    <select name="AccountType">
        <option value="Savings">Savings</option>
        <option value="Business">Business</option>
    </select><br>
    Balance: <input type="text" name="Balance"><br>
    <input type="submit" name="submit" value="Add Account">
</form>