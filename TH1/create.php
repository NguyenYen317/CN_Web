<?php
// Không include database, chỉ minh họa POST

$thong_bao = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_hoa   = $_POST['ten_hoa'] ?? '';
    $mo_ta   = $_POST['mo_ta'] ?? '';
    $anh    = $_POST['anh'] ?? '';
// ??: Nó sẽ lấy giá trị bên trái nếu tồn tại và không phải null,
// nếu không thì lấy giá trị bên phải. Cách viết khác của toán tử 3 ngôi và có từ php 7

    // Quay về danh sách
    $thong_bao = "Dữ liệu đã được gửi bằng POST. (Trong bản có DB sẽ INSERT vào bảng.)";

    // Ví dụ: redirect để minh họa vòng đời request
    header("location: bai1_view_admin.php?success=created");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm loại hoa mới (Demo POST)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="navbar mx-4">
    <div>
        <a href="bai1_view_admin.php">Dashboard</a>
    </div>
</div>

<div class="container">
    <h2>Thêm loại hoa mới</h2>
    <p>Form này chỉ dùng để minh họa cách gửi dữ liệu bằng <b>POST</b> trong PHP, chưa lưu vào CSDL.</p>

<form action="create.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm" style="max-width: 500px; margin:auto;">
    <h4 class="mb-3 text-center">Thêm Hoa Mới</h4>

    <div class="mb-3">
        <label class="form-label">Tên hoa</label>
        <input type="text" name="ten_hoa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="mo_ta" id="mo_ta" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <input type="file" name="anh" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-2">Gửi dữ liệu (POST)</button>
    <a href="bai1_view_admin.php" class="btn btn-secondary w-100">Hủy</a>
</form>
</div>
</body>
</html>
