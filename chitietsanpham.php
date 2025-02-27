<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMEMAY|VIETNAM</title>
    <link rel="stylesheet" href="css_chitiet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script>
        function validateQuantity() {
            var inputElement = document.getElementById('so');
            var inputValue = inputElement.value.trim();
            var numericRegex = /^[0-9]+$/;
            if (!numericRegex.test(inputValue)) {
                inputElement.value = 1;
            }
        }
        // function nhan() {
        //     var selectedSize = document.querySelector('input[name="group"]:checked');
        //     if (selectedSize) {
        //         var kichThuocElement = document.getElementById('kichthuoc');
        //         kichThuocElement.innerHTML = '<b style="font-size: 20px">Kích thước: </b>' + selectedSize.value;
        //         document.getElementById('selectedSize_').value = selectedSize.value;
        //         // Store selected size in session
        //         sessionStorage.setItem('selectedSize_', selectedSize.value);
        //         console.log('Selected Size: ', selectedSize.value);

        //     }
        // }
        function giamSo() {
            var soInput = document.getElementById('so');
            var currentQuantity = parseInt(soInput.value);

            if (currentQuantity > 1) {
                soInput.value = currentQuantity - 1;
            }
        }
        function tangSo() {
            var soInput = document.getElementById('so');
            var currentQuantity = parseInt(soInput.value);

            soInput.value = currentQuantity + 1;
        }
        // function validateForm() {
        //     var selectedSize = document.querySelector('input[name="group"]:checked');
        //     if (!selectedSize) {
        //         alert('Vui lòng chọn kích thước.');
        //         return false;
        //     }
        //     return true;
        // }
    </script>
</head>
<body>
    <!-- Phần trên -->
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
            <div class="shopping" id="cartIcon" href="#"><a href="giohang.php" style="color: black;"><i class="bi bi-cart2"></i></a></div>
            <a class="login" href="dangnhap.php"><button class="btn_login">LOGIN</button></a>
        </div>
    </header>
    <div class="welcome">
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<p>Xin chào, <span class="welcome_user">' . $_SESSION['username']. '</span>!  <i class="bi bi-box-arrow-right"></i><a href="logout.php">Logout</a></p>';
            }
        ?>
    </div>
    <!-- Phần giữa -->
    <?php
        include("config.php");
        $result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);
    ?>
        <table class="sanpham">
                <tr>
                    <td> <img src="<?=$product['img']?>" alt="" class="anh" onclick="zoom(this)"></td>
                    <td>
                        <di class="thongtin">
                        <div class="titel_chitiet"><?=$product['tensanpham']?></div>
                        <p style="font-size: 20px">Thương hiệu: <span style="color: blue;">DUMEMAYTeam ft. VLone</span></p>
                        <br>
                        <p id="gia"><?=$product['gia']?>$</p>
                        &nbsp;
                        <!-- <p id="kichthuoc"><b style="font-size: 20px">Kích thước:</b></p> -->
                        <br>
                        <form action="giohang.php?action=add" method="POST" onsubmit="return validateForm()">
                            <!-- <input type="text" name="selectedSize_" id="selectedSize_" value="">
                            <div class="kichthuoc-options">
                                <input type="radio" value="S" class="kichthuoc" name="group" id="sizeS" onclick="nhan()">
                                <label for="sizeS">S</label>
                                <input type="radio" value="M" class="kichthuoc" name="group" id="sizeM" onclick="nhan()">
                                <label for="sizeM">M</label>
                                <input type="radio" value="L" class="kichthuoc" name="group" id="sizeL" onclick="nhan()">
                                <label for="sizeL">L</label>
                                <input type="radio" value="XL" class="kichthuoc" name="group" id="sizeXL" onclick="nhan()">
                                <label for="sizeXL">XL</label>
                            </div> -->
                            <br>
                            <p id="mausac"><b style="font-size: 20px">Số lượng:</b></p>
                                <div id="soluong">
                                    <input type="button" value="-" id="giam" onclick="giamSo()">
                                    <input type="text" id="so" value="1" oninput="validateQuantity()" name="soluong[<?=$product['id']?>]">
                                    <input type="button" value="+" id="tang" onclick="tangSo()">
                                </div>
                            <input type="submit" value="Mua hàng" class="btn_muahang">
                        </form>
                        <div class="sdt">
                            <span> Gọi đặt mua 0122112211 8:00-22:00</span>
                        </div>
                        <hr width=460px>
                    </div>      
                    </td>
                </tr>
        </table>
        <div class=" mota">
                <p>Mô tả sản phẩm </p>
        </div>
        <hr>
        <div class="motasanpham">
            <p><?=$product['noidungsanpham']?></p>
        </div>
        </div> 
    <!-- Phần dưới -->
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