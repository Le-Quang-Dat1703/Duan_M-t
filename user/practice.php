<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Luyện Tập</title>
    <link rel="stylesheet" href="../css/practice.css">
    <style>

    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="header-menu">

            </div>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm">
                <button>Tìm kiếm</button>
            </div>

        </div>
    </header>
    <div class="container">
        <div class="sidebar">
            <h3>Danh sách bài tập</h3>
            <ul id="exerciseList">
                <li onclick="loadExercise('Bài 1')">Bài 1: Cộng hai số</li>
                <li onclick="loadExercise('Bài 2')">Bài 2: Kiểm tra số nguyên tố</li>
            </ul>
        </div>
        <div class="main-content">
            <div>
                <h3 id="exerciseTitle">Chi tiết bài tập</h3>
                <p id="exerciseDescription">Chọn một bài tập để xem chi tiết.</p>
                <textarea class="code-editor" id="codeEditor">// Viết mã của bạn ở đây</textarea>
                <button onclick="runCode()">Chạy mã</button>
                <pre id="output">Kết quả sẽ hiển thị ở đây.</pre>
            </div>
            <div>
                <h1> anh đạt đây</h1>
            </div>
        </div>

    </div>

    <script src="../js/practice.js">
    </script>
</body>

</html>