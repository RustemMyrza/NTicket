document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#datePicker", {
        inline: true,
        dateFormat: "Y-m-d",
        onDayCreate: function(dObj, dStr, fp, dayElem) {
            // Пример добавления надписи к определенной дате
            var date = dayElem.dateObj;
            if (date.getDate() === 15 && date.getMonth() === 4) { // 15 мая
                dayElem.innerHTML += "<span class='custom-note'>Праздник</span>";
                dayElem.style.backgroundColor = "lightgreen"; // Выделение даты цветом
            }
        }
    });
});