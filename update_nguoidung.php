<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id         = $_POST['id'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $sdt        = $_POST['sdt'];
    $diachi     = $_POST['diachi'];
    $phanquyen  = $_POST['phanquyen'];
    $trangthai  = $_POST['trangthai']; 
    $password   = $_POST['password']; 
    if (isset($_FILES['anh']) && $_FILES['anh']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['anh']['name']);
        if (move_uploaded_file($_FILES['anh']['tmp_name'], $targetFile)) {
            $anh = $targetFile;
        } else {
            $anh = $_POST['current_anh'];
        }
    } else {
        $anh = $_POST['current_anh'];
    }
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE frm_dangky
                SET username=?, email=?, sdt=?, diachi=?, phanquyen=?, trangthai=?, anh=?, password=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $username, $email, $sdt, $diachi, $phanquyen, $trangthai, $anh, $hashedPassword, $id);
    } else {
        $sql = "UPDATE frm_dangky
                SET username=?, email=?, sdt=?, diachi=?, phanquyen=?, trangthai=?, anh=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $username, $email, $sdt, $diachi, $phanquyen, $trangthai, $anh, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Cập nhật thành công!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Lỗi cập nhật: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
}
?>
