<?php
$conn = mysqli_connect("localhost", "root", "", "personal_finance_tracker");

if ($conn) {
    echo "Connection Successful<br>";
} else {
    echo "Connection Failed";
    mysqli_close($conn);
}

if ($conn && isset($_POST['submit'])) {
    $AccountID = $_POST['AccountID'];
    $PaymentMethod = $_POST['PaymentMethod'];
    $Amount = $_POST['Amount'];
    $TransactionType = $_POST['TransactionType'];
    $Category = $_POST['Category'];
    $ActualSpent = $_POST['ActualSpent'];

    $sql = "INSERT INTO Transaction (AccountID, PaymentMethod, Amount, TransactionType, Category, ActualSpent)
            VALUES ('$AccountID', '$PaymentMethod', '$Amount', '$TransactionType', '$Category', '$ActualSpent')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Transaction added successfully.";
    } else {
        echo "Error in insertion: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    Account ID: <input type="number" name="AccountID"><br>
    Payment Method:
    <select name="PaymentMethod">
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
        <option value="UPI">UPI</option>
        <option value="Bank Transfer">Bank Transfer</option>
    </select><br>
    Amount: <input type="text" name="Amount"><br>
    Transaction Type:
    <select name="TransactionType">
        <option value="Deposit">Deposit</option>
        <option value="Withdraw">Withdraw</option>
    </select><br>
    Category: <input type="text" name="Category"><br>
    Actual Spent: <input type="text" name="ActualSpent"><br>
    <input type="submit" name="submit" value="Add Transaction">
</form>
