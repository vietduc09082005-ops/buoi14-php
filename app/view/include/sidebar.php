<div class="sidebar d-flex flex-column">
    <a href="index.php" class="text-white fs-4 px-3 mb-3 text-decoration-none">Quản Lý SV</a>
    <hr class="text-secondary">

    <a href="index.php?controller=sinhvien" class="<?= ($_GET['controller'] ?? '') === 'sinhvien' ? 'active' : '' ?>">
        <i class="bi bi-people"></i> Sinh viên
    </a>
    <a href="index.php?controller=monhoc">
        <i class="bi bi-book"></i> Môn học
    </a>
    <a href="index.php?controller=diem">
        <i class="bi bi-bar-chart-fill"></i> Điểm
    </a>
    <a href="index.php?controller=chuyencan">
        <i class="bi bi-calendar-check"></i> Chuyên cần
    </a>
    <hr class="text-secondary">
    <a href="index.php?controller=user">
        <i class="bi bi-person-circle"></i> Tài khoản
    </a>
    <a href="index.php?controller=user&action=logout">
        <i class="bi bi-box-arrow-right"></i> Đăng xuất
    </a>
</div>

<div class="content">