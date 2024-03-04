document.getElementById('add').addEventListener('click', function () {
    let kol = parseInt(document.getElementById('kolvo').value, 10);
    let kol_sklad = parseInt(document.getElementById('kolvo-sklad').innerText, 10);

// Если kol не является положительным числом, устанавливаем его в 1
    kol = !isNaN(kol) && kol > 0 ? kol : 1;

    if (!isNaN(kol) && !isNaN(kol_sklad)) {
        if (kol <= kol_sklad) {
            alert('Произошло успешно');
        } else {
            alert('Превышено число на складе');
        }
    } else {
        alert('Ошибка при преобразовании значений в числа');
    }



})
function updatePrice() {
    let price = parseFloat(document.getElementById('price').innerText); // Преобразуем строку в число
    let kol = document.getElementById('kolvo'); // Получаем ссылку на элемент input

    // Проверяем, если количество введено корректно и является положительным числом
    if (!isNaN(price) && kol && !isNaN(parseInt(kol.value)) && parseInt(kol.value) > 0) {
        let quantity = parseInt(kol.value);

        // Устанавливаем новую цену
        let newPrice = quantity * price; // Умножаем цену на количество
        document.getElementById('ob-summa').textContent = newPrice.toFixed(2) + '$'; // Обновляем общую сумму с двумя знаками после запятой
    } else {
        // Если количество некорректно или отрицательно, устанавливаем общую сумму в 0 или другое значение по вашему выбору
        document.getElementById('ob-summa').textContent = '0.00$';
    }
}

// Вызываем функцию при загрузке страницы
document.addEventListener('DOMContentLoaded', updatePrice);

// Слушаем событие input на элементе количества
document.getElementById('kolvo').addEventListener('input', updatePrice);
