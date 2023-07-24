<style>
    textarea {
        width: 100%;
        height: 100px;
        resize: none;
    }
</style>

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

session_start();
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


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "all_codes";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name FROM users WHERE id = $id";
$result = $conn->query($sql);


while ($row = $result->fetch_assoc()) {

    $nameuser = $row["name"];
};




?>


<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App[<?= $nameuser; ?>] ["SocialFuse"]</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function aj() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send();
        }
        setInterval(function() {
            aj()
        }, 1000);
    </script>
    <link rel="icon" href="../image/logo3.png">
</head>

<body onload="aj();">
    <p style="color: whitesmoke; font-weight: bold;">welcome sir <?= $nameuser; ?> in group chat</p>
    <div id="container">
        <div id="chatbox">
            <div id="chat">
            </div>
        </div>
        <form action="<?= "index.php?id=" . $id ?>" method="post">
            <textarea name="msg" placeholder="your msg"></textarea>
            <input type="submit" name="submit" value="Send">
        </form>
        <?php
        if (isset($_POST['submit'])) {

            $m = $_POST['msg'];

            $insert = "insert into chat (name,msg) values('$nameuser','$m')";
            $run_insert = mysqli_query($con, $insert);
            if ($run_insert) {
                echo '<embed loop="false" hidden="true" src="" autoplay="true"';
            }
            header('location: index.php?id=' . $id);
        }

        ?>
    </div>
</body>

</html>
<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->