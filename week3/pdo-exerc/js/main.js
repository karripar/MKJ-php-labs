'use strict';

const modifyBtns = document.querySelectorAll('#modify-button');
const deleteBtns = document.querySelectorAll('#delete-button');
const modal = document.getElementById('update-modal');

modifyBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const mediaId = btn.getAttribute('data-id');
        console.log(mediaId);

    }
    );
});
