<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">QUẢN LÝ CHUYÊN CẦN</h2>
            <p class="text-muted mb-0">
                Theo dõi tình trạng chuyên cần của sinh viên
            </p>
        </div>

        <a href="index.php?controller=chuyencan&action=add"
           class="btn btn-primary">
            + Thêm chuyên cần
        </a>
    </div>

    <!-- Thống kê -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Tổng bản ghi</h6>
                    <h3 class="fw-bold text-primary">
                        <?php echo isset($danhsach) ? mysqli_num_rows($danhsach) : 0; ?>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Có mặt</h6>
                    <h3 class="fw-bold text-success">
                        <?php
                        $coMat = 0;
                        if (isset($danhsach) && mysqli_num_rows($danhsach) > 0) {
                            mysqli_data_seek($danhsach, 0);
                            while ($item = mysqli_fetch_assoc($danhsach)) {
                                if ((string)$item["TRANGTHAI"] === "1") {
                                    $coMat++;
                                }
                            }
                            mysqli_data_seek($danhsach, 0);
                        }
                        echo $coMat;
                        ?>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Vắng mặt</h6>
                    <h3 class="fw-bold text-danger">
                        <?php
                        $vang = 0;
                        if (isset($danhsach) && mysqli_num_rows($danhsach) > 0) {
                            mysqli_data_seek($danhsach, 0);
                            while ($item = mysqli_fetch_assoc($danhsach)) {
                                if ((string)$item["TRANGTHAI"] === "0") {
                                    $vang++;
                                }
                            }
                            mysqli_data_seek($danhsach, 0);
                        }
                        echo $vang;
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Danh sách chuyên cần</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">Mã CC</th>
                            <th>Mã sinh viên</th>
                            <th>Họ tên sinh viên</th>
                            <th>Môn học</th>
                            <th>Ngày</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($danhsach) && mysqli_num_rows($danhsach) > 0) { ?>

                            <?php while ($row = mysqli_fetch_assoc($danhsach)) { ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo htmlspecialchars($row["ID"] ?? ""); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row["MASV"] ?? ""); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row["HOTEN"] ?? ""); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row["TENMH"] ?? ""); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row["NGAY"] ?? ""); ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ((string)($row["TRANGTHAI"] ?? "") === "1") { ?>
                                            <span class="badge bg-success">Có mặt</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Vắng</span>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="index.php?controller=chuyencan&action=edit&id=<?php echo urlencode($row["ID"]); ?>"
                                           class="btn btn-warning btn-sm">
                                            Sửa
                                        </a>

                                        <a href="index.php?controller=chuyencan&action=delete&id=<?php echo urlencode($row["ID"]); ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này không?');">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Chưa có dữ liệu chuyên cần.
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
```