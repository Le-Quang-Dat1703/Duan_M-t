<?php

?>

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

    alert(selectedNumber);
</script>

</html>