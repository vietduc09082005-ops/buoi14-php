
<div class="container-fluid">
    <h2 class="mb-4">Quản lý lớp học</h2>

    <form method="GET" action="index.php" class="row g-2 mb-3">
        <input type="hidden" name="controller" value="lop">

        <div class="col-md-5">
            <input type="text" name="keyword" class="form-control"
                   placeholder="Tìm mã lớp hoặc tên lớp..."
                   value="<?= htmlspecialchars($keyword, ENT_QUOTES, "UTF-8") ?>">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="index.php?controller=lop" class="btn btn-secondary">Làm mới</a>
        </div>
    </form>

    <a href="index.php?controller=lop&action=add"
       class="btn btn-success mb-3">+ Thêm lớp</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Khoa</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php $stt = 1; ?>

                <?php if (mysqli_num_rows($danhsach) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($danhsach)): ?>
                        <tr>
                            <td><?= $stt++ ?></td>
                            <td><?= htmlspecialchars($row["MALOP"]) ?></td>
                            <td><?= htmlspecialchars($row["TENLOP"]) ?></td>
                            <td><?= htmlspecialchars($row["TENKHOA"] ?? "Chưa có khoa") ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="index.php?controller=lop&action=edit&malop=<?= urlencode($row["MALOP"]) ?>">
                                    Sửa
                                </a>

                                <a class="btn btn-danger btn-sm"
                                   href="index.php?controller=lop&action=delete&malop=<?= urlencode($row["MALOP"]) ?>"
                                   onclick="return confirm('Bạn có chắc muốn xóa lớp này không?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không tìm thấy lớp học.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
