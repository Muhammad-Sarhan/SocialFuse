

<!DOCTYPE html>
<html>

<head>
	<title>Search Bar </title>

	<style>
		body {
			background-color: black;
			color: white;
			font-family: Arial, sans-serif;
		}

		form {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: 50px;
		}

		label {
			margin-right: 20px;
			font-size: 20px;
		}

		input[type="text"] {
			padding: 10px;
			border: none;
			border-radius: 25px;
			background-color: #1b1b1b;
			color: white;
			font-size: 18px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			transition: all 0.3s ease-in-out;
			width: 300px;
			outline: none;
		}

		input[type="text"]:focus {
			width: 400px;
		}

		input[type="submit"] {
			padding: 10px 20px;
			border: none;
			border-radius: 25px;
			background-color: #2ecc71;
			color: white;
			font-size: 18px;
			cursor: pointer;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			transition: all 0.3s ease-in-out;
			margin-left: 10px;
			outline: none;
		}

		input[type="submit"]:hover {
			background-color: #27ae60;
		}

		h2 {
			margin-top: 50px;
			font-size: 24px;
		}

		a {
			display: block;
			margin-top: 20px;
			color: white;
			text-decoration: none;
			transition: all 0.3s ease-in-out;
		}

		a:hover {
			color: #2ecc71;
		}

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
	<link rel="icon" href="../image/logo3.png">
</head>

<body>

	<form method="post">
		<label>Search</label>
		<input type="text" name="search" minlength="3" maxlength="50" required>
		<input type="submit" name="submit" value="Search">
	</form>

	<?php
	// Establish database connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "like";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Validate user input
	if (isset($_POST["submit"])) {
		$search = trim($_POST["search"]);
		if (strlen($search) < 3 || strlen($search) > 50) {
			echo "Search query must be between 3 and 50 characters long.";
			exit;
		}
	}

	// Sanitize user input
	$search = mysqli_real_escape_string($conn, $search);

	// Limit search results
	$limit = 10;

	// Use prepared statements and parameter binding
	$stmt = $conn->prepare("SELECT * FROM posts WHERE username LIKE ? OR posts LIKE ? LIMIT ?");
	$search_param = '%' . $search . '%';
	$stmt->bind_param("ssi", $search_param, $search_param, $limit);
	if ($stmt->execute()) {
		$result = $stmt->get_result();
		echo "<h2>Search results for '$search':</h2>";
		while ($row = $result->fetch_assoc()) {
			$video_file = $row["image"];
			$image_url = $row["image_user"];
			$nnmme = $row["username"];

			// Output search results
			?>
			<a href="<?= "../posts.php?id=" . $row["id"] ?>" style="display: inline-block; width: 360px;">
				<div class="user-info" style="display: inline-block;">
					<div class="video-container">
						<video src="../uploadpost/uploads/<?= $video_file; ?>" style="width: 360px;" id="vidios"></video>
					</div>
					<div class="name-container">
						<img src="../uploaded_img/<?= $image_url ?>" class="user-image" style="border-radius: 50%; display: inline-block; width: 40px; border: none;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
						<p style="display: inline-block;"><?= $nnmme ?></p>
					</div>
				</div>
			</a>
			<?php
		}
		if ($result->num_rows == 0) {
			echo "No results found.";
		}
	} else {
		echo 'Error in Query Execution';
	}

	$stmt->close();
	$conn->close();
	?>

</body>

</html>

<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->