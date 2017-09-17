
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

const lineButton = document.querySelector(`[data-rel="add-line-button"]`)
const closeButton = document.querySelector(`[class="modal-close is-large"]`);
const flashModal = document.querySelector(`[class="modal is-active"]`);

if (lineButton) {
    lineButton.addEventListener('click', function () {
        const container = document.querySelector(`[id="lines-container"]`);
        const line = document.querySelector(`[data-rel="line"]`).cloneNode(true);
        container.appendChild(line);
    });
}

if (closeButton) {
    closeButton.addEventListener('click', function () {
        flashModal.classList.remove('is-active');
    });
    window.addEventListener('keydown', function (e) {
        flashModal.classList.remove('is-active');
    });
}
