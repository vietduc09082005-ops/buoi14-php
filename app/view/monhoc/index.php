
<div class="container-fluid">
    <h2 class="mb-4">Quản lý môn học</h2>

    <form method="GET" action="index.php" class="row g-2 mb-3">
        <input type="hidden" name="controller" value="monhoc">

        <div class="col-md-5">
            <input type="text" name="keyword" class="form-control"
                   placeholder="Tìm mã hoặc tên môn học..."
                   value="<?= htmlspecialchars($keyword, ENT_QUOTES, "UTF-8") ?>">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="index.php?controller=monhoc" class="btn btn-secondary">Làm mới</a>
        </div>
    </form>

    <a href="index.php?controller=monhoc&action=add"
       class="btn btn-success mb-3">+ Thêm môn học</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã môn học</th>
                    <th>Tên môn học</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php $stt = 1; ?>

                <?php if (mysqli_num_rows($danhsach) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($danhsach)): ?>
                        <tr>
                            <td><?= $stt++ ?></td>
                            <td><?= htmlspecialchars($row["MAMH"]) ?></td>
                            <td><?= htmlspecialchars($row["TENMH"]) ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="index.php?controller=monhoc&action=edit&mamh=<?= urlencode($row["MAMH"]) ?>">
                                    Sửa
                                </a>

                                <a class="btn btn-danger btn-sm"
                                   href="index.php?controller=monhoc&action=delete&mamh=<?= urlencode($row["MAMH"]) ?>"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa môn học này không?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không tìm thấy môn học.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
