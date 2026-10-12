
<?php
include_once __DIR__ . "/../../database.php";

function demDuLieu($conn, $table)
{
    $tables = ["sinhvien", "lop", "khoa", "monhoc"];

    if (!in_array($table, $tables, true)) {
        return 0;
    }

    $result = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM `$table`");

    if (!$result) {
        return 0;
    }

    $row = mysqli_fetch_assoc($result);
    return (int)$row["tong"];
}

$tongSinhVien = demDuLieu($conn, "sinhvien");
$tongLop = demDuLieu($conn, "lop");
$tongKhoa = demDuLieu($conn, "khoa");
$tongMonHoc = demDuLieu($conn, "monhoc");

$sinhviens = mysqli_query(
    $conn,
    "SELECT MASV, HOTEN FROM sinhvien ORDER BY MASV DESC LIMIT 5"
);
?>

<style>
.home-dashboard {
    padding: 10px 5px 25px;
    color: #1e293b;
}

.home-heading {
    margin-bottom: 25px;
}

.home-heading h2 {
    font-size: 28px;
    font-weight: 700;
}

.home-heading p {
    color: #64748b;
}

.home-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    padding: 22px;
    height: 100%;
    box-shadow: 0 4px 15px rgba(0,0,0,.04);
    transition: .2s;
}

.home-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,.08);
}

.home-label {
    color: #64748b;
    font-size: 14px;
}

.home-number {
    font-size: 34px;
    font-weight: 750;
    margin: 12px 0;
}

.home-icon {
    font-size: 27px;
    padding: 10px;
    border-radius: 12px;
    background: #eff6ff;
}

.home-section {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    padding: 22px;
    margin-top: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,.04);
}

.home-section h4 {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 20px;
}

.home-shortcut {
    display: block;
    padding: 20px;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    text-decoration: none;
    color: #334155;
    height: 100%;
    transition: .2s;
}

.home-shortcut:hover {
    border-color: #2563eb;
    color: #2563eb;
    background: #f8fbff;
    transform: translateY(-3px);
}

.home-shortcut .icon {
    font-size: 28px;
    margin-bottom: 12px;
}

.home-shortcut strong {
    display: block;
    margin-bottom: 7px;
}

.home-shortcut small {
    color: #64748b;
}

.home-link {
    text-decoration: none;
    font-weight: 600;
}
</style>

<div class="container-fluid home-dashboard">

    <div class="home-heading">
        <h2>Xin chào, Quản trị viên! 👋</h2>
        <p>Chào mừng bạn đến với hệ thống quản lý sinh viên.</p>
    </div>

    <div class="row g-3">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="home-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="home-label">Tổng sinh viên</span>
                    <span class="home-icon">🎓</span>
                </div>
                <div class="home-number"><?= number_format($tongSinhVien) ?></div>
                <a href="index.php?controller=sinhvien" class="home-link text-primary">
                    Quản lý sinh viên →
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="home-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="home-label">Tổng lớp học</span>
                    <span class="home-icon" style="background:#dcfce7">🏫</span>
                </div>
                <div class="home-number"><?= number_format($tongLop) ?></div>
                <a href="index.php?controller=lop" class="home-link text-success">
                    Quản lý lớp →
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="home-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="home-label">Tổng khoa</span>
                    <span class="home-icon" style="background:#fef3c7">🏢</span>
                </div>
                <div class="home-number"><?= number_format($tongKhoa) ?></div>
                <a href="index.php?controller=khoa" class="home-link text-warning">
                    Quản lý khoa →
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="home-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="home-label">Tổng môn học</span>
                    <span class="home-icon" style="background:#f3e8ff">📚</span>
                </div>
                <div class="home-number"><?= number_format($tongMonHoc) ?></div>
                <a href="index.php?controller=monhoc" class="home-link" style="color:#7e22ce">
                    Quản lý môn học →
                </a>
            </div>
        </div>

    </div>

    <div class="home-section">
        <h4>Truy cập nhanh</h4>

        <div class="row g-3">

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=sinhvien" class="home-shortcut">
                    <div class="icon">🎓</div>
                    <strong>Sinh viên</strong>
                    <small>Quản lý thông tin sinh viên</small>
                </a>
            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=khoa" class="home-shortcut">
                    <div class="icon">🏢</div>
                    <strong>Khoa</strong>
                    <small>Quản lý khoa đào tạo</small>
                </a>
            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=lop" class="home-shortcut">
                    <div class="icon">🏫</div>
                    <strong>Lớp học</strong>
                    <small>Quản lý danh sách lớp</small>
                </a>
            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=monhoc" class="home-shortcut">
                    <div class="icon">📚</div>
                    <strong>Môn học</strong>
                    <small>Quản lý môn học</small>
                </a>
            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=diem" class="home-shortcut">
                    <div class="icon">📊</div>
                    <strong>Quản lý điểm</strong>
                    <small>Xem và cập nhật điểm</small>
                </a>
            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <a href="index.php?controller=chuyencan" class="home-shortcut">
                    <div class="icon">📝</div>
                    <strong>Chuyên cần</strong>
                    <small>Quản lý điểm danh</small>
                </a>
            </div>

        </div>
    </div>

    <div class="home-section">
        <h4>Danh sách sinh viên gần đây</h4>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($sinhviens && mysqli_num_rows($sinhviens) > 0): ?>
                        <?php while ($sv = mysqli_fetch_assoc($sinhviens)): ?>
                            <tr>
                                <td><?= htmlspecialchars($sv["MASV"]) ?></td>
                                <td><?= htmlspecialchars($sv["HOTEN"] ?? "") ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted">
                                Chưa có dữ liệu sinh viên.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="index.php?controller=sinhvien" class="btn btn-outline-primary">
            Xem tất cả sinh viên
        </a>
    </div>

</div>
