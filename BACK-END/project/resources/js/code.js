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

let a = document.querySelector('.Shop');

function lel() { alert("Эта функция пока не доступна") }
a.addEventListener("click", lel);
let b = document.getElementById('bthsum');
let c = document.getElementById('bthmin');

function slader() {
    document.querySelector('.text-otz-text3').innerHTML = 'It was a pleasure to cooperate with you, it s a very, very important experienc for us, we love you especially your mom.';

    document.querySelector('.text-otz-text4').innerHTML = 'Scorohod.V';
    document.querySelector('.img-otz1').src = 'img/8.png';
}
c.addEventListener("click", slader)

function slader2() {
    document.querySelector('.text-otz-text3').innerHTML = 'We have perfected our formulas over time, based on your feedback. Check out hundreds of reviews on our website.We cant wait until you are a part of our Good4Me Family.';

    document.querySelector('.text-otz-text4').innerHTML = '_Chloe H.';
    document.querySelector('.img-otz1').src = 'img/MaskGroup.png';
}
b.addEventListener("click", slader2);






//#cpc-click-button#codepenchallenge
document.querySelector('.singkapvo-gesionalem').onmousemove = function(e) {
    var x = e.pageX - e.target.offsetLeft;
    var y = e.pageY - e.target.offsetTop;
    e.target.style.setProperty('--x', x + 'px');
    e.target.style.setProperty('--y', y + 'px');
};

// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.031 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}


window.initMap = initMap;


function myFunction() {
    const button = document.querySelector('.containerrr');
    const list = document.querySelector('.header-container-two');
    button.addEventListener('click', function(e) {
        button.classList.toggle("change");
        document.body.classList.toggle('lock');
        list.classList.toggle("active");
    });
}
myFunction()



