<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Chỉnh sửa khoa</h2>

<form action="index.php?controller=khoa&action=update&id=<?php echo $khoa['MAKHOA']; ?>" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã khoa</label>
        <input type="text" name="ma_khoa" class="form-control" value="<?php echo $khoa['MAKHOA']; ?>" required readonly>
    </div>

    <div class="mb-2">
        <label>Tên khoa</label>
        <input type="text" name="ten_khoa" class="form-control" value="<?php echo $khoa['TENKHOA']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Điện thoại</label>
        <input type="text" name="dien_thoai" class="form-control" value="<?php echo $khoa['DIENTHOAI']; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?controller=khoa" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>