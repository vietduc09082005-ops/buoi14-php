<?php require_once '../include/header.php'; ?>
<?php require_once '../include/sidebar.php'; ?>

<h2 class="mb-3">Thêm sinh viên mới</h2>

<form action="index.php?controller=sinhvien&action=store" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã sinh viên</label>
        <input type="text" name="ma_sv" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Họ và tên</label>
        <input type="text" name="ho_ten" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Ngày sinh</label>
        <input type="date" name="ngay_sinh" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Giới tính</label>
        <select name="gioi_tinh" class="form-control">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Lớp</label>
        <select name="malop" class="form-control" required>
            <option value="">-- Chọn lớp --</option>
            <?php foreach ($danhsach_lop as $lop): ?>
            <option value="<?= $lop['MALOP'] ?>"><?= $lop['TENLOP'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Địa chỉ</label>
        <textarea name="dia_chi" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?controller=sinhvien" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once '../include/footer.php'; ?>
