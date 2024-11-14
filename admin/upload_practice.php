<?php
// Kết nối đến cơ sở dữ liệu
// require '../components/connect.php'; // Đảm bảo đường dẫn đúng tới file kết nối

// // Kiểm tra xem form đã được gửi hay chưa
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Lấy dữ liệu từ form
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $due_date = $_POST['due_date'];
//     $status = 'pending'; // Trạng thái mặc định là 'pending'

//     // Kiểm tra các trường có rỗng không
//     if (empty($title) || empty($description)) {
//         echo "Vui lòng điền đầy đủ thông tin!";
//     } else {
//         // Tạo ID duy nhất
//         $id = uniqid(); // Bạn có thể dùng hàm uniqid() để tạo ID duy nhất

//         // Chuẩn bị câu lệnh SQL để thêm bài tập vào bảng exercises
//         $sql = "INSERT INTO exercises (id, title, description, due_date, status) 
//                 VALUES (:id, :title, :description, :due_date, :status)";
//         $stmt = $conn->prepare($sql);

//         // Gán giá trị cho các tham số
//         $stmt->bindParam(':id', $id);
//         $stmt->bindParam(':title', $title);
//         $stmt->bindParam(':description', $description);
//         $stmt->bindParam(':due_date', $due_date);
//         $stmt->bindParam(':status', $status);

//         // Thực thi câu lệnh SQL và kiểm tra xem có thành công không
//         if ($stmt->execute()) {
//             echo "Bài tập đã được thêm thành công!";
//         } else {
//             echo "Đã xảy ra lỗi khi thêm bài tập.";
//         }
//     }
// }
?>

<!-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Tập</title>
</head>

<body>
    <div class="form-container">
        <h2>Thêm Bài Tập</h2>
        <form action="add_exercise.php" method="post">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Ngày đến hạn</label>
                <input type="date" id="due_date" name="due_date" required>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">Thêm Bài Tập</button>
            </div>
        </form>
    </div>
</body>

</html> -->

<?php
require '../components/connect.php';

// Kiểm tra xem form đã được gửi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $result = $_POST['result'];  // Lấy kết quả bài tập từ form

    // Kiểm tra các trường có rỗng không
    if (empty($id) || empty($title) || empty($description) || empty($result)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Chuẩn bị câu lệnh SQL để thêm bài tập vào bảng exercises
        $sql = "INSERT INTO exercises (id, title, description, result) VALUES (:id, :title, :description, :result)";
        $stmt = $conn->prepare($sql);

        // Gán giá trị cho các tham số
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':result', $result);  // Bind kết quả bài tập

        // Thực thi câu lệnh SQL và kiểm tra xem có thành công không
        if ($stmt->execute()) {
            header('Location: ../user/practice.php');  // Chuyển hướng sau khi thêm bài tập thành công
            exit();
        } else {
            echo "Đã xảy ra lỗi khi thêm bài tập.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Tập</title>
</head>

<body>

    <div>
        <h2>Thêm Bài Tập</h2>
        <form action="" method="post">
            <table border="1">
                <caption>Thêm Bài Tập</caption>

                <tr>
                    <td><label for="id">Mã Bài Tập</label></td>
                    <td><input type="text" name="id" id="id" required></td>
                </tr>

                <tr>
                    <td><label for="title">Tiêu Đề Bài Tập</label></td>
                    <td><input type="text" name="title" id="title" required></td>
                </tr>

                <tr>
                    <td><label for="description">Mô Tả Bài Tập</label></td>
                    <td><textarea name="description" id="description" rows="4" required></textarea></td>
                </tr>

                <!-- Thêm trường kết quả bài tập -->
                <tr>
                    <td><label for="result">Kết Quả Bài Tập</label></td>
                    <td><textarea name="result" id="result" rows="4" required></textarea></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit">Thêm Bài Tập</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>