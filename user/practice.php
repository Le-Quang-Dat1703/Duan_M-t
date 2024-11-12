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
    <h1>Phần Luyện Tập</h1>
    <div class="container">
        <div class="sidebar">
            <h3>Danh sách bài tập</h3>
            <ul id="exerciseList">
                <li onclick="loadExercise('Bài 1')">Bài 1: Cộng hai số</li>
                <li onclick="loadExercise('Bài 2')">Bài 2: Kiểm tra số nguyên tố</li>
            </ul>
        </div>
        <div class="main-content">
            <h3 id="exerciseTitle">Chi tiết bài tập</h3>
            <p id="exerciseDescription">Chọn một bài tập để xem chi tiết.</p>
            <textarea class="code-editor" id="codeEditor">// Viết mã của bạn ở đây</textarea>
            <button onclick="runCode()">Chạy mã</button>
            <pre id="output">Kết quả sẽ hiển thị ở đây.</pre>
        </div>
        <h1>hhihi</h1>
    </div>

    <script>
        function loadExercise(exercise) {
            const title = document.getElementById('exerciseTitle');
            const description = document.getElementById('exerciseDescription');
            if (exercise === 'Bài 1') {
                title.innerText = 'Bài 1: Cộng hai số';
                description.innerText = 'Viết một hàm để cộng hai số và trả về kết quả.';
            } else if (exercise === 'Bài 2') {
                title.innerText = 'Bài 2: Kiểm tra số nguyên tố';
                description.innerText = 'Viết một hàm để kiểm tra xem một số có phải là số nguyên tố không.';
            }
        }

        // Lưu đáp án mẫu cho mỗi bài tập
        const answers = {
            "Bài 1": "function sum(a, b) { return a + b; }",
            "Bài 2": "function isPrime(n) { if (n < 2) return false; for (let i = 2; i <= Math.sqrt(n); i++) if (n % i === 0) return false; return true; }"
        };

        function loadExercise(exercise) {
            const title = document.getElementById('exerciseTitle');
            const description = document.getElementById('exerciseDescription');
            if (exercise === 'Bài 1') {
                title.innerText = 'Bài 1: Cộng hai số';
                description.innerText = 'Viết một hàm để cộng hai số và trả về kết quả.';
            } else if (exercise === 'Bài 2') {
                title.innerText = 'Bài 2: Kiểm tra số nguyên tố';
                description.innerText = 'Viết một hàm để kiểm tra xem một số có phải là số nguyên tố không.';
            }
        }

        function runCode() {
            const code = document.getElementById('codeEditor').value;
            const output = document.getElementById('output');

            try {
                // Chạy mã của người dùng
                eval(code);

                // Kiểm tra xem hàm sum có trả về kết quả đúng không
                if (typeof sum === 'function' && sum(2, 3) === 5) {
                    output.innerText = 'Chúc mừng! Bạn đã giải đúng bài tập!';
                } else {
                    output.innerText = 'Đáp án chưa chính xác. Hãy thử lại!';
                }
            } catch (e) {
                output.innerText = 'Có lỗi xảy ra trong mã của bạn. Hãy kiểm tra lại.';
            }
        }

    </script>
</body>

</html>