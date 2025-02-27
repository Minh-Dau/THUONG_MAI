<?php include 'header.php'; ?>
<?php
include("config.php");
// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$query = "SELECT email, sdt, diachi, anh FROM frm_dangky WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

    if ($email != $user['email'] || $sdt != $user['sdt'] || $diachi != $user['diachi']) {
        $update_query = "UPDATE frm_dangky SET email='$email', sdt='$sdt', diachi='$diachi' WHERE username='$username'";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Cập nhật thông tin thành công!'); window.location.reload();</script>";
        }
    }
    // Xử lý upload ảnh
    if (!empty($_FILES["anh"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); 
        }
        $imageFileType = strtolower(pathinfo($_FILES["anh"]["name"], PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png", "gif");
    
        if (in_array($imageFileType, $allowed_types)) {
            $target_file = $target_dir . md5(time() . $username) . "." . $imageFileType; 
    
            if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                if ($target_file != $user['anh']) {
                    $update_image_query = "UPDATE frm_dangky SET anh='$target_file' WHERE username='$username'";
                    if (mysqli_query($conn, $update_image_query)) {
                        echo "<script>alert('Cập nhật ảnh thành công!');</script>";
                    }
                }
            } else {
                echo "<script>alert('Lỗi khi tải ảnh lên!');</script>";
            }
        } else {
            echo "<script>alert('Chỉ chấp nhận JPG, JPEG, PNG, GIF!');</script>";
        }
    }
    if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_pass_query = "UPDATE frm_dangky SET password='$hashed_password' WHERE username='$username'";
            if (mysqli_query($conn, $update_pass_query)) {
                echo "<script>alert('Cập nhật mật khẩu thành công!');</script>";
            }
        } else {
            echo "<script>alert('Mật khẩu xác nhận không khớp!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ Sơ Của Tôi</title>
    <style>
        .profile-container {
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .profile-container h2 {
            margin-top: 0;
            color: #333;
        }
        .profile-container p {
            color: #777;
            font-size: 14px;
        }
        /* Style cho ảnh đại diện */
        .avatar {
            display: block;
            margin: 0 auto 20px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        /* Style cho form cập nhật thông tin */
        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .profile-form label {
            font-weight: bold;
            color: #555;
        }
        .profile-form input[type="email"],
        .profile-form input[type="text"],
        .profile-form input[type="password"],
        .profile-form input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .profile-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .profile-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Hồ Sơ Của Tôi</h2>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        <?php if (!empty($user['anh'])): ?>
            <img src="<?= $user['anh']; ?>" alt="Ảnh đại diện" class="avatar">
        <?php endif; ?>
        <form class="profile-form" method="POST" enctype="multipart/form-data">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $user['email']; ?>" required>

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="sdt" value="<?= $user['sdt']; ?>" required>

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="diachi" value="<?= $user['diachi']; ?>" required>

            <label for="avatar">Ảnh đại diện</label>
            <input type="file" id="avatar" name="anh">

            <label for="password">Mật khẩu mới</label>
            <input type="password" id="password" name="password">

            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="password" id="confirm_password" name="confirm_password">

            <button type="submit" class="btn">Lưu</button>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
