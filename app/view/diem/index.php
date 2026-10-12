
<div class="container-fluid">
    <h2 class="mb-4">Quản lý điểm</h2>

    <a href="index.php?controller=diem&action=add" class="btn btn-primary mb-3">
        Thêm điểm
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Mã môn học</th>
                <th>Tên môn học</th>
                <th>Điểm chuyên cần</th>
                <th>Điểm giữa kỳ</th>
                <th>Điểm cuối kỳ</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php if (mysqli_num_rows($danhsach) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($danhsach)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["MASV"]) ?></td>
                        <td><?= htmlspecialchars($row["HOTEN"]) ?></td>
                        <td><?= htmlspecialchars($row["MAMH"]) ?></td>
                        <td><?= htmlspecialchars($row["TENMH"]) ?></td>
                        <td><?= htmlspecialchars($row["DIEMCC"] ?? "") ?></td>
                        <td><?= htmlspecialchars($row["DIEMGK"] ?? "") ?></td>
                        <td><?= htmlspecialchars($row["DIEMCK"] ?? "") ?></td>
                        <td>
                            <a href="index.php?controller=diem&action=edit&masv=<?= urlencode($row["MASV"]) ?>&mamh=<?= urlencode($row["MAMH"]) ?>"
                               class="btn btn-warning btn-sm">Sửa</a>

                            <a href="index.php?controller=diem&action=delete&masv=<?= urlencode($row["MASV"]) ?>&mamh=<?= urlencode($row["MAMH"]) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa điểm này không?')">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Chưa có dữ liệu điểm.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
