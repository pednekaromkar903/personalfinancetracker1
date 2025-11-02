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
    $BudgetAmount = $_POST['BudgetAmount'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];

    $sql = "INSERT INTO Budget (UserID, BudgetAmount, StartDate, EndDate)
            VALUES ('$UserID', '$BudgetAmount', '$StartDate', '$EndDate')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Budget set successfully.";
    } else {
        echo "Error in insertion: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    User ID: <input type="number" name="UserID"><br>
    Budget Amount: <input type="text" name="BudgetAmount"><br>
    Start Date: <input type="date" name="StartDate"><br>
    End Date: <input type="date" name="EndDate"><br>
    <input type="submit" name="submit" value="Set Budget">
</form>
