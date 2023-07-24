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
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);




while ($row = $result->fetch_assoc()) {
    $idem = $row["id"];
    $nameer = $row["name"];
    $emailee = $row["email"];
    $imageee = $row["image"];
    $discrp = $row["discripton"];
};
// echo "welcome " . $name . " in profile " . $nameer;



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile : <?= $nameer; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../uploaded_img/<?= $imageee; ?>">
    <style>
        :root {
            --primary-color: #000;
            --secondary-color: #fff;
            --accent-color: #00b8ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }

        header {
            background-color: var(--accent-color);
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
        }

        main {
            padding: 20px;
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: var(--secondary-color);
            border-radius: 10px;
            box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);
            position: relative;
            background-color: blue;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            text-align: center;
            margin-top: 20px;
        }

        .profile-name {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .profile-description {
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .social-media {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social-media li {
            margin: 0 10px;
        }

        .social-media li a {
            color: var(--primary-color);
            font-size: 1.5rem;
            transition: color 0.2s ease-in-out;
        }

        .social-media li a:hover {
            color: var(--accent-color);
        }

        .edit-profile {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        .edit-profile:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
        }

        footer {
            background-color: var(--primary-color);
            padding: 10px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 1.2rem;
        }

        .emailname {
            text-decoration: none;
            color: white;
        }

        .emailname:hover {
            color: rgb(128, 128, 128);
        }
    </style>
</head>
<?php
// Connect to your database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'all_codes';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if there is a row in the database with the same specifications
$query = "SELECT COUNT(id) as count FROM `folwers` WHERE admin_id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
  // Fetch the result as an associative array
  $row = mysqli_fetch_assoc($result);
  // Get the count of rows
  $numberfollow = $row['count'];
} else {
  // Handle the error if the query fails
  echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<body>
    <header>
        <h1>Profile : <?= $nameer; ?></h1>
    </header>
    <main>
        <section class="profile">
            <div class="profile-image">
                <img src="../uploaded_img/<?= $imageee; ?>" alt="Profile Image">
            </div>
            <div class="profile-info">
                <h2 class="profile-name"><?= $nameer; ?></h2>
                <p><?= $numberfollow; ?> subscribe</p>
                <!-- Replace 'your_value' with the value you want to check for in the database -->
                <?php include 'subscripe.php'; ?>
                <a href="<?php echo $button_link; ?>">
                    <button class="<?php echo $button_class; ?>">
                        <span class="button-text"><?php echo $button_text; ?></span>
                    </button></a><br><br>
                <a href="mailto:<?= $emailee; ?>" class="emailname"><?= $emailee; ?></a>
                <p class="profile-description"><?= $discrp; ?></p>
                <ul class="social-media">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </section>
        <br><br><br>
        <section>
            <center>
                <h2 style="background: blue;">Video</h2>
            </center>
            <br><br><br><br>

            <?php
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'all_codes';

            $conn = mysqli_connect($host, $user, $password, $database);

            if (!$conn) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            $sql = "SELECT id, file, video_name, account_holder_image FROM videos WHERE size = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);

                    $video_url = $row['file'];
                    $nme = $row['video_name'];
                    $idvidios = $row['id'];
                    $image_url = $row['account_holder_image'];

            ?>

                    <a href="<?= "../show-videos.php?id=" . $idvidios ?>" style="display: inline-block; width: 360px;">
                        <div class="user-info" style="display: inline-block;">
                            <div class="video-container">
                                <video src="../<?= $video_url ?>" style="width: 360px;" id="vidios"></video>
                            </div>
                            <div class="name-container">
                                <img src="../<?= $image_url ?>" class="user-image" style="border-radius: 50%; display: inline-block; width: 40px; border: none;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
                                <p style="display: inline-block; color: black;"><?= $nme ?></p>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }

            ?>

        </section>
        <style>
            .user-info {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px;
                background-color: #1b1b1b;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                transition: all 0.3s ease-in-out;
                /* width: 2900px; */
            }

            .user-info:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
            }

            .video-container {
                position: relative;
                width: 360px;
                height: 200px;
                margin-right: 20px;
                overflow: hidden;
                border-radius: 10px;
            }

            .video-container::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
                transition: all 0.3s ease-in-out;
                opacity: 0;
            }

            .video-container:hover::before {
                opacity: 1;
            }

            .video-container video {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: 0;
            }

            .name-container {
                display: flex;
                align-items: center;
            }

            .user-image {
                margin-right: 10px;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                border: none;
            }

            p {
                margin: 0;
                font-size: 18px;
            }
        </style>
    </main>
    <!-- <footer><p>&copy; 2023 Social Fuse All rights reserved.</p></footer> -->
    <script src="script.js">
        const editProfileButton = document.querySelector('.edit-profile');
        const profileName = document.querySelector('.profile-name');
        const profileDescription = document.querySelector('.profile-description');

        editProfileButton.addEventListener('click', () => {
            const newName = prompt('Enter new name:');
            const newDescription = prompt('Enter new description:');
            if (newName && newDescription) {
                profileName.textContent = newName;
                profileDescription.textContent = newDescription;
            }
        });

        // Add animation to the profile image on hover
        const profileImage = document.querySelector('.profile-image');
        profileImage.addEventListener('mouseenter', () => {
            profileImage.style.animation = 'spin 2s linear infinite';
        });

        profileImage.addEventListener('mouseleave', () => {
            profileImage.style.animation = '';
        });
    </script>

</body>

</html>