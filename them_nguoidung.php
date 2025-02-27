<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $email      = $_POST['email'];
    $phanquyen  = $_POST['phanquyen'];
    $sdt        = $_POST['sdt'];
    $diachi     = $_POST['diachi'];
    $targetDir = "uploads/";
    $fileName  = basename($_FILES["anh"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $uploadOk  = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if (!empty($fileName)) {
        $allowedTypes = array('jpg','png','jpeg','gif');
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["anh"]["tmp_name"], $targetFilePath)) {
                $uploadedImage = $targetFilePath;
            } else {
                $uploadOk = 0;
                $uploadedImage = "";
            }
        } else {
            $uploadOk = 0;
            $uploadedImage = "";
        }
    } else {
        $uploadedImage = "";
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if ($uploadOk == 1) {
        $sql = "INSERT INTO frm_dangky 
                (username, password, email, phanquyen, sdt, diachi, anh) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", 
            $username, 
            $hashedPassword, 
            $email, 
            $phanquyen, 
            $sdt, 
            $diachi, 
            $uploadedImage
        );
        if ($stmt->execute()) {
            header("Location: quanlynguoidung.php?success=1");
            exit();
        } else {
            echo "Lỗi thêm người dùng: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Có lỗi khi upload ảnh!";
    }
}
$conn->close();
?>
