<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css_dangnhap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?php
        // phân quyền rồi
        session_start();
        include("config.php");
        $error_message1 = "";
        $error_message2 = "";
        if (isset($_POST['dangnhap']) && $_POST['username'] != '' && $_POST['password'] != '') {
            $taikhoan = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM frm_dangky WHERE username='$taikhoan' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashed_password = $row['password'];
                $phanquyen = $row['phanquyen'];
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['username'] = $taikhoan;
                    $_SESSION['phanquyen'] = $phanquyen; 
                    if ($phanquyen == 'admin') {
                        header("Location: quanlysanpham.php"); 
                    } else {
                        header("Location: trangchinh.php"); 
                    }
                    exit();
                } else {
                    $error_message1 = "Sai mật khẩu!";
                }
            } else {
                $error_message2 = "Tài khoản không tồn tại!";
            }
        }
    ?>
    <?php include 'header.php'; ?>
    <div class="welcome">
        <?php
            if (isset($_SESSION['username'])) {
                echo '<p onclick="redirectToUserInfo()">Xin chào, <span class="welcome_user">' . $_SESSION['username'] . '</span>!  <i class="bi bi-box-arrow-right"></i><a href="logout.php">Logout</a></p>';
            }
        ?>
    </div>
    <form id="trangdangnhap" action="dangnhap.php" method = "POST">
        <div class="taikhoan">
            <h2>ĐĂNG NHẬP TÀI KHOẢN TẠI ĐÂY</h2>
            <p class="thep">Bạn chưa có tài khoản?<a href="dangky.php"> Đăng ký tại đây</a><p>
            <div class="cha">
                <input type="text" name="username" class="input-group_gmail" required id="email" >
                <label for="email" class="input-group_label_gmail"> Tài Khoản  <span>*</span> </label>
            </div>
          <div class="cha">
              <input type="password" name="password" class="input-group_matkhau" required id="pass">
                <label for="matkhau" class="input-group_label_matkhau">Mật khẩu <span>*</span></label>
                <br>
                <span id="thongbao" style="color: red;"><?php echo $error_message1; ?></span>
                <span id="thongbao" style="color: red;"><?php echo $error_message2; ?></span>
            <table class="hienthimatkhau">
                <tr>
                    <td>
                        <input type="checkbox" id="check"> 
                    </td>
                    <td><p>Hiển thị mật khẩu</p></td>
                </tr>   
            </table>
            <p>Quên mật khẩu?<a href="quenmatkhau.php" class="a_quenmk"> Nhấn vào đây</a></p>
           <div class="cha">
            <button class="click" name="dangnhap">Đăng Nhập</button>
           </div>
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
