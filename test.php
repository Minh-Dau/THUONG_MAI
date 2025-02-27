<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <script>
        function redirectToCart() {
            // Lấy giá trị kích thước đã chọn
            var selectedSize = document.querySelector('input[name="group"]:checked');

            // Kiểm tra xem đã chọn kích thước chưa
            if (selectedSize) {
                // Thêm giá trị kích thước vào form
                document.getElementById('selectedSizeInput').value = selectedSize.value;

                // Gửi form
                document.getElementById('orderForm').submit();
            } else {
                // Thông báo cho người dùng rằng họ cần chọn kích thước trước khi đặt hàng
                alert('Vui lòng chọn kích thước trước khi đặt hàng.');
            }
        }
    </script>
</head>
<body>

    <h1>Chi Tiết Sản Phẩm</h1>

    <form id="orderForm" action="test2.php" method="GET">
        <label for="sizeS">Size S</label>
        <input type="radio" id="sizeS" name="group" value="S">

        <label for="sizeM">Size M</label>
        <input type="radio" id="sizeM" name="group" value="M">

        <label for="sizeL">Size L</label>
        <input type="radio" id="sizeL" name="group" value="L">

        <label for="sizeXL">Size XL</label>
        <input type="radio" id="sizeXL" name="group" value="XL">

        <!-- Thêm input ẩn để lưu giá trị kích thước -->
        <input type="hidden" name="selectedSize" id="selectedSizeInput" value="">

        <!-- Thêm sự kiện onclick cho nút "Đặt hàng" -->
        <input type="button" value="Đặt hàng" onclick="redirectToCart()">
    </form>

</body>
</html>