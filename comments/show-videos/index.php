<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}

// Connect to your database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'all_codes';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if there is a row in the database with the same specifications
$query = "SELECT * FROM comments WHERE post_id = '$id'";
$result = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    $userrrname = $row['username'];
    $imggg = $row['photoname'];
    $commen = $row['comment'];
    $iduser = $row['user_id'];
    $postsid = $row['post_id'];

    // // Display the comment
    // echo "<p>Username: $userrrname</p>";
    // echo "<p>User ID: $iduser</p>";
    // echo "<p>Comment: $commen</p>";
    // echo "<img src='../../uploaded_img/$imggg' alt='User photo'>";
    // echo "<hr>";



?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body style="background-color: black;">
    <a href="<?= "../../user_page_profile/index.php?id=" . $iduser ?>">
        <div style="position: relative;position: absolute;">
            <img src="../../uploaded_img/<?= $imggg; ?>" alt="" style="border-radius: 50%; width: 70px; margin-left: 20px;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
            <p style="font-weight: bold; top: -2px;color: #fff;"><?= $commen; ?></p>
            <p style="font-weight: bold; position: absolute; left: 100px; top: -10px;"><?= $userrrname; ?></p>
            
        </div>
        <br><br><br><br><br><br>
        <hr style="color: white;">
    </a>
    <?php
}
    ?>

    <a href="<?= "../../show-videos.php?id=" . $postsid; ?>" style="font-weight: bold; color: #fff; text-decoration: none; justify-items: center;"> > back to video</a>
    
</body>

</html>