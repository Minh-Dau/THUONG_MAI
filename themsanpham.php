<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensanpham = $_POST["tensanpham"];
    $gia_nhap = $_POST["gia_nhap"];
    $gia = $_POST["gia"];
    $noidungsanpham = $_POST["noidungsanpham"];

    // Xử lý upload ảnh
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    // Thêm sản phẩm vào database
    $sql = "INSERT INTO sanpham (tensanpham, img, gia_nhap, gia, noidungsanpham) 
            VALUES ('$tensanpham', '$target_file', '$gia_nhap', '$gia', '$noidungsanpham')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Thêm sản phẩm thành công!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Lỗi: " . $conn->error]);
    }
    $conn->close();
}
?>
