<h1>Thêm sinh viên</h1>

<form method="POST">
    <p>
        Mã sinh viên:
        <input type="text" name="masv" required>
    </p>

    <p>
        Họ tên:
        <input type="text" name="hoten" required>
    </p>

    <p>
        Ngày sinh:
        <input type="date" name="ngaysinh" required>
    </p>

    <p>
        Giới tính:
        <select name="gioitinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </p>

    <p>
        Địa chỉ:
        <input type="text" name="diachi">
    </p>

    <p>
        Lớp:
        <select name="malop" required>
            <?php while ($row = mysqli_fetch_assoc($dsLop)) { ?>
                <option value="<?php echo $row["MALOP"]; ?>">
                    <?php echo $row["TENLOP"]; ?>
                </option>
            <?php } ?>
        </select>
    </p>

    <button type="submit" name="btnThem">Thêm sinh viên</button>
</form>

<br>

<a href="index.php?page=sinhvien">Quay lại</a>