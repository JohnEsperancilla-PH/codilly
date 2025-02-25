<?php
require '../logic/questions.php';

$level = $_POST['level'] ?? 1;
$answer = $_POST['answer'] ?? '';

$question = getQuestion($level);

if ($question && $answer === htmlspecialchars_decode($question['answer'])) {
    echo ($level >= count($question)) ? 'end' : 'correct';
} else {
    echo 'wrong';
}
?>
