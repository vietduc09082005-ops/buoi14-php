<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Danh sách tài khoản</h2>

<a href="index.php?controller=user&action=add" class="btn btn-primary mb-3">
    Thêm tài khoản
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($danhsach)) { ?>
            <?php foreach ($danhsach as $user) { ?>
                <tr>
                    <td><?php echo $user["ID"]; ?></td>
                    <td><?php echo $user["USERNAME"]; ?></td>
                    <td><?php echo $user["PASSWORD"]; ?></td>
                    <td><?php echo $user["ROLE"]; ?></td>
                    <td>
                        <a href="index.php?controller=user&action=edit&id=<?php echo $user["ID"]; ?>" class="btn btn-sm btn-warning">
                            Sửa
                        </a>

                        <a href="index.php?controller=user&action=delete&id=<?php echo $user["ID"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa tài khoản này?')">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5" class="text-center">Chưa có tài khoản</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../include/footer.php'; ?>