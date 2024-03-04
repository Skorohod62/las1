// $(function(){
//   $('body').click(function(e){
//     alert(e.pageX + " " + e.pageY)
//   })
  $(function(){
    $('.button').click(function(e){
        let answer = confirm('Вы хотите отправить данные?')
        if(!answer){
            e.preventDefault();
        }
      let mail = $('input').val()
      console.log(`Вы отправили ${mail}`)
    })
})
function sayHi(){
  alert('Hello World')
}
setTimeout(sayHi,2000)
// })
// события мыши
document.addEventListener("mouseup",
                ()=>console.log("mouseup"));
document.addEventListener("click",
                ()=>console.log("click"));
document.addEventListener("mousedown",
                ()=>console.log("mousedown"));
// Событие клавиатуры
document.querySelector('input').addEventListener('keydown', function(e) {
    console.log(e.keyCode);
}); 

// Drag&DROP события
function dragstart_handler(ev) {
    ev.dataTransfer.setData("text/plain", ev.target.id);
  }
  window.addEventListener("DOMContentLoaded", () => {
    const element = document.getElementById("p1");
    element.addEventListener("dragstart", dragstart_handler);
  });
// событие прокрутки
  const element = document.querySelector("div#scroll-box");
  const output = document.querySelector("p#output");
  
  element.addEventListener("scroll", (event) => {
    output.innerHTML = "прокрутка запущена!";
    setTimeout(() => {
      output.innerHTML = "Ожидание прокрутки";
    }, 1000);
  });
