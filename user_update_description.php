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

// Retrieve user data from database
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $description = $row["discripton"];
}

// Update user description in database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_description = mysqli_real_escape_string($conn, $_POST["description"]);
    if (!empty($new_description)) {
        $sql2 = "UPDATE `users` SET `discripton`='$new_description' WHERE id = $id";
        if ($conn->query($sql2) === TRUE) {
            $message = "Description updated successfully.";
        } else {
            $message = "Error updating description: " . $conn->error;
        }
    } else {
        $message = "Description cannot be empty.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Description ["SocialFuse"]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
        }

        h1 {
            margin-top: 50px;
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        textarea:focus {
            outline: none;
            border-color: #007bff;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            font-weight: bold;
            animation: fadeinout 2s ease-in-out;
        }

        @keyframes fadeinout {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
    <link rel="icon" href="image/logo3.png">
</head>
<body>
    <h1>Update Description</h1>
    <?php if (isset($message)) { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>
    <form action="<?= "user_update_description.php?id=" . $id; ?>" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50"><?= $description ?></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
</html>


<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->