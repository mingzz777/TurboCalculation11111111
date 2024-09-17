# TurboCalculation
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Practice</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Math Practice</h1>
    </header>
    <main>
        <label for="topics">Choose a topic:</label>
        <select id="topics">
            <option value="addition">Addition</option>
            <option value="subtraction">Subtraction</option>
        </select>

        <label for="difficulty">Choose difficulty:</label>
        <select id="difficulty">
            <option value="easy">Easy</option>
            <option value="hard">Hard</option>
        </select>

        <button onclick="generateProblem()">Generate Problem</button>

        <div id="problem"></div>
    </main>
    <script src="scripts.js"></script>
</body>
</html>
