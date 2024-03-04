document.getElementById('zakaz').addEventListener("click", function () {
    let popupContainer = document.querySelector(".popup-container");


    popupContainer.style.display='block';
});
let closeBtn = document.querySelector(".close-btn");
closeBtn.addEventListener("click", function () {
    let popupContainer = document.querySelector(".popup-container");


    popupContainer.style.display='none';
});
document.addEventListener("DOMContentLoaded", function () {
    var printButton = document.getElementById("pehat");
    printButton.addEventListener("click", function () {
        window.print();
    });
});
