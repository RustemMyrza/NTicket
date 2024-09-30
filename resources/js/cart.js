document.addEventListener('DOMContentLoaded', function () {
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    const successMessage = document.getElementById('cartModal').getAttribute('data-success-message');

    if (successMessage) {
        cartModal.show(); // Показываем модальное окно
    }
});
