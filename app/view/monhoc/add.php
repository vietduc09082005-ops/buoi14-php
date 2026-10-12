
<div class="container-fluid">
    <h2 class="mb-4">Thêm môn học</h2>

    <form action="index.php?controller=monhoc&action=store" method="POST">
        <div class="mb-3">
            <label class="form-label">Mã môn học</label>
            <input type="text" name="MAMH" class="form-control"
                   maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên môn học</label>
            <input type="text" name="TENMH" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu môn học</button>
        <a href="index.php?controller=monhoc" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
