"use strict";

const modifyBtns = document.querySelectorAll("#modify-button");
const deleteBtns = document.querySelectorAll("#delete-button");
const modal = document.getElementById("update-modal");
const closeModalBtns = document.querySelectorAll(".cancel-update"); // Use class selector

modifyBtns.forEach((btn) => {
  btn.addEventListener("click", async () => {
    const mediaId = btn.getAttribute("data-id");
    console.log(mediaId);
    const response = await fetch("./inc/update-form.php?media_id=" + mediaId);
    const html = await response.text();
    modal.innerHTML = ""; // Clear previous content
    modal.insertAdjacentHTML("beforeend", html);
    modal.showModal();
  });
});

closeModalBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    modal.close();
  });
});
