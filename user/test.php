<html>
<div id="buttons">
    <button class="number-btn" data-info="Thông tin cho số 1">1</button>
    <button class="number-btn" data-info="Thông tin cho số 2">2</button>
    <button class="number-btn" data-info="Thông tin cho số 3">3</button>
    <!-- Thêm các nút khác nếu cần -->
</div>
<div id="info-display"></div>
<script>
    // Khởi tạo biến để lưu số dưới dạng chuỗi
    let selectedNumber = "";

    // Lấy tất cả các nút bấm
    const buttons = document.querySelectorAll('.number-btn');

    // Lắng nghe sự kiện click cho từng nút bấm
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Lấy số từ nội dung của nút bấm và lưu vào biến dưới dạng chuỗi
            selectedNumber = button.textContent.toString();

            // Hiển thị thông tin trong ô hiển thị
            const infoDisplay = document.getElementById('info-display');
            infoDisplay.textContent = `Số đã chọn: ${selectedNumber}`;

            // Bạn có thể kiểm tra giá trị biến bằng console.log
            console.log(selectedNumber); // In ra số đã chọn (dạng chuỗi)
        });
    });
    console.log(selectedNumber);

</script>

</html>

<?php
require '../components/connect.php';
$sql = "SELECT id, title, description, result  FROM exercises where id = 1";
$stmt = $conn->prepare($sql);
$stmt->bindColumn('id', $id);
$stmt->bindColumn('title', $title);
$stmt->bindColumn('description', $description);
$stmt->bindColumn('result', $result);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    while ($stmt->fetch())
    // if (!empty($result)) { 
    {

        ?>
        <table border="1">
            <h3><?php echo $id; ?></h3>
            <h3><?php echo $title; ?></h3>
            <h3><?php echo $description; ?></h3>
            <h3>Result: <?php echo $result; ?></h3>
        </table>



        <?php
        //}
    }
    ?>

</body>

</html>