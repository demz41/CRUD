<?php  
include 'includes/dbconnection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // 🔹 Replace [table name] and [table id] with your actual table and column names
    $sql = "SELECT * FROM [table name] WHERE [table id] = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
?>

