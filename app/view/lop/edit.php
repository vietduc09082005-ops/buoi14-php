
<div class="container-fluid">
    <h2 class="mb-4">Sửa lớp học</h2>

    <form action="index.php?controller=lop&action=update&malop=<?= urlencode($lop["MALOP"]) ?>"
          method="POST">

        <div class="mb-3">
            <label class="form-label">Mã lớp</label>
            <input type="text" class="form-control"
                   value="<?= htmlspecialchars($lop["MALOP"]) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên lớp</label>
            <input type="text" name="TENLOP" class="form-control"
                   value="<?= htmlspecialchars($lop["TENLOP"]) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <select name="MAKHOA" class="form-control" required>
                <?php
                $khoas = mysqli_query($conn, "SELECT MAKHOA, TENKHOA FROM khoa");

                while ($khoa = mysqli_fetch_assoc($khoas)):
                    $selected = ($khoa["MAKHOA"] == $lop["MAKHOA"]) ? "selected" : "";
                ?>
                    <option value="<?= htmlspecialchars($khoa["MAKHOA"], ENT_QUOTES, "UTF-8") ?>"
                        <?= $selected ?>>
                        <?= htmlspecialchars($khoa["MAKHOA"] . " - " . $khoa["TENKHOA"]) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
