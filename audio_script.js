const audio = document.getElementById('audio');
const playPauseButton = document.querySelector('.play-pause-button');
const progressBar = document.querySelector('.progress-bar');

let isPlaying = false;

playPauseButton.addEventListener('click', () => {
    if (isPlaying) {
        audio.pause();
    } else {
        audio.play();
    }
    isPlaying = !isPlaying;
    updatePlayPauseButton();
});

audio.addEventListener('timeupdate', () => {
    const progress = (audio.currentTime / audio.duration) * 100;
    progressBar.value = progress;
});

progressBar.addEventListener('input', () => {
    const seekTime = (progressBar.value / 100) * audio.duration;
    audio.currentTime = seekTime;
});

function updatePlayPauseButton() {
    if (isPlaying) {
        playPauseButton.textContent = 'Pause';
    } else {
        playPauseButton.textContent = 'Play';
    }
}
