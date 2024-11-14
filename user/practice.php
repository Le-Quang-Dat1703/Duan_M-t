<!-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Luyện Tập</title>
    <link rel="stylesheet" href="/course/css/practice.css">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="../images/logo.png" alt="">
                <h1>codewrite</h1>
            </div>
            <div class="header-menu">
                <nav>
                    <div class="menu">
                        <h4>học tập</h4>
                        <h4>luyện tập</h4>
                        <h4>thi đấu</h4>
                        <h4>xếp hạng</h4>
                    </div>
                </nav>
            </div>
            <div class="search">
                <img src="../images/pic-3.jpg" alt="">
            </div>
        </div>
    </header>
    <div class="content">
        <div>
            <h4>hiện thị tên khóa học</h4>
        </div>
        <div class="list-exercise">
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
        </div>
    </div>
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
                <h1>anh đạt đây</h1>
            </div>
        </div>
    </div>

    <script>
        // Lưu đáp án mẫu cho mỗi bài tập
        const answers = {
            "Bài 1": "function sum(a, b) { return a + b; }",
            "Bài 2": "function isPrime(n) { if (n < 2) return false; for (let i = 2; i <= Math.sqrt(n); i++) if (n % i === 0) return false; return true; }"
        };

        let currentExercise = null;

        function loadExercise(exercise) {
            currentExercise = exercise;
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

            // Đặt lại các hàm để tránh xung đột với lần chạy trước
            let sum = null;
            let isPrime = null;

            try {
                // Sử dụng eval để chạy mã của người dùng và định nghĩa các hàm trong phạm vi
                eval(code);

                // Kiểm tra bài tập hiện tại dựa trên hàm mà người dùng đã viết
                if (currentExercise === "Bài 1") {
                    // Kiểm tra xem hàm sum có chính xác không
                    if (typeof sum === 'function' && sum(2, 3) === 5) {
                        output.innerText = 'Chúc mừng! Bạn đã giải đúng bài tập!';
                    } else {
                        output.innerText = 'Đáp án chưa chính xác. Hãy thử lại!';
                    }
                } else if (currentExercise === "Bài 2") {
                    // Kiểm tra xem hàm isPrime có chính xác không
                    if (typeof isPrime === 'function' && isPrime(7) && !isPrime(4)) {
                        output.innerText = 'Chúc mừng! Bạn đã giải đúng bài tập!';
                    } else {
                        output.innerText = 'Đáp án chưa chính xác. Hãy thử lại!';
                    }
                }
            } catch (e) {
                output.innerText = 'Có lỗi xảy ra trong mã của bạn. Hãy kiểm tra lại.\nLỗi: ' + e.message;
            }
        }
    </script>
</body>

</html> -->
<?php
// Kết nối đến cơ sở dữ liệu
require '../components/connect.php';

// Kiểm tra xem có 'exercise_id' trong URL hay không
if (isset($_GET['exercise_id'])) {
    $exercise_id = $_GET['exercise_id'];  // Lấy ID bài tập từ URL
} else {
    // Nếu không có 'exercise_id', hiển thị thông báo lỗi
    echo "Bài tập không tồn tại.";
    exit;  // Dừng mã sau khi hiển thị thông báo lỗi
}

// Truy vấn câu hỏi và đáp án từ bảng exercises
$sql = "SELECT title, description, result FROM exercises WHERE id = :exercise_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':exercise_id', $exercise_id);
$stmt->execute();
$exercise = $stmt->fetch();

// Kiểm tra xem bài tập có tồn tại không
if (!$exercise) {
    echo "Bài tập không tồn tại.";
    exit;
}

// Hiển thị thông tin bài tập
$title = htmlspecialchars($exercise['title']);
$description = htmlspecialchars($exercise['description']);
$correct_answer = $exercise['result'];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Luyện Tập</title>
    <link rel="stylesheet" href="../css/practice.css">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="../images/logo.png" alt="Logo">
                <h1>codewrite</h1>
            </div>
            <div class="header-menu">
                <nav>
                    <div class="menu">
                        <h4>học tập</h4>
                        <h4>luyện tập</h4>
                        <h4>thi đấu</h4>
                        <h4>xếp hạng</h4>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="content">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $description; ?></p>

        <!-- Form nhập đáp án -->
        <form action="" method="post">
            <textarea name="user_answer" required></textarea><br>
            <input type="submit" name="submit_answer" value="Gửi đáp án">
        </form>

        <?php
        // Kiểm tra nếu người dùng đã gửi đáp án
        if (isset($_POST['submit_answer'])) {
            $user_answer = $_POST['user_answer'];

            // So sánh đáp án người dùng nhập vào với đáp án trong cơ sở dữ liệu
            if (trim($user_answer) == trim($correct_answer)) {
                echo "<p>Đáp án chính xác!</p>";
            } else {
                echo "<p>Đáp án sai, vui lòng thử lại.</p>";
            }
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Codewrite. Tất cả các quyền được bảo vệ.</p>
    </footer>
</body>

</html>



<!--  -->


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Luyện Tập</title>
    <link rel="stylesheet" href="/course/css/practice.css">
    <style></style>
</head>

<body>

    <header>
        <div class="header-content">

            <div class="logo">
                <img src="../images/logo.png" alt="">
                <h1>codewrite</h1>
            </div>
            <div class="header-menu">
                <nav>
                    <div class="menu">
                        <h4>học tập</h4>
                        <h4>luyện tập</h4>
                        <h4>thi đấu</h4>
                        <h4>xếp hạng</h4>
                    </div>
                </nav>
            </div>

            <div class="search">
                <img src="../images/pic-3.jpg" alt="">
            </div>
        </div>
    </header>
    <div class="content">
        <div>
            <h4>hiện thị tên khóa học</h4>
        </div>
        <div class="list-exercise">
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>

        </div>
    </div>
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
        // Lưu đáp án mẫu cho mỗi bài tập
        const answers = {
            "Bài 1": "function sum(a, b) { return a + b; }",
            "Bài 2": "function isPrime(n) { if (n < 2) return false; for (let i = 2; i <= Math.sqrt(n); i++) if (n % i === 0) return false; return true; }"
        };
        let currentExercise = null;
        f
        function loadExercise(exercise) {
            currentExercise = exercise;
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

            // Đặt lại các hàm để tránh xung đột với lần chạy trước
            let sum = null;
            let isPrime = null;

            try {
                // Sử dụng eval để chạy mã của người dùng và định nghĩa các hàm trong phạm vi
                eval(code);

                // Kiểm tra bài tập hiện tại dựa trên hàm mà người dùng đã viết
                if (currentExercise === "Bài 1") {
                    // Kiểm tra xem hàm sum có chính xác không
                    if (typeof sum === 'function' && sum(2, 3) === 5) {
                        output.innerText = 'Chúc mừng! Bạn đã giải đúng bài tập!';
                    } else {
                        output.innerText = 'Đáp án chưa chính xác. Hãy thử lại!';
                    }
                } else if (currentExercise === "Bài 2") {
                    // Kiểm tra xem hàm isPrime có chính xác không
                    if (typeof isPrime === 'function' && isPrime(7) && !isPrime(4)) {
                        output.innerText = 'Chúc mừng! Bạn đã giải đúng bài tập!';
                    } else {
                        output.innerText = 'Đáp án chưa chính xác. Hãy thử lại!';
                    }
                }
            } catch (e) {
                output.innerText = 'Có lỗi xảy ra trong mã của bạn. Hãy kiểm tra lại.\nLỗi: ' + e.message;
            }
        }

    </script>
</body>

</html>