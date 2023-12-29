window.onload = function() {
    fetch('blog.txt')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok' + response.statusText);
            }
            return response.text();
        })
        .then(text => {
            document.getElementById('content').innerText = text;
        })
        .catch(error => {
            console.error('Fetch error: ', error);
            document.getElementById('content').innerText = 'Failed to load content.';
        });
};
function applyStyles() {
    let textInput = document.getElementById('textinput').value;
    let preview = document.getElementById('preview');
    let styleSelect = document.getElementById('styleSelect');
    let fontSizeInput = document.getElementById('fontSizeInput').value;
    
    preview.style.fontSize = fontSizeInput + "px";
    preview.innerHTML = textInput;
    
    // Reset styles
    preview.className = "";
    
    for (let option of styleSelect.options) {
        if (option.selected) {
            preview.classList.add(option.value);
        }
    }
}
document.addEventListener('DOMContentLoaded', (event) => {
    // Function to control all audio players on the page
    const players = document.querySelectorAll('audio');
    players.forEach(player => {
        player.onplay = () => {
            players.forEach(otherPlayer => {
                if (otherPlayer !== player) {
                    otherPlayer.pause();
                }
            });
        };
    });
});
