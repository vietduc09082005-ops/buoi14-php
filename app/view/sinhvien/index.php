<?php require_once '../include/header.php'; ?>
<?php require_once '../include/sidebar.php'; ?>

<h2 class="mb-3">Danh sách sinh viên</h2>
<a href="index.php?controller=sinhvien&action=add" class="btn btn-primary mb-3">Thêm sinh viên</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Lớp</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($danhsach)): ?>
            <?php foreach ($danhsach as $sv): ?>
            <tr>
                <td><?= $sv['MASV'] ?></td>
                <td><?= $sv['HOTEN'] ?></td>
                <td><?= date('d/m/Y', strtotime($sv['NGAYSINH'])) ?></td>
                <td><?= $sv['GIOITINH'] ?></td>
                <td><?= $sv['TENLOP'] ?></td>
                <td>
                    <a href="index.php?controller=sinhvien&action=detail&id=<?= $sv['MASV'] ?>" class="btn btn-sm btn-info">Xem</a>
                    <a href="index.php?controller=sinhvien&action=edit&id=<?= $sv['MASV'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="index.php?controller=sinhvien&action=delete&id=<?= $sv['MASV'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center">Chưa có sinh viên</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once '../include/footer.php'; ?>
