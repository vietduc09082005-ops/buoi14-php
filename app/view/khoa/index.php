<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/sidebar.php'; ?>

<h2 class="mb-3">Danh sách khoa</h2>

<a href="index.php?controller=khoa&action=add" class="btn btn-primary mb-3">
    Thêm khoa
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Mã khoa</th>
            <th>Tên khoa</th>
            <th>Điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($danhsach)) { ?>
            <?php foreach ($danhsach as $khoa) { ?>
                <tr>
                    <td><?php echo $khoa["MAKHOA"]; ?></td>
                    <td><?php echo $khoa["TENKHOA"]; ?></td>
                    <td><?php echo $khoa["DIENTHOAI"]; ?></td>
                    <td>
                        <a href="index.php?controller=khoa&action=edit&id=<?php echo $khoa["MAKHOA"]; ?>" class="btn btn-sm btn-warning">
                            Sửa
                        </a>

                        <a href="index.php?controller=khoa&action=delete&id=<?php echo $khoa["MAKHOA"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa khoa này?')">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4" class="text-center">Chưa có khoa</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../include/footer.php'; ?>