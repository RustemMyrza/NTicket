document.addEventListener('DOMContentLoaded', function () {
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    const successMessage = document.getElementById('cartModal').getAttribute('data-bs-success-message');

    if (successMessage === 'true') {
        cartModal.show(); // Показываем модальное окно
    }

    // Добавляем обработчик события для скрытия фонового затемнения после закрытия модального окна
    cartModal.addEventListener('hidden.bs.modal', function () {
        document.body.classList.remove('modal-open'); // Удаляем класс 'modal-open' из body
        const modalBackdrop = document.querySelector('.modal-backdrop');
        if (modalBackdrop) {
            modalBackdrop.remove(); // Удаляем фоновое затемнение (modal-backdrop), если оно есть
        }
    });
});
