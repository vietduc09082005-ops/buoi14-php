
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">THÊM CHUYÊN CẦN</h2>
            <p class="text-muted">Nhập thông tin điểm danh sinh viên</p>
        </div>

        <a href="index.php?controller=chuyencan"
           class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông tin chuyên cần</h5>
        </div>

        <div class="card-body p-4">
            <form action="index.php?controller=chuyencan&action=store"
                  method="POST">

                <div class="mb-3">
                    <label for="MASV" class="form-label fw-bold">
                        Mã sinh viên
                    </label>
                    <input type="text"
                           class="form-control"
                           id="MASV"
                           name="MASV"
                           placeholder="Nhập mã sinh viên"
                           required>
                </div>

                <div class="mb-3">
                    <label for="MAMH" class="form-label fw-bold">
                        Mã môn học
                    </label>
                    <input type="text"
                           class="form-control"
                           id="MAMH"
                           name="MAMH"
                           placeholder="Nhập mã môn học"
                           required>
                </div>

                <div class="mb-3">
                    <label for="NGAY" class="form-label fw-bold">
                        Ngày điểm danh
                    </label>
                    <input type="date"
                           class="form-control"
                           id="NGAY"
                           name="NGAY"
                           value="<?php echo date('Y-m-d'); ?>"
                           required>
                </div>

                <div class="mb-4">
                    <label for="TRANGTHAI" class="form-label fw-bold">
                        Trạng thái
                    </label>
                    <select class="form-select"
                            id="TRANGTHAI"
                            name="TRANGTHAI"
                            required>
                        <option value="1">Có mặt</option>
                        <option value="0">Vắng</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Lưu chuyên cần
                    </button>

                    <a href="index.php?controller=chuyencan"
                       class="btn btn-outline-secondary">
                        Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
