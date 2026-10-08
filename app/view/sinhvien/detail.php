<?php require_once '../include/header.php'; ?>
<?php require_once '../include/sidebar.php'; ?>

<h2 class="mb-3">Thông tin chi tiết sinh viên</h2>

<table class="table" style="max-width: 500px;">
    <tr><th>Mã SV:</th><td><?= $sv['MASV'] ?></td></tr>
    <tr><th>Họ tên:</th><td><?= $sv['HOTEN'] ?></td></tr>
    <tr><th>Ngày sinh:</th><td><?= date('d/m/Y', strtotime($sv['NGAYSINH'])) ?></td></tr>
    <tr><th>Giới tính:</th><td><?= $sv['GIOITINH'] ?></td></tr>
    <tr><th>Lớp:</th><td><?= $sv['TENLOP'] ?></td></tr>
    <tr><th>Địa chỉ:</th><td><?= $sv['DIACHI'] ?: 'Chưa cập nhật' ?></td></tr>
</table>

<a href="index.php?controller=sinhvien&action=edit&id=<?= $sv['MASV'] ?>" class="btn btn-warning">Sửa</a>
<a href="index.php?controller=sinhvien" class="btn btn-secondary">Danh sách</a>

<?php require_once '../include/footer.php'; ?>
