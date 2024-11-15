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
