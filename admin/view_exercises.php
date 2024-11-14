<?php
// Kết nối đến cơ sở dữ liệu
require '../components/connect.php'; // Đảm bảo đường dẫn đúng tới file kết nối

// Lấy dữ liệu từ bảng exercises
$sql = "SELECT * FROM exercises";
$stmt = $conn->prepare($sql);
$stmt->execute();
$exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài tập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status {
            padding: 5px;
            border-radius: 4px;
            color: white;
        }

        .pending {
            background-color: orange;
        }

        .completed {
            background-color: green;
        }

        .overdue {
            background-color: red;
        }
    </style>
</head>

<body>

    <h1>Danh Sách Bài Tập</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Mô Tả</th>
                <th>Ngày Đến Hạn</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị dữ liệu từ bảng exercises
            foreach ($exercises as $exercise) {
                // Lấy trạng thái và định dạng màu sắc
                $status_class = '';
                if ($exercise['status'] == 'pending') {
                    $status_class = 'pending';
                } elseif ($exercise['status'] == 'completed') {
                    $status_class = 'completed';
                } elseif ($exercise['status'] == 'overdue') {
                    $status_class = 'overdue';
                }
                ?>
                <tr>
                    <td><?php echo $exercise['id']; ?></td>
                    <td><?php echo $exercise['title']; ?></td>
                    <td><?php echo $exercise['description']; ?></td>
                    <td><?php echo $exercise['due_date']; ?></td>
                    <td><span class="status <?php echo $status_class; ?>"><?php echo $exercise['status']; ?></span></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>