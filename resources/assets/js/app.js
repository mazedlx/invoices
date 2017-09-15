
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

document.querySelector(`[data-rel="add-line-button"]`).addEventListener('click', function () {
    const container = document.querySelector(`[class="lines-container"]`);
    const line = document.querySelector(`[data-rel="line"]`).cloneNode(true);
    container.appendChild(line);
});
