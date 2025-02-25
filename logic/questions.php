<?php
function getQuestion($level) {
    $questions = [
        1 => [
            'text' => 'What is the correct syntax for printing in PHP?',
            'answer' => 'echo',
            'options' => ['echo', 'print()', 'console.log', 'printf']
        ],
        2 => [
            'text' => 'Which symbol is used to denote a variable in PHP?',
            'answer' => '$',
            'options' => ['$', '#', '@', '&']
        ],
        3 => [
            'text' => 'What is the correct way to start a PHP script?',
            'answer' => '<?php',
            'options' => ['&lt;?php', '&lt;script&gt;', '&lt;php&gt;', '&lt;?']
        ],
        4 => [
            'text' => 'Which function is used to get the length of a string in PHP?',
            'answer' => 'strlen()',
            'options' => ['strlen()', 'length()', 'count()', 'size()']
        ],
        5 => [
            'text' => 'Which operator is used for concatenation in PHP?',
            'answer' => '.',
            'options' => ['.', '+', ',', '&']
        ],
    ];
    return $questions[$level] ?? null;
}
?>
