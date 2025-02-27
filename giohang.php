<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMEMAY|VIETNAM</title>
    <link rel="stylesheet" href="css_giohang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script>
        function giamSo(productId) {
            var soInput = document.getElementById('so_' + productId);
            var currentQuantity = parseInt(soInput.value);
            if (currentQuantity > 1) {
                soInput.value = currentQuantity - 1;
            }
        }
        function tangSo(productId) {
            var soInput = document.getElementById('so_' + productId);
            var currentQuantity = parseInt(soInput.value);
              soInput.value = currentQuantity + 1;
        }
        function validateInput(inputElement) {
            inputElement.value = inputElement.value.replace(/\D/g, '');
        }
    </script>
</head>
<body>
    <header class="main">
        <a href="trangchinh.php"><img class="imgLogo" src="IMG/logo2.png" alt="logo" id="reset"></a>
        <nav>
            <div class="danhsach">
                <ul>
                    <li class="thea"><a href="trangchinh.php"><b>TRANG CHỦ</b></a></li>
                    <li class="thea"><a href="shop.php"><b>SHOP</b></a></li>                   
                    <li class="thea"><a href="contact.php"><b>CONTACT</b></a></li>
                    <li class="thea"><a href="about.php"><b>ABOUT</b></a></li>
                </ul>
            </div>
        </nav>
        <div>
            <div class="shopping" href="giohang.php"><a href="giohang.php" style="color: black;"><i class="bi bi-cart2"></i></a></div>
            <a class="login" href="dangnhap.php"><button class="btn_login">LOGIN</button></a>
        </div>
    </header>
    <div class="welcome">
        <?php
            session_start();
            include "config.php";
            if (isset($_SESSION['username'])) {
                echo '<p>Xin chào, <span class="welcome_user">' . $_SESSION['username']. '</span>!  <i class="bi bi-box-arrow-right"></i><a href="logout.php">Logout</a></p>';
            }
        ?>
    </div>
    <?php 
        if(!isset($_SESSION['cart'])){
            $_SESSION["cart"] = array();
        }
        $error1 = "";
        $error2 = "";
        $error3 = "";
        $error = false;
        $success = false;
        if(isset($_GET['action'])){
            function update_cart($add = false){
                if(isset($_POST['soluong']) && is_array($_POST['soluong'])){
                    foreach($_POST['soluong'] as $id => $soluong){
                        if($soluong == 0){
                            unset($_SESSION["cart"][$id]);
                        }else{
                            if($add){
                                $_SESSION['cart'][$id] += $soluong;
                            }else{
                                $_SESSION['cart'][$id] = $soluong;
                            }
                        }
                    }
                }
            }
            switch($_GET['action']){
                case "add":
                    update_cart(true);
                    header('Location: ./giohang.php');
                    break;
                case "remove":
                    if(isset($_GET['id'])){
                        unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('Location: ./giohang.php');
                    break;
                case "submit":
                    if(isset($_POST['update_click'])){ //Sự kiện cập nhật giỏ hàng
                        update_cart();
                    }else if(isset($_POST['oder_click'])){ //Sự kiện click nhập liệu
                        if(empty($_POST["hoten"])){
                            $error1 = "Vui lòng nhập họ tên";
                            $error = true;
                        }elseif(empty($_POST["diachi"])){
                            $error2 = "Vui lòng nhập địa chỉ";
                            $error = true;
                        }elseif(empty($_POST["sdt"])){
                            $error3 = "Vui lòng nhập số điện thoại";
                            $error = true;
                        }
                        //Kiểm tra giỏ hàng nếu không rỗng sẽ thanh toán
                        if($error == false && !empty($_POST['soluong']) && !empty($_SESSION['cart'])){
                            $products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id` IN (".implode(",", array_keys($_POST['soluong'])).")");
                            $total = 0;
                            $oderProducts = array(); 
                            while($row = mysqli_fetch_array($products)){
                                $oderProducts[] = $row;
                                $total += $row['gia'] * $_POST['soluong'][$row['id']];
                            }
                            $insertOder = mysqli_query($conn, "INSERT INTO `oder`(`tenkhachhang`, `diachi`, `sdt`, `note`, `total`) VALUES ('".$_POST['hoten']."','".$_POST['diachi']."','".$_POST['sdt']."','".$_POST['note']."','.$total.');");
                            $oderID = $conn->insert_id;
                            $insertString = "";
                            foreach($oderProducts as $key => $products){
                                $insertString .= "('".$oderID."', '".$products['id']."','','".$_POST['soluong'][$products['id']]."', '".$products['gia']."')";
                                if ($key != count($oderProducts) - 1) {
                                    $insertString .= ",";
                                }
                            }
                            $insertOder_detail = mysqli_query($conn, "INSERT INTO `oder_detail` (`oder_id`, `sanpham_id`,`size`, `soluong`, `gia`) VALUES ".$insertString.";");
                            unset($_SESSION['cart']);
                            $success = "Đặt hàng thành công";
                        }
                    }
                break;
            }
        }
        if(!empty($_SESSION["cart"])){
            $products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
        }
        ?>
    <!-- Table -->
    <form action="giohang.php?action=submit" method="POST">
        <!-- Click thanh toán và giỏ hàng không rỗng -->
        <?php if (isset($_POST['oder_click']) && !empty($_POST['soluong']) && $error == false){ ?>
            <div class="cart_success">
                <div class="img_success">
                    <img src="IMG/thankyou.jpg" alt="">
                </div>
                <div class="btn_tieptuc">
                    <a href="trangchinh.php">Tiếp tục mua hàng</a>
                </div>
            </div>
        <!-- Click cập nhật và giỏ hàng bị rỗng thì thông báo-->  

        <?php } elseif (isset($_POST['update_click']) && empty($_POST['soluong'])) { ?>
            <div class="cart_error">
                <div class="image_error">
                    <img src="IMG/cart_empty.jpg" alt="">
                </div>
                <div class="btn_dentrangsp" style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="shop.php">Đến trang sản phẩm</a>
                </div>
            </div>
         <!-- Click thanh toán và giỏ hàng bị rỗng thì thông báo-->   
        <?php } elseif (isset($_POST['oder_click']) && empty($_POST['soluong'])) { ?>
            <div class="cart_error">
                <div class="image_error">
                    <img src="IMG/cart_empty.jpg" alt="">
                </div>
                <div class="btn_dentrangsp" style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="shop.php">Đến trang sản phẩm</a>
                </div>
            </div>
        <?php } else { ?>
        <div class="table_full">
            <main class="table">
                <section class="table__header">
                    <h1><i class="bi bi-cart-fill"></i> GIỎ HÀNG CỦA BẠN</h1>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> STT <span class="icon-arrow"></span></th>
                                <th> Sản phẩm <span class="icon-arrow"></span></th>
                                <th> Kích thước <span class="icon-arrow"></span></th>
                                <th> Số lượng <span class="icon-arrow"></span></th>
                                <th> Giá <span class="icon-arrow"></span></th>
                                <th> Thành tiền <span class="icon-arrow"></span></th>
                                <th><span class="icon-arrow"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if(!empty($products)){
                                $dem = 1;
                                $total = 0;
                                while ($row = mysqli_fetch_array($products)){
                                ?>
                                <tr>
                                    <td><?=$dem;?></td>
                                    <td> <img src="<?=$row['img']?>" alt=""><p><?=$row['tensanpham']?></p></td>
                                    <td>
                                        XL
                                    </td>
                                    <td>
                                    <div class="soluong">
                                        <input type="button" value="-" class="giam" onclick="giamSo(<?=$row['id']?>)">
                                        <input type="text" id="so_<?=$row['id']?>"value="<?=$_SESSION["cart"][$row['id']]?>" name="soluong[<?=$row['id']?>]" style="height: 19px; width: 54px;" oninput="validateInput(this)">
                                        <input type="button" value="+" class="tang" onclick="tangSo(<?=$row['id']?>)">
                                    </div>
                                    </td>
                                    <td>
                                        <p><?=$row['gia']?>$</p>
                                    </td>
                                    <td> <strong><?=$row['gia'] * $_SESSION["cart"][$row['id']]?>$</strong></td>
                                    <td><a href="giohang.php?action=remove&id=<?=$row['id']?>" class="remove"><i class="bi bi-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td colspan="7"><hr></td>
                                </tr>
                                <?php
                                $total += $row['gia'] * $_SESSION["cart"][$row['id']];
                                $dem++;
                                }
                            ?>
                            <tr class="tr_tongtien">
                                <td colspan="7">
                                    <b><i class="bi bi-cash-coin"></i> Tổng tiền: </b>
                                    <strong><?=$total?>$</strong>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="btn_capnhat">
                        <input type="submit" value="Cập nhật" name="update_click" class="submit_css">
                    </div>
                </section>
            </main>
        </div>
        <div class="contact-form-container">
            <div class="contact-form">
                <h1>THÔNG TIN NHẬN HÀNG</h1>
                <div class="txtb">
                    <label>Họ và tên : <span style="color: red;">(*)</span></label>
                    <input type="text" name="hoten" value="<?= isset($_POST['hoten']) ? $_POST['hoten'] : '' ?>"placeholder="Nhập họ và tên">
                </div>
                <p style="color: red;"> <?php echo $error1; ?></p>
                <div class="txtb">
                    <label>Địa chỉ : <span style="color: red;">(*)</span></label>
                    <input type="text" name="diachi" value="<?= isset($_POST['diachi']) ? $_POST['diachi'] : '' ?>" placeholder="Nhập địa chỉ">
                </div>
                <p style="color: red;"><b><?php echo $error2; ?></b></p>
                <div class="txtb">
                    <label>Số điện thoại :<span style="color: red;">(*)</span></label>
                    <input type="number" name="sdt" value="<?= isset($_POST['sdt']) ? $_POST['sdt'] : '' ?>" placeholder="Nhập số điện thoại">
                </div>
                <p style="color: red;"> <?php echo $error3; ?></p>
                <div class="txtb">
                    <label>Ghi chú :</label>
                    <textarea name="note"></textarea>
                </div>
                    <input type="submit" value="Thanh Toán" name="oder_click" class="submit_css">
            </div>
        </div>
    </form>
    <?php } ?>
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