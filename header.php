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
<style>
.btn_login {
    opacity: 0;
}
.search-container {
    display: flex;
    justify-content: center;
    position: relative;
    width: 100%;
}
.search-box {
    width: 500px; 
    padding: 12px 45px 12px 15px; 
    border: 2px solid #ddd;
    border-radius: 25px;
    outline: none;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    margin-right: 70px;
}

.search-box:focus {
    border-color: black;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
}
.search-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #666;
    font-size: 18px;
    cursor: pointer;
    right: 90px;
}

.search-btn:hover {
    color: black;
}
</style>
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
                <div class="search-container">
    <form action="shop.php" method="GET">
        <input type="text" name="search" class="search-box" placeholder="Tìm kiếm sản phẩm...">
        <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
    </form>
</div>

            </div>
        </nav>
        <div>
        <div>
            <div class="shopping"><a href="giohang.php" style="color: black;"><i class="bi bi-cart2"></i></a></div>
            <a class="login" href="dangnhap.php">
                <button class="btn_login" style="<?php echo isset($_SESSION['username']) ? 'opacity: 0;' : 'opacity: 1;'; ?>">LOGIN</button>
            </a>
        </div>
 
</header>
