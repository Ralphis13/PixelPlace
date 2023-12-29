document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(e) {
        // If the image was clicked and the modal window is not shown.
        if (e.target.tagName === 'IMG' && document.getElementById('imageModal').style.display !== 'flex') {
            showImageModal(e.target.src);
        } else {
            hideImageModal();
        }
    });

    // Function for displaying a modal window.
    function showImageModal(src) {
        var modal = document.getElementById('imageModal');
        var modalImg = modal.querySelector('img');
        modalImg.src = src;
        modal.style.display = 'flex';
    }

    // Function for closing the modal window.
    function hideImageModal() {
        var modal = document.getElementById('imageModal');
        modal.style.display = 'none';
    }
});
