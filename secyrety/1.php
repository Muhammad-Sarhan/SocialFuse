<?php
// $db = new mysqli('localhost', 'username', 'password', 'database');

// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }

// $userInput = $_POST['userInput'];

// $sanitizedInput = $db->real_escape_string($userInput);

// $sql = "INSERT INTO myTable (myColumn) VALUES ('$sanitizedInput')";

// if ($db->query($sql) === TRUE) {
//     echo "Record inserted successfully";
// } else {
//     echo "Error inserting record: " . $db->error;
// }

// $db->close();




?>
<?php
// اتصال بقاعدة البيانات
$db = new mysqli('localhost', 'root', '', 'like');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// حماية من SQL Injection
function clean($data) {
    global $db;
    return $db->real_escape_string($data);
}

// تحقق من محاولة الدخول
$username = clean($_POST['username']);
$password = clean($_POST['password']);

// يمكنك أن تستخدم دالة مثل password_verify() للتحقق من كلمة المرور هنا

$loginSuccess = false; // تعيين هذه القيمة بناءً على نتيجة التحقق من الدخول

if (!$loginSuccess) {
    // تسجيل محاولة الاختراق
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $timestamp = date("Y-m-d H:i:s");
    $username = clean($username);

    $sql = "INSERT INTO intrusionAttempts (ipAddress, timestamp, username) VALUES ('$ipAddress', '$timestamp', '$username')";

    if ($db->query($sql) === TRUE) {
        echo "Intrusion attempt recorded";
    } else {
        echo "Error recording intrusion attempt: " . $db->error;
    }

    // إعادة توجيه المستخدم إلى صفحة خطأ
    header("Location: error.php");
    exit;
}

$db->close();
?>

