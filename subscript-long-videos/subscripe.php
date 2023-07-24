<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}

//echo $id;
?>
<?php

include '../config.php';


$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$user_id = $_SESSION['user_id'];
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

$name = $fetch_profile['name'];

if (!isset($user_id)) {
    header('location:login.php');
}



?>



<?php
// Connect to your database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'all_codes';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if there is a row in the database with the same specifications
$query = "SELECT * FROM folwers WHERE flwer_id = '$user_id' AND admin_id = '$id'";
$result = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($result);

// Set the button shape based on whether a match was found
if ($num_rows > 0) { // لو متابع
    $button_class = 'matching-button';
    $button_text = 'un subscribe';
    $button_link = 'remove-subscrip.php?id=' . $user_id . '&admin_id=' . $id;
} else { //لو مش متابع
    $button_class = 'non-matching-button';
    $button_text = 'subscribe';
    $button_link = 'add-subscribe.php?id=' . $user_id . '&admin_id=' . $id;
}


?>


<style>
    /* Style for the matching button */
    .matching-button {
        background-color: #4C6BBF;
        color: white;
        border: none;
        border-radius: 5px;
        width: 160px;
        height: 50px;
        font-size: 1.5rem;
        cursor: pointer;
    }

    /* Style for the non-matching button */
    .non-matching-button {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        width: 150px;
        height: 50px;
        font-size: 1.2rem;
        cursor: pointer;
    }

    /* Style for the text inside the button */
    .button-text {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>