<?php
include 'config.php'; // Kết nối với database
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                QUẢN LÝ
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="quanlysanpham.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                QUẢN LÝ SẢN PHẨM
                            </a>
                            <a class="nav-link" href="quanlynguoidung.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users"></i> <!-- Đổi icon ở đây -->
                                </div>
                                QUẢN LÝ NGƯỜI DÙNG
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">QUẢN LÝ NGƯỜI DÙNG</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">QUẢN LÝ</a></li>
                            <li class="breadcrumb-item active">QUẢN LÝ NGƯỜI DÙNG</li>
                        </ol>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DANH SÁCH NGƯỜI DÙNG
                            </div>
                            <div class="card-body">
                            <!-- Nút bấm mở Modal -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                Thêm người dùng mới
                                </button>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include 'config.php';

                                    $sql = "SELECT * FROM frm_dangky";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td><img src='" . $row["anh"] . "' width='50' height='50'></td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["phanquyen"] . "</td>";
                                            echo "<td>" . $row["sdt"] . "</td>";
                                            echo "<td>" . $row["diachi"] . "</td>";
                                            echo "<td>
                                                    <button class='btn btn-warning btn-sm edit-btn'
                                                        data-id='" . $row["id"] . "'
                                                        data-username='" . htmlspecialchars($row["username"]) . "'
                                                        data-email='" . htmlspecialchars($row["email"]) . "'
                                                        data-sdt='" . htmlspecialchars($row["sdt"]) . "'
                                                        data-diachi='" . htmlspecialchars($row["diachi"]) . "'
                                                        data-phanquyen='" . htmlspecialchars($row["phanquyen"]) . "'
                                                        data-anh='" . htmlspecialchars($row["anh"]) . "'
                                                        data-bs-toggle='modal'
                                                        data-bs-target='#editUserModal'>
                                                        Sửa
                                                    </button>
                                                    <button class='btn btn-danger btn-sm delete-btn' data-id='" . $row["id"] . "'>
                                                        Xóa
                                                    </button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>Không có người dùng nào</td></tr>";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </main>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <!-- Modal Thêm người dùng -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="them_nguoidung.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Thêm người dùng mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="username" 
                        name="username" 
                        required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="phanquyen" class="form-label">Phân quyền</label>
                        <select 
                        class="form-select" 
                        id="phanquyen" 
                        name="phanquyen"
                        >
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="sdt" 
                        name="sdt"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="diachi" 
                        name="diachi"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="anh" class="form-label">Ảnh đại diện</label>
                        <input 
                        type="file" 
                        class="form-control" 
                        id="anh" 
                        name="anh"
                        >
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        <!-- Modal Chỉnh Sửa Người Dùng -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" action="update_nguoidung.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <input type="hidden" name="id" id="edit-id">
                <div class="mb-3">
                    <label for="edit-username" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" name="username" id="edit-username">
                </div>
                <div class="mb-3">
                    <label for="edit-email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="edit-email">
                </div>
                <div class="mb-3">
                    <label for="edit-password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="edit-password" placeholder="Nhập mật khẩu mới (nếu muốn thay đổi)">
                </div>
                <div class="mb-3">
                    <label for="edit-sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="edit-sdt">
                </div>
                <div class="mb-3">
                    <label for="edit-diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" id="edit-diachi">
                </div>
                <div class="mb-3">
                    <label for="edit-phanquyen" class="form-label">Quyền</label>
                    <select class="form-control" name="phanquyen" id="edit-phanquyen">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit-anh" class="form-label">Ảnh</label>
                    <br>
                    <img id="current-user-img" src="" width="50" height="50" style="margin-bottom: 10px;">
                    <input type="hidden" name="current_anh" id="current-anh">
                    <input type="file" class="form-control" name="anh" id="edit-anh">
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </body>
</html>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const editButtons = document.querySelectorAll(".edit-btn");
  editButtons.forEach(button => {
    button.addEventListener("click", function () {
      document.getElementById("edit-id").value = this.dataset.id;
      document.getElementById("edit-username").value = this.dataset.username;
      document.getElementById("edit-email").value = this.dataset.email;
      document.getElementById("edit-sdt").value = this.dataset.sdt;
      document.getElementById("edit-diachi").value = this.dataset.diachi;
      document.getElementById("edit-phanquyen").value = this.dataset.phanquyen;
      document.getElementById("current-user-img").src = this.dataset.anh;
      document.getElementById("current-anh").value = this.dataset.anh;
    });
  });
});

</script>
<!-- Bao gồm SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById("editUserForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Ngăn form submit mặc định
    let formData = new FormData(this);
    
    Swal.fire({
        title: "Đang xử lý...",
        text: "Vui lòng chờ...",
        icon: "info",
        allowOutsideClick: false,
        showConfirmButton: false,
        timerProgressBar: true
    });
    
    fetch("update_nguoidung.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === "success"){
            Swal.fire({
                title: "Thành công!",
                text: data.message,
                icon: "success"
            }).then(() => {
                var modalEl = document.getElementById('editUserModal');
                var modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
                location.reload();
            });
        } else {
            Swal.fire({
                title: "Lỗi!",
                text: data.message,
                icon: "error"
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: "Lỗi!",
            text: "Có lỗi xảy ra. Vui lòng thử lại!",
            icon: "error"
        });
        console.error("Lỗi:", error);
    });
});
</script>
<!-- Thông báo xóa người dùng -->
<script>
document.querySelectorAll(".delete-btn").forEach(function(button) {
    button.addEventListener("click", function() {
        var userId = this.dataset.id;
        Swal.fire({
            title: "Bạn có chắc chắn?",
            text: "Dữ liệu sẽ bị xóa vĩnh viễn!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy"
        }).then((result) => {
            if (result.isConfirmed) {
                // Gửi yêu cầu xóa qua fetch (hoặc AJAX)
                fetch("delete_nguoidung.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + encodeURIComponent(userId)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        Swal.fire("Đã xóa!", data.message, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Lỗi!", data.message, "error");
                    }
                })
                .catch(error => {
                    Swal.fire("Lỗi!", "Có lỗi xảy ra. Vui lòng thử lại!", "error");
                    console.error("Error:", error);
                });
            }
        });
    });
});
</script>
