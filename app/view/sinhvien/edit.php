<?php require_once '../include/header.php'; ?>
<?php require_once '../include/sidebar.php'; ?>

<h2 class="mb-3">Chỉnh sửa sinh viên</h2>

<form action="index.php?controller=sinhvien&action=update&id=<?= $sv['MASV'] ?>" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã sinh viên</label>
        <input type="text" name="ma_sv" class="form-control" value="<?= $sv['MASV'] ?>" required readonly>
    </div>
    <div class="mb-2">
        <label>Họ và tên</label>
        <input type="text" name="ho_ten" class="form-control" value="<?= $sv['HOTEN'] ?>" required>
    </div>
    <div class="mb-2">
        <label>Ngày sinh</label>
        <input type="date" name="ngay_sinh" class="form-control" value="<?= $sv['NGAYSINH'] ?>" required>
    </div>
    <div class="mb-2">
        <label>Giới tính</label>
        <select name="gioi_tinh" class="form-control">
            <option value="Nam" <?= $sv['GIOITINH'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= $sv['GIOITINH'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Lớp</label>
        <select name="malop" class="form-control" required>
            <?php foreach ($danhsach_lop as $lop): ?>
            <option value="<?= $lop['MALOP'] ?>" <?= $sv['MALOP'] == $lop['MALOP'] ? 'selected' : '' ?>>
                <?= $lop['TENLOP'] ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Địa chỉ</label>
        <textarea name="dia_chi" class="form-control" rows="3"><?= $sv['DIACHI'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?controller=sinhvien" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once '../include/footer.php'; ?>
