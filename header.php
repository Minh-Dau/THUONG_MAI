<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMEMAY | VIETNAM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
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
            <div class="shopping"><a href="giohang.php" style="color: black;"><i class="bi bi-cart2"></i></a></div>
            <?php if (!isset($_SESSION['username'])): ?>
            <a class="login" href="dangnhap.php">
                <button class="btn_login">LOGIN</button>
            </a>
        <?php endif; ?>
        </div>
        
</header>
