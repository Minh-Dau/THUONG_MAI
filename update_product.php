<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tensanpham = $_POST["tensanpham"];
    $gia = $_POST["gia"];
    $gia_nhap = $_POST["gia_nhap"];
    $soluong = $_POST["soluong"];
    $noidungsanpham = $_POST["noidungsanpham"];
    $trangthai = $_POST["trangthai"];
    $loaisanpham = $_POST["loaisanpham"];
    if (!empty($_FILES["new_img"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["new_img"]["name"]);
        move_uploaded_file($_FILES["new_img"]["tmp_name"], $target_file);
        $sql = "UPDATE sanpham 
        SET tensanpham='$tensanpham', gia='$gia', gia_nhap='$gia_nhap', soluong='$soluong', noidungsanpham='$noidungsanpham', trangthai='$trangthai', loaisanpham='$loaisanpham' 
        WHERE id=$id";
    } else {
        $sql = "UPDATE sanpham 
        SET tensanpham='$tensanpham', gia='$gia', gia_nhap='$gia_nhap', soluong='$soluong', noidungsanpham='$noidungsanpham', trangthai='$trangthai', loaisanpham='$loaisanpham' 
        WHERE id=$id";
    }
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='quanlysanpham.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
    $conn->close();
}

?>
