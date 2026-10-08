<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Thêm khoa mới</h2>

<form action="index.php?controller=khoa&action=store" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Mã khoa</label>
        <input type="text" name="ma_khoa" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Tên khoa</label>
        <input type="text" name="ten_khoa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Điện thoại</label>
        <input type="text" name="dien_thoai" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?controller=khoa" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>