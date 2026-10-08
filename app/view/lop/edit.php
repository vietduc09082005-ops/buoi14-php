<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Chỉnh sửa lớp</h2>

<form action="index.php?controller=lop&action=update&id=<?php echo $lop['MALOP']; ?>" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã lớp</label>
        <input type="text" name="ma_lop" class="form-control" value="<?php echo $lop['MALOP']; ?>" required readonly>
    </div>

    <div class="mb-2">
        <label>Tên lớp</label>
        <input type="text" name="ten_lop" class="form-control" value="<?php echo $lop['TENLOP']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Khoa</label>
        <select name="ma_khoa" class="form-control" required>
            <?php foreach ($danhsach_khoa as $khoa) { ?>
                <option value="<?php echo $khoa['MAKHOA']; ?>"
                    <?php if ($lop['MAKHOA'] == $khoa['MAKHOA']) echo "selected"; ?>>
                    <?php echo $khoa['TENKHOA']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>