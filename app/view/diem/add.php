
<div class="container-fluid">
    <h2 class="mb-4">Thêm điểm</h2>

    <form action="index.php?controller=diem&action=store" method="POST">
        <div class="mb-3">
            <label class="form-label">Tìm sinh viên</label>
            <input
                type="text"
                id="timSinhVien"
                class="form-control mb-2"
                placeholder="Nhập mã sinh viên hoặc họ tên..."
                autocomplete="off"
            >

            <label class="form-label">Chọn sinh viên</label>
            <select name="MASV" id="chonSinhVien" class="form-control" required>
                <option value="">-- Chọn sinh viên --</option>
                <?php
                $sinhviens = mysqli_query($conn, "SELECT MASV, HOTEN FROM sinhvien ORDER BY MASV");

                while ($sv = mysqli_fetch_assoc($sinhviens)):
                ?>
                    <option
                        value="<?= htmlspecialchars($sv["MASV"], ENT_QUOTES, "UTF-8") ?>"
                        data-search="<?= htmlspecialchars($sv["MASV"] . " " . $sv["HOTEN"], ENT_QUOTES, "UTF-8") ?>"
                    >
                        <?= htmlspecialchars($sv["MASV"] . " - " . $sv["HOTEN"], ENT_QUOTES, "UTF-8") ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <small class="text-muted">Gõ mã sinh viên hoặc họ tên để lọc danh sách.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Mã môn học</label>
            <select name="MAMH" class="form-control" required>
                <option value="">-- Chọn môn học --</option>
                <?php
                $monhocs = mysqli_query($conn, "SELECT MAMH, TENMH FROM monhoc ORDER BY MAMH");

                while ($mh = mysqli_fetch_assoc($monhocs)):
                ?>
                    <option value="<?= htmlspecialchars($mh["MAMH"], ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($mh["MAMH"] . " - " . $mh["TENMH"], ENT_QUOTES, "UTF-8") ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm chuyên cần</label>
            <input type="number" name="DIEMCC" class="form-control"
                   min="0" max="10" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm giữa kỳ</label>
            <input type="number" name="DIEMGK" class="form-control"
                   min="0" max="10" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm cuối kỳ</label>
            <input type="number" name="DIEMCK" class="form-control"
                   min="0" max="10" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu điểm</button>
        <a href="index.php?controller=diem" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<script>
const timSinhVien = document.getElementById("timSinhVien");
const chonSinhVien = document.getElementById("chonSinhVien");

timSinhVien.addEventListener("input", function () {
    const tuKhoa = this.value.trim().toLowerCase();
    const cacOption = chonSinhVien.querySelectorAll("option");

    cacOption.forEach(function (option, index) {
        if (index === 0) {
            option.hidden = false;
            return;
        }

        const noiDung = option.dataset.search.toLowerCase();
        option.hidden = !noiDung.includes(tuKhoa);
    });

    const luaChonHienTai = chonSinhVien.selectedOptions[0];

    if (luaChonHienTai && luaChonHienTai.hidden) {
        chonSinhVien.value = "";
    }
});
</script>
