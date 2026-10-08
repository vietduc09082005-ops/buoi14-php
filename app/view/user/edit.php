<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Chỉnh sửa tài khoản</h2>

<form action="index.php?controller=user&action=update&id=<?php echo $user['ID']; ?>" method="post" style="max-width: 500px;">
    <div class="mb-2">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" value="<?php echo $user['USERNAME']; ?>" required>
    </div>

    <div class="mb-2">
        <label>Mật khẩu</label>
        <input type="text" name="password" class="form-control" value="<?php echo $user['PASSWORD']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Quyền</label>
        <select name="role" class="form-control" required>
            <option value="admin" <?php if ($user['ROLE'] == 'admin') echo "selected"; ?>>admin</option>
            <option value="user" <?php if ($user['ROLE'] == 'user') echo "selected"; ?>>user</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?controller=user" class="btn btn-secondary">Quay lại</a>
</form>

<?php require_once __DIR__ . '/../include/footer.php'; ?>