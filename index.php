<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول احترافي</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container, .logout-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
session_start();

// التحقق من تسجيل الخروج
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// التحقق من تسجيل الدخول
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    if ($userId === '888' && $password === '888') {
        $_SESSION['loggedin'] = true;
        header('Location: login.php');
        exit();
    } else {
        $error = "ID أو كلمة المرور غير صحيحة!";
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo '
    <div class="logout-container">
        <h1>مرحبا بك!</h1>
        <form method="get">
            <button type="submit" name="logout">تسجيل الخروج</button>
        </form>
    </div>';
} else {
    echo '
    <div class="login-container">
        <h1>تسجيل الدخول</h1>
        <form method="post">
            <label for="userId">الرقم التعريفي (ID):</label>
            <input type="text" name="userId" placeholder="أدخل ID" required>

            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" placeholder="أدخل كلمة المرور" required>

            <button type="submit">تسجيل الدخول</button>
        </form>';

    if (isset($error)) {
        echo '<p class="error">' . $error . '</p>';
    }

    echo '</div>';
}
?>

</body>
</html>
