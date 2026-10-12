
<div class="container-fluid">
    <h2 class="mb-4">Sửa môn học</h2>

    <form action="index.php?controller=monhoc&action=update&mamh=<?= urlencode($monhoc["MAMH"]) ?>"
          method="POST">

        <div class="mb-3">
            <label class="form-label">Mã môn học</label>
            <input type="text" class="form-control"
                   value="<?= htmlspecialchars($monhoc["MAMH"]) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên môn học</label>
            <input type="text" name="TENMH" class="form-control"
                   value="<?= htmlspecialchars($monhoc["TENMH"]) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?controller=monhoc" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
