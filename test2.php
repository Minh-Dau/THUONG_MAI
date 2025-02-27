<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 2</title>
</head>
<body>

    <h1>Trang 2</h1>

    <?php
    // Kiểm tra xem có giá trị kích thước được gửi từ trang chi tiết sản phẩm hay không
    if (isset($_GET['selectedSize'])) {
        $selectedSize = $_GET['selectedSize'];
        echo "<p>Bạn đã chọn kích thước: $selectedSize</p>";
    } else {
        echo "<p>Không có kích thước được chọn.</p>";
    }
    ?>

</body>
</html>