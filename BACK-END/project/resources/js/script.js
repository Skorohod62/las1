// Получаем ссылки на элементы кнопки и модального окна
let openModalBtn = document.getElementById("openFilterModal");
let modal = document.getElementById("filterModal");
let clos=document.getElementById('clossi');
let prace=document.getElementById('menu-prace');
// При нажатии на кнопку открываем модальное окно
openModalBtn.onclick = function() {
    modal.style.display = "block";
}

// Закрываем модальное окно при нажатии на крестик или вне окна
let closeModalSpan = document.getElementById("filterModal-close");
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
closeModalSpan.onclick = function() {
    modal.style.display = "none";
}

const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
let priceGap = 2;

priceInput.forEach(input => {
    input.addEventListener("input", e => {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);

        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if ((maxVal - minVal) < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});

clos.onclick=function (){

    if (prace.style.display==='block'){prace.style.display='none';}else{
        prace.style.display='block';
    }
}

document.getElementById('openRegistrationModalBtn').addEventListener('click', function() {
    document.getElementById('registrationModal').style.display = 'block';
});

document.getElementById('openLoginModalBtn').addEventListener('click', function() {
    document.getElementById('loginModal').style.display = 'block';
    document.getElementById('registrationModal').style.display = 'none';
});


document.getElementById('zakrt').addEventListener('click',function (){
    document.getElementById('registrationModal').style.display = 'none';

})
document.getElementById('zakrt2').addEventListener('click',function (){
    document.getElementById('loginModal').style.display = 'none';

})

