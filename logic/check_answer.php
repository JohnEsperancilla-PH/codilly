<?php
require 'questions.php';

$level = $_POST['level'] ?? 1;
$answer = $_POST['answer'] ?? '';

$question = getQuestion($level);

if ($question && trim($answer) === trim($question['answer'])) {
    if (!getQuestion($level + 1)) {
        echo 'end'; // No more levels, return end signal
    } else {
        echo 'correct'; // Correct answer, proceed to next level
    }
} else {
    echo 'wrong'; // Incorrect answer
}
?>