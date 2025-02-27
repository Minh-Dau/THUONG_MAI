<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css_dangky.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<?php
session_start();
include("config.php");

$error_message1 = "";
$error_message2 = "";
$error_message3 = "";

if (isset($_POST['dangky']) && $_POST['email'] != '' && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['resetpassword'] != '') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $taikhoan = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $resetpassword = mysqli_real_escape_string($conn, $_POST['resetpassword']);
    
    // Giá trị mặc định
    $sdt = "12345678";
    $phanquyen = "user";
    $diachi = "Vĩnh Long";
    $anh = "";  // Ảnh để trống

    if ($password != $resetpassword) {
        $error_message1 = "Vui lòng nhập lại mật khẩu";
    } else {
        // Kiểm tra email và username có tồn tại chưa
        $check_query = "SELECT * FROM frm_dangky WHERE username='$taikhoan'";
        $check_result = mysqli_query($conn, $check_query);
        $check_email_query = "SELECT * FROM frm_dangky WHERE email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);

        if (mysqli_num_rows($check_email_result) > 0) {
            $error_message3 = "Email đã được đăng ký";
        } elseif (mysqli_num_rows($check_result) > 0) {
            $error_message2 = "Tài khoản đã tồn tại";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Chèn dữ liệu vào database
            $insert_query = "INSERT INTO frm_dangky (email, username, password, sdt, phanquyen, diachi, anh) 
                             VALUES ('$email', '$taikhoan', '$hashed_password', '$sdt', '$phanquyen', '$diachi', '$anh')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                header('location: dangnhap.php');
                exit();
            } else {
                $error_message = "Lỗi khi thêm vào cơ sở dữ liệu";
            }
        }
    }
}
?>
    <header class="main">
        <a href="trangchinh.php"><img class="imgLogo" src="IMG/logo2.png" alt="logo" id="reset"></a>
        <nav>
            <div class="danhsach">
                <ul>
                    <li class="thea"><a href="trangchinh.php"><b>TRANG CHỦ</b></a></li>
                    <li class="thea"><a href="shop.php"><b>SHOP</b></a></li>                   
                    <li class="thea"><a href="contact.php"><b>CONTACT</b></a></li>
                    <li class="thea"><a href="about.php"><b>ABOUT</b></a></li>
                <ul>
            </div>
        </nav>
        <div>
            <div class="shopping" href="giohang.php"><a href="giohang.php" style="color: black;"><i class="bi bi-cart2"></i></a></div>
            <a class="login" href="dangnhap.php"><button class="btn_login">LOGIN</button></a>
        </div>
    </header>
    <div class="welcome">
        <?php
            if (isset($_SESSION['username'])) {
                echo '<p>Xin chào, <span class="welcome_user">' . $_SESSION['username'] . '</span>! <a href="logout.php">Logout</a></p>';
            }
        ?>
    </div>
    <form id="trangdk" action="dangky.php" method = "POST">
        <div>
            <h1 class="h1_dk">ĐĂNG KÝ TÀI KHOẢN</h1>
            <p class="p_tt">Bạn đã có tài khoản?<a href="dangnhap.php"> Đăng nhập tại đây</a></p>
            &nbsp;
            <p class="p_tde">THÔNG TIN CÁ NHÂN</p>
            <div class="cha_dk">
                <h4 class="h4_dk">Nhập email <span>*</span></h4>
                <input type="text"  name="email" class="nhaptt" required placeholder="Nhập email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                <span id="thongbao" style="color: red;"><?php echo $error_message3; ?></span>
                <h4 class="h4_dk">Nhập tên tài khoản <span>*</span></h4>
                <input type="text"  name="username" class="nhaptt" required placeholder="Nhập tên tài khoản" >
                <span id="thongbao" style="color: red;"><?php echo $error_message2; ?></span>
                <h4 class="h4_dk">Nhập mật khẩu <span>*</span></h4>
                <input type="password" name="password" class="nhaptt" placeholder="Nhập mật khẩu">
                <h4 class="h4_dk">Nhập lại mật khẩu <span>*</span></h4>
                <input type="password" name="resetpassword" class="nhaptt" placeholder="Nhập lại mật khẩu">
                <span id="thongbao" style="color: red;"><?php echo $error_message1; ?></span>
            <br>
            <br>
                <button class="nhandk" name="dangky">Đăng ký</button>             
            </div>
        </div>
    </form>

    <br>
    <div>
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
<script>
    var pass=document.getElementById("pass");
    var check=document.getElementById("check");
    check.onchange=function(e){
        pass.type=check.checked ? "text" : "password"
    };
</script>
</html>