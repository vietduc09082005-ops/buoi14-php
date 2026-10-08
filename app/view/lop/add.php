<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Thêm lớp mới</h2>

<form action="index.php?controller=lop&action=store" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã lớp</label>
        <input type="text" name="ma_lop" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Tên lớp</label>
        <input type="text" name="ten_lop" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Khoa</label>
        <select name="ma_khoa" class="form-control" required>
            <option value="">-- Chọn khoa --</option>

            <?php foreach ($danhsach_khoa as $khoa) { ?>
                <option value="<?php echo $khoa["MAKHOA"]; ?>">
                    <?php echo $khoa["TENKHOA"]; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>
