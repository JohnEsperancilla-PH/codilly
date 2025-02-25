<?php
require '../logic/questions.php';

$level = $_GET['level'] ?? 1;
$question = getQuestion($level);
$showMenu = !isset($_GET['level']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codilly - Programming Logic Game</title>
    <link rel="stylesheet" href="/assets/styles.css">
    <script src="/assets/script.js" defer></script>
</head>
<body>
    <?php if ($showMenu): ?>
    <div class="main-menu" id="mainMenu">
        <h1>Codilly</h1>
        <button onclick="startGame()">Start Game</button>
    </div>
    <?php endif; ?>

    <div class="game-container" id="gameContainer" style="<?= $showMenu ? 'display:none;' : 'display:block;'; ?>">
        <h1>Level <?= $level ?></h1>
        <p><?= htmlspecialchars($question['text']) ?></p>
        <div class="drop-zone" id="dropZone"></div>
        <div class="options">
            <?php foreach ($question['options'] as $option): ?>
                <div class="draggable" draggable="true" data-value="<?= htmlspecialchars($option) ?>">
                    <?= htmlspecialchars($option) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
