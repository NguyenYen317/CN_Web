<?php
// Bước 1: Gọi file data.php chứa mảng dữ liệu (giả lập CSDL)
require './flowers.php';

// Bước 2: Nhận thông báo thành công tạo mới qua phương thức GET (nếu có)
$success = $_GET['success'] ?? "";

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Hoa </title>
    <!-- Chèn CSS nếu cần, ví dụ Bootstrap hay style.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        img {
           weight: 70px;
           height: 70px;
        }
        img[src = "./images/hoa_mai.jpg"]{
            weight: 60px;
            height: 60px;
        }
        
     </style>
</head>
<body>
<div class="navbar mx-4">
    <div>
        <a href="bai1_view_guest.php">Dashboard</a>
        <a href="create.php" class="btn btn-primary mx-3">+ Thêm loại hoa mới</a>
    </div>
</div>

<div class="container">
    <h1>Dashboard</h1>
    <p>Dữ liệu trong ví dụ này đang được lưu cố định trong một mảng PHP (chưa dùng CSDL).</p>
    
    <!-- Bước 3: Hiển thị thông báo nếu có tham số ?success=created -->
    <?php if ($success == "created"): ?>
        <div style="padding: 10px; background:#d1e7dd; color:#0f5132; border-radius:4px; margin-bottom:16px;">
            Giả lập: Thêm loại hoa mới thành công! (thông báo thông qua tham số GET trong URL).
        </div>
    <?php endif; ?>

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên hoa</th>
            <th class = "text-center">Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            <?php if(!empty($flowers)): ?>
                <?php foreach($flowers as $flower): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($flower['stt']) ?></td>
                        <td><?php echo htmlspecialchars($flower['name']) ?></td>
                        <td><?php echo htmlspecialchars($flower['mo_ta']) ?></td>
                        <td><img  src="<?php echo htmlspecialchars($flower['anh']) ?>" alt="anh_hoa"></td>
                        <td class = "text-center">
                            <button class ="btn btn-success">Sửa</button>
                            <button class ="btn btn-danger mt-1">Xóa</button>
                        </td>           
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Chưa có loại hoa nào trong mảng.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>    