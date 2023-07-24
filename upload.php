<?php
require_once('db.php');
?>


<!DOCTYPE html>
<html>

<head>
    <title>upload videos ["SocialFuse"]</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .upload-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .upload-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .upload-form label {
            display: block;
            margin-bottom: 10px;
        }

        .upload-form input[type="text"],
        .upload-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        .upload-form input[type="file"] {
            margin-bottom: 20px;
        }

        .upload-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <link rel="icon" href="image/logo3.png">
</head>

<body>
    <div class="upload-form">
        <h2>رفع الفيديو</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="video">الفيديو:</label>
            <input type="file" name="video" id="video" required>

            <label for="name">الاسم:</label>
            <input type="text" name="name" id="name" required>

            <label for="image">الصورة:</label>
            <input type="file" name="image" id="image" required>

            <label for="description">الوصف:</label>
            <textarea name="description" id="description" required></textarea>

            <input type="submit" value="رفع">
        </form>
    </div>
    <?php

    // تأكد من أن الطلب هو POST وأن الفيديو تم تحميله بنجاح
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        // تحديد متغيرات البيانات
        $name = $_POST['name'];
        $description = $_POST['description'];
    
        // تحميل الصورة والفيديو
        $video_tmp_name = $_FILES['video']['tmp_name'];
        $video_name = $_FILES['video']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
    
        // تحديد مسار الحفظ
        $uploads_dir = 'uploads/';
        $video_path = $uploads_dir . $video_name;
        $image_path = $uploads_dir . $image_name;
    
        // نقل الفيديو والصورة المحملين إلى المسار المحدد
        move_uploaded_file($video_tmp_name, $video_path);
        move_uploaded_file($image_tmp_name, $image_path);
    
        // الاتصال بقاعدة البيانات
        $db_host = 'localhost';
        $db_user = 'username';
        $db_pass = 'password';
        $db_name = 'database_name';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        // تأكد من الاتصال بقاعدة البيانات
        if (!$conn) {
            die('خطأ في الاتصال: ' . mysqli_connect_error());
        }
    
        // إضافة الفيديو والبيانات المرفقة إلى جدول الفيديوهات في قاعدة البيانات
        $sql = "INSERT INTO videos (name, description, video_path, image_path) VALUES ('$name', '$description', '$video_path', '$image_path')";
    
        if (mysqli_query($conn, $sql)) {
            echo "تم رفع الفيديو بنجاح";
        } else {
        echo "خطأ في رفع الفيديو: " . mysqli_error($conn);
        }
    
        // إغلاق الاتصال بقاعدة البيانات
        mysqli_close($conn);
    }

    ?>
</body>

</html>


<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->