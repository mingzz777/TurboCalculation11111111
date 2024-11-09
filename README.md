# TurboCalculation
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turbo Calculation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .hidden {
            display: none;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            border: none;
            border-radius: 5px;
            background-color: #29b6f6;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .btn-green { background-color: #66bb6a; }
        .btn-pink { background-color: #ec407a; }
        .btn-yellow { background-color: #ffb300; }
        .btn-orange { background-color: #fb8c00; }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Welcome Screen -->
        <div id="welcome-screen">
            <h1>Turbo Calculation</h1>
            <button class="btn" onclick="showLogin()">เข้าสู่ระบบ</button>
            <button class="btn" onclick="showSignup()">สมัครใช้งาน</button>
        </div>

        <!-- Login Screen -->
        <div id="login-screen" class="hidden">
            <h1>เข้าสู่ระบบ</h1>
            <input type="email" id="login-email" class="input-field" placeholder="อีเมล์">
            <input type="password" id="login-password" class="input-field" placeholder="รหัสผ่าน">
            <button class="btn" onclick="login()">เข้าสู่ระบบ</button>
            <button class="btn" onclick="showWelcome()">กลับไป</button>
        </div>

        <!-- Signup Screen -->
        <div id="signup-screen" class="hidden">
            <h1>สร้างบัญชีผู้ใช้</h1>
            <input type="email" id="signup-email" class="input-field" placeholder="อีเมล์">
            <input type="text" id="signup-name" class="input-field" placeholder="ชื่อ">
            <input type="password" id="signup-password" class="input-field" placeholder="รหัสผ่าน">
            <input type="password" id="signup-confirm-password" class="input-field" placeholder="ยืนยันรหัสผ่าน">
            <button class="btn" onclick="signup()">สมัครใช้งาน</button>
            <button class="btn" onclick="showWelcome()">กลับไป</button>
        </div>

        <!-- Main Screen -->
        <div id="main-screen" class="hidden">
            <h1>Turbo Calculation</h1>
            <button class="btn" onclick="showCategory()">เริ่ม</button>
        </div>

        <!-- Category Screen -->
        <div id="category-screen" class="hidden">
            <h1>เลือกประเภทโจทย์</h1>
            <button class="btn btn-green" onclick="showLevels('addition')">บวก</button>
            <button class="btn btn-pink" onclick="showLevels('subtraction')">ลบ</button>
            <button class="btn btn-yellow" onclick="showLevels('multiplication')">คูณ</button>
            <button class="btn btn-orange" onclick="showLevels('division')">หาร</button>
            <button class="btn" onclick="showWelcome()">กลับไป</button>
        </div>

        <!-- Level Screen -->
        <div id="level-screen" class="hidden">
            <h1>เลือกเลเวลโจทย์</h1>
            <button class="btn" onclick="showQuestion()">เลเวล 1</button>
            <button class="btn" onclick="showQuestion()">เลเวล 2</button>
            <button class="btn" onclick="showQuestion()">เลเวล 3</button>
            <button class="btn" onclick="showCategory()">กลับไป</button>
        </div>

        <!-- Question Screen -->
        <div id="question-screen" class="hidden">
            <h1>โจทย์</h1>
            <div id="question">6 ÷ 1 = ?</div>
            <input type="text" id="answer" class="input-field" placeholder="คำตอบ">
            <button class="btn" onclick="checkAnswer()">ส่งคำตอบ</button>
            <button class="btn" onclick="showLevels()">กลับไป</button>
        </div>

        <!-- Result Screen -->
        <div id="result-screen" class="hidden">
            <h1 id="result-message"></h1>
            <button class="btn" onclick="showQuestion()">ทำอีกครั้ง</button>
            <button class="btn" onclick="showCategory()">กลับไป</button>
        </div>

        <!-- Final Screen -->
        <div id="final-screen" class="hidden">
            <h1>คุณทำจำนวนโจทย์ครบแล้ว</h1>
            <p>คะแนนทั้งหมดที่สะสมได้: <span id="final-score">10</span></p>
            <button class="btn" onclick="showWelcome()">กลับไป</button>
        </div>
    </div>

    <script>
        function showWelcome() {
            hideAllScreens();
            document.getElementById('welcome-screen').classList.remove('hidden');
        }

        function showLogin() {
            hideAllScreens();
            document.getElementById('login-screen').classList.remove('hidden');
        }

        function showSignup() {
            hideAllScreens();
            document.getElementById('signup-screen').classList.remove('hidden');
        }

        function showMain() {
            hideAllScreens();
            document.getElementById('main-screen').classList.remove('hidden');
        }

        function showCategory() {
            hideAllScreens();
            document.getElementById('category-screen').classList.remove('hidden');
        }

        function showLevels() {
            hideAllScreens();
            document.getElementById('level-screen').classList.remove('hidden');
        }

        function showQuestion() {
            hideAllScreens();
            document.getElementById('question-screen').classList.remove('hidden');
        }

        function showResult(isCorrect) {
            hideAllScreens();
            let resultMessage = document.getElementById('result-message');
            if (isCorrect) {
                resultMessage.innerText = 'คำตอบของคุณถูกต้อง';
                resultMessage.classList.add('correct');
            } else {
                resultMessage.innerText = 'คำตอบของคุณผิด';
                resultMessage.classList.add('incorrect');
            }
            document.getElementById('result-screen').classList.remove('hidden');
        }

        function showFinal() {
            hideAllScreens();
            document.getElementById('final-screen').classList.remove('hidden');
        }

        function hideAllScreens() {
            let screens = document.querySelectorAll('.container > div');
            screens.forEach(screen => screen.classList.add('hidden'));
        }

        function login() {
            // Implement login functionality
            showMain();
        }

        function signup() {
            // Implement signup functionality
            showMain();
        }

        function checkAnswer() {
            // Implement answer checking functionality
            let answer = document.getElementById('answer').value;
            if (answer == '6') {
                showResult(true);
            } else {
                showResult(false);
            }
        }

        showWelcome();
    </script>
</body>
</html>
