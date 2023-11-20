<?php
// Include the database connection file
include('db_conn.php');

// Retrieve data from the POST request
$price = $_POST['price'];
$snack_name = $_POST['name'];
$id = $_POST['user_id'];

// Check if the user is logged in
echo '<script>
var snackName = localStorage.getItem("snack_name");

if(!snackName){
    alert("로그인을 먼저 해주세요");
    window.location.href = "login.html";
}
</script>';

// Remove non-numeric characters from the price and convert to a valid decimal
$price = preg_replace("/[^0-9.]/", "", $price);
$price = floatval($price);

// Insert data into the "bucket" table
$sql = "INSERT INTO bucket (user_id, name, price) VALUES ('$id', '$snack_name', '$price')";
$result = mysqli_query($conn, $sql);

// Check for errors during insertion
if (!$result) {
    echo "에러: " . mysqli_error($conn); // Display error message
} else {
    // If insertion is successful, retrieve and display items in the cart
    $sql2 = "SELECT * from bucket WHERE user_id = '$id'";
    $result2 = mysqli_query($conn, $sql2);

    // Display items in the cart
    while($array = mysqli_fetch_array($result2)){
        echo $array['name']."<br>";
        echo $array['price']."<br>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
