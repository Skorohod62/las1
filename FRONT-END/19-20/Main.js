$(function(){
    $('.btn1').click(function(e){
      e.preventDefault();
      let selectValue = []
      let selectRadio = []
      $("input[type=checkbox]:checked").each(function(){
        selectValue.push($(this).val())
      })
      $("input[type=radio]:checked").each(function(){
        selectRadio.push($(this).val())
      })
      let text1 = $('.text1').val()
      let text2 = $('.text2').val()
      let password = $('.pas').val()
      let finalText = "Имя: " + text1 + "\n" +"Фамилия: " + text2 + "\n" +"Пароль: " + password + "\n" + "Выбраны чекбоксы: " + selectValue.join(',') + "\n" + "Выбран ответ: " + selectRadio.join(',') + "."
      let v = $('#select1 :selected').val()
      if(v==1){
        $('.textara').text(finalText + "\n" + 'Выбрано поле: 1.');
      }
      else if(v==2){
        $('.textara').text(finalText + "\n" + 'Выбрано поле: 2.');
      }
      else if(v==3){
        $('.textara').text(finalText + "\n" + 'Выбрано поле: 3.');
      }
      else if(v==4){
        $('.textara').text(finalText + "\n" + 'Выбрано поле: 4.');
      }
      else{
        $('.textara').text(finalText + "\n" + 'Значение не выбрано!');
      }
    })
    $(':reset').click(function(e){
      $('.textara').text(" ")
    })
})

