
<div class="container-fluid">
    <h2 class="mb-4">Sửa điểm</h2>

    <form action="index.php?controller=diem&action=update&masv=<?= urlencode($diem["MASV"]) ?>&mamh=<?= urlencode($diem["MAMH"]) ?>"
          method="POST">

        <div class="mb-3">
            <label class="form-label">Mã sinh viên</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($diem["MASV"]) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Mã môn học</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($diem["MAMH"]) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm chuyên cần</label>
            <input type="number" name="DIEMCC" class="form-control"
                   value="<?= htmlspecialchars($diem["DIEMCC"] ?? "") ?>"
                   min="0" max="10" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm giữa kỳ</label>
            <input type="number" name="DIEMGK" class="form-control"
                   value="<?= htmlspecialchars($diem["DIEMGK"] ?? "") ?>"
                   min="0" max="10" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm cuối kỳ</label>
            <input type="number" name="DIEMCK" class="form-control"
                   value="<?= htmlspecialchars($diem["DIEMCK"] ?? "") ?>"
                   min="0" max="10" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?controller=diem" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
