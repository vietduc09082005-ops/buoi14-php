
<div class="container-fluid">
    <h2 class="mb-4">Thêm lớp học</h2>

    <form action="index.php?controller=lop&action=store" method="POST">
        <div class="mb-3">
            <label class="form-label">Mã lớp</label>
            <input type="text" name="MALOP" class="form-control"
                   maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="TENLOP" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <select name="MAKHOA" class="form-control" required>
                <option value="">-- Chọn khoa --</option>
                <?php
                $khoas = mysqli_query($conn, "SELECT MAKHOA, TENKHOA FROM khoa");

                if (!$khoas) {
                    die("Lỗi lấy danh sách khoa: " . mysqli_error($conn));
                }

                while ($khoa = mysqli_fetch_assoc($khoas)):
                ?>
                    <option value="<?= htmlspecialchars($khoa["MAKHOA"], ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($khoa["MAKHOA"] . " - " . $khoa["TENKHOA"]) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu lớp</button>
        <a href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
