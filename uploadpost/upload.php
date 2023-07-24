<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}

//echo $id;
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
    $name = $row["name"];
    $img = $row["image"];
};



?>


<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "like";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the post data from the form
// Get the post data from the form
// Get the post data from the form
$post_content = $_POST['post_content'];
$image = $_FILES['image']['name'];

// Sanitize and validate the data as needed

// Check if the post content is not empty
if (!empty($post_content)) {

    // Check if the image is not empty, then upload the image to a folder on the server
    if (!empty($image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        // Insert the post data into the database
        $sql = "INSERT INTO posts (posts, image, user_id, username, image_user) VALUES ('$post_content', '$image', '$id' ,'$name' , '$img')";
    } else {
        // Insert the post data into the database without the image
        $sql = "INSERT INTO posts (posts, user_id, username, image_user) VALUES ('$post_content', '$id' ,'$name' , '$img')";
    }

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Post uploaded successfully.";
        header('Location: ../posts.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Post content is empty!";
}
error_reporting(0);
error_reporting(E_ERROR | E_WARNING);

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Upload Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 18px;
            font-weight: bold;
        }

        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
    <link rel="icon" href="../image/logo3.png">
</head>

<body>
    <div class="container">
        <h1>Upload Post</h1>
        <form action="<?= "upload.php?id=" . $id; ?>" method="post" enctype="multipart/form-data">
            <label for="post_content">Post Content:</label>
            <textarea id="post_content" name="post_content"></textarea>
            <label for="image">Select Image:</label>
            <input type="file" id="image" name="image">
            <input type="submit" value="Upload">
        </form>
    </div>
</body>

</html>

<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->