document.querySelectorAll('.draggable').forEach(item => {
    item.addEventListener('dragstart', event => {
        event.dataTransfer.setData('text', event.target.getAttribute('data-value'));
    });
});
document.getElementById('dropZone').addEventListener('dragover', event => {
    event.preventDefault();
});
document.getElementById('dropZone').addEventListener('drop', event => {
    event.preventDefault();
    const answer = event.dataTransfer.getData('text');
    event.target.textContent = answer;
    setTimeout(() => checkAnswer(answer), 1000);
});
function checkAnswer(answer) {
    const level = new URLSearchParams(window.location.search).get('level') || 1;
    fetch('logic/check_answer.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `answer=${encodeURIComponent(answer)}&level=${level}`
    }).then(response => response.text()).then(data => {
        if (data.trim() === 'correct') {
            document.getElementById('dropZone').classList.add('correct');
            setTimeout(() => {
                window.location.href = `index.php?level=${parseInt(level) + 1}`;
            }, 2000);
        } else if (data.trim() === 'end') {
            window.location.href = 'loading.php';
        } else {
            document.getElementById('dropZone').classList.add('wrong');
            setTimeout(() => {
                document.getElementById('dropZone').classList.remove('wrong');
            }, 1000);
        }
    }).catch(error => console.error('Error:', error));
}
function startGame() {
    document.getElementById('mainMenu').style.display = 'none';
    document.getElementById('gameContainer').style.display = 'block';
}
function restartGame() {
    window.location.href = 'index.php?level=1';
}
