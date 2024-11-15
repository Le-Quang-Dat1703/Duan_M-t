<?php
if (isset($_POST['id'])) {
    // Lấy ID bài tập được chọn từ nút submit
    $id = $_POST['id'];

    require '../components/connect.php';

    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT id, title, description, result FROM exercises WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Binding giá trị của id

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Lấy dữ liệu từ câu lệnh SELECT
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = $row['title'];
            $description = $row['description'];
            $result = $row['result'];

            // Hiển thị thông tin bài tập
            ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <td><?php echo htmlspecialchars($id); ?></td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><?php echo htmlspecialchars($title); ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo htmlspecialchars($description); ?></td>
                </tr>
                <tr>
                    <th>Result</th>
                    <td><?php echo htmlspecialchars($result); ?></td>
                </tr>
            </table>

            <?php
            // Kiểm tra khi người dùng đã nhập tên
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = $_POST['name'];
                // Kiểm tra tên bài tập nhập vào và title
                if ($name == $title) {
                    echo "Đúng";
                } else {
                    echo "Sai";
                }
            }
        }
    } else {
        echo "Không có bài tập với ID này.";
    }
} else {
    echo "Vui lòng chọn bài tập.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="" method="post">
        <label for="name">Nhập tên bài tập:</label>
        <input type="text" id="name" name="name">

        <!-- Nút gửi với giá trị ID là 77, 2, 3 -->
        <button type="submit" name="id" value="77">77</button>
        <button type="submit" name="id" value="2">2</button>
        <button type="submit" name="id" value="3">3</button>
    </form>
</body>

</html>