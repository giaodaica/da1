document.getElementById('login-button').addEventListener('click', function() {
    const welcomeMessage = document.getElementById('welcome-message');

    // Hiện thông điệp và bắt đầu hiệu ứng
    welcomeMessage.classList.remove('hidden');
    welcomeMessage.style.top = '20px'; // Di chuyển xuống màn hình
    welcomeMessage.style.opacity = '1'; // Đặt độ trong suốt về 100%

    // Đợi một lúc trước khi làm mờ và ẩn đi
    setTimeout(() => {
        welcomeMessage.style.opacity = '0'; // Làm mờ thông điệp
    }, 2000); // Thời gian chờ trước khi bắt đầu làm mờ

    // Đợi cho đến khi mờ hoàn toàn để ẩn thông điệp
    setTimeout(() => {
        welcomeMessage.classList.add('hidden');
        welcomeMessage.style.top = '-100px'; // Trở về vị trí ban đầu
    }, 4000); // Thời gian chờ sau khi làm mờ hoàn toàn
});
