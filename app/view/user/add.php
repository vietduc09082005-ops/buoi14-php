<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Thêm tài khoản mới</h2>

<form action="index.php?controller=user&action=store" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Mật khẩu</label>
        <input type="text" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Quyền</label>
        <select name="role" class="form-control" required>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?controller=user" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>