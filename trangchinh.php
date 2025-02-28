<!DOCTYPE html>
<html lang="en">
    <style>
    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 10%;
        margin-right: 10px;
        object-fit: cover;
    }
    </style>
<body>
<?php include 'header.php'; ?>
<div class="welcome">
    <?php
        include("config.php");

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "SELECT anh FROM frm_dangky WHERE username='$username'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);
            $avatar = !empty($user['anh']) ? $user['anh'] : 'default-avatar.png';

            echo '<p>Xin chào, 
                    <a href="thongtin.php" class="welcome_user">
                    <span>' . $username . '</span>
                        <img src="' . $avatar . '" alt="Avatar" class="avatar"> 
                    </a>
                    <i class="bi bi-box-arrow-right"></i>
                    <a href="logout.php">Logout</a>
                </p>';
        }
    ?>
</div>
    <div class="img_main">
        <div class="carousel">
            <img src="IMG/testimg1.jpg" alt="Ảnh 1">
            <img src="IMG/testimg2.jpg" alt="Ảnh 2">
            <img src="IMG/testimg3.jpg" alt="Ảnh 3">
        </div>
    </div>
    <div class="headline">
        <h3>SẢN PHẨM MỚI NHẤT </h3>
    </div>
    <div class="wrapper">
        <div class="product">
        <?php
                include("config.php");
                $sql = "SELECT * FROM sanpham WHERE trangthai = 'hienthi' LIMIT 4";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?> 
                    <div class="product_item">
                        <div class="product_top">
                            <a href="chitietsanpham.php?id=<?= $row['id'] ?>" class="product_thumb">
                                <img src="<?php echo $row['img'] ?>" alt="" width="250" height="250">
                            </a>
                            <a href="chitietsanpham.php?id=<?= $row['id'] ?>" class="buy_now">Mua ngay</a>
                        </div>
                        <div class="product_info">
                            <a href="chitietsanpham.php?id=<?= $row['id'] ?>" class="product_cat"><?php echo $row['tensanpham'] ?></a>
                            <div class="product_price"><?php echo $row['gia'] ?>$</div>
                        </div>
                    </div>
                <?php 
                } 
                ?>
        </div>
    </div>
    <div class="product_all">
        <a href="shop.php">Xem tất cả</a>
    </div> 
    <?php include 'footer.php' ?>
    <div>
        <hr>
        <p style="font-size: 17px;" align="center" class="banquyen">Copyright © 2025 Hustler Stonie</p>
    </div>
    <script>
        const carousel = document.querySelector(".carousel");
        const images = document.querySelectorAll(".carousel img");
        const totalImages = images.length;
        let currentIndex = 0; 
        function getImageWidth() {
            return images[0].clientWidth; // Luôn lấy chiều rộng hiện tại của ảnh
        }
        function setPositionByIndex() {
            carousel.style.transition = "transform 0.5s ease-in-out";
            carousel.style.transform = `translateX(${-currentIndex * getImageWidth()}px)`;
        }
        function autoSlide() {
            currentIndex++;
            if (currentIndex >= totalImages) {
                currentIndex = 0; // Quay lại ảnh đầu tiên
            }
            setPositionByIndex();
        }

        // Cập nhật vị trí khi người dùng thay đổi kích thước trang
        window.addEventListener("resize", setPositionByIndex);

        // Chạy slide tự động mỗi 5 giây
        setInterval(autoSlide, 5000);
    </script>
</body>
</html>
