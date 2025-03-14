// Получаем элементы
const selectBox = document.getElementById('select-box');
const optionsList = document.querySelector('.options-list');
const options = document.querySelectorAll('.option');

// Открытие и закрытие списка при клике на поле
selectBox.addEventListener('click', () => {
    optionsList.style.display = optionsList.style.display === 'block' ? 'none' : 'block';
});

// Обработка выбора опции
options.forEach(option => {
    option.addEventListener('click', (e) => {
        selectBox.textContent = e.target.textContent; // Обновление текста в селекте
        optionsList.style.display = 'none'; // Закрытие списка после выбора
    });
});

// Закрытие списка при клике вне области
document.addEventListener('click', (e) => {
    if (!selectBox.contains(e.target)) {
        optionsList.style.display = 'none';
    }
});
