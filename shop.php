<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMEMAY|VIETNAM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
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
    <div class="thumb_shop">
        <img src="IMG/testimg.jpg" alt="">
    </div>
        <div class="headline2"2>
            <h6>TẤT CẢ SẢN PHẨM</h6>
        </div>
        <?php
        // tìm kiếm theo tên sản phẩm
            include("config.php");
            $search = isset($_GET['search']) ? trim($_GET['search']) : "";
            $sql = "SELECT * FROM sanpham WHERE trangthai = 'hienthi'";
            if (!empty($search)) {
            $sql .= " AND (tensanpham LIKE '%$search%' OR loaisanpham LIKE '%$search%')";
            }
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="wrapper">
                <div class="product">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
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
                    } else {
                        echo "<p>Không tìm thấy sản phẩm nào.</p>";
                    }
                    ?>
                </div>
            </div>
    <div class="support">
        <p><i class="bi bi-telephone-fill"></i> Hỗ trợ - Mua hàng: <span style="color: rgb(201, 0, 0);"><b>0122112211</b></span></p>
    </div>
    <footer class="footer">
        <div class="container" style="font-size: 20px;">           
            <div class="row">
            <div class="footer-col">
                    <h4>HỆ THỐNG CỬA HÀNG</h4>
                    <p><i class="bi bi-geo-alt"></i> &nbsp;Chi Nhánh Trường Đại Học Sư Phạm Kỹ Thuật Vĩnh Long</p>
                    <p><i class="bi bi-geo-alt"></i> &nbsp;Đường Nguyễn Huệ, Phường 2, Thành Phố Vĩnh Long</p>
                    <p><i class="bi bi-telephone-fill"></i> &nbsp;Hotline: 0122 112 211</p>
                    <p><i class="bi bi-envelope-fill"></i> &nbsp;hustlerstonie@gmail.com</p>
                </div>
                <div class="footer-col">
                    <h4>Chính sách</h4>
                        <ul>
                            <li><i class="bi bi-dot"></i>&nbsp;Chính sách bảo mật</li>
                            <li><i class="bi bi-dot"></i>&nbsp;FAQ</li>
                            <li><i class="bi bi-dot"></i>&nbsp;Chính sách Thẻ Thành Viên</li>
                            <li><i class="bi bi-dot"></i>&nbsp;Chính sách Bảo hành & Đổi trả</li>
                            <li><i class="bi bi-dot"></i>&nbsp;Chính sách giao hàng hỏa tốc</li>
                        </ul>
                </div>
                <div class="footer-col">
                    <h4>Mạng Xã Hội</h4>
                    <p><i class="bi bi-facebook"></i>&nbsp; Hustler Stonie</p>
                    <P><i class="bi bi-instagram"></i>&nbsp; Hustler Stonie</P>
                </div>
                <div class="footer-col">
                    <h4>Fanpage</h4>
                </div>
            </div>
        </div>
    </footer>
    <div>
        <hr>
        <p style="font-size: 17px;" align="center" class="banquyen">Copyright © 2025 Hustler Stonie</p>
    </div>
</body>
</html>