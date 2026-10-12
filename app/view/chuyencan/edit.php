<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-warning">SỬA CHUYÊN CẦN</h2>
            <p class="text-muted">Cập nhật thông tin điểm danh sinh viên</p>
        </div>

        <a href="index.php?controller=chuyencan"
           class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <?php if (isset($chuyencan) && $chuyencan) { ?>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning">
                <h5 class="mb-0">Thông tin chuyên cần</h5>
            </div>

            <div class="card-body p-4">
                <form action="index.php?controller=chuyencan&action=update&id=<?php echo urlencode($chuyencan['ID']); ?>"
                      method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="MASV">
                            Mã sinh viên
                        </label>
                        <input type="text"
                               class="form-control"
                               id="MASV"
                               name="MASV"
                               value="<?php echo htmlspecialchars($chuyencan['MASV'] ?? ''); ?>"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="MAMH">
                            Mã môn học
                        </label>
                        <input type="text"
                               class="form-control"
                               id="MAMH"
                               name="MAMH"
                               value="<?php echo htmlspecialchars($chuyencan['MAMH'] ?? ''); ?>"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="NGAY">
                            Ngày điểm danh
                        </label>
                        <input type="date"
                               class="form-control"
                               id="NGAY"
                               name="NGAY"
                               value="<?php echo htmlspecialchars($chuyencan['NGAY'] ?? ''); ?>"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="TRANGTHAI">
                            Trạng thái
                        </label>
                        <select class="form-select"
                                id="TRANGTHAI"
                                name="TRANGTHAI"
                                required>
                            <option value="1"
                                <?php echo (string)$chuyencan['TRANGTHAI'] === '1' ? 'selected' : ''; ?>>
                                Có mặt
                            </option>

                            <option value="0"
                                <?php echo (string)$chuyencan['TRANGTHAI'] === '0' ? 'selected' : ''; ?>>
                                Vắng
                            </option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            Cập nhật
                        </button>

                        <a href="index.php?controller=chuyencan"
                           class="btn btn-outline-secondary">
                            Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>

    <?php } else { ?>

        <div class="alert alert-danger">
            Không tìm thấy dữ liệu chuyên cần cần sửa.
        </div>

        <a href="index.php?controller=chuyencan"
           class="btn btn-primary">
            Quay lại danh sách
        </a>

    <?php } ?>
</div>
