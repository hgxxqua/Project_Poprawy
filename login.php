<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_poprawy"; // Имя базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка наличия данных в POST-запросе
if (isset($_POST['emailin']) && isset($_POST['passwordin'])) {
    $emailin = $_POST['emailin'];
    $passin = $_POST['passwordin'];

    // Запрос на получение данных пользователя по email
    $query = "SELECT username, email, password FROM users WHERE email = '$emailin'";
    $result = $conn->query($query);

    // Если пользователь найден
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_email = $row['email'];
        $stored_pass = $row['password'];
        $username = $row['username'];

        // Сравнение введенного пароля с паролем в базе данных
        if ($emailin == $stored_email && $passin == $stored_pass) {
            // Перенаправление на страницу welcome.html с передачей username
            header("Location: main.html?username=" . urlencode($username));
            exit(); // Останавливаем выполнение скрипта
        } else {
            echo 'Ошибка: Неверный пароль';
        }
    } else {
        echo 'Ошибка: Пользователь не найден';
    }

    // Закрытие соединения
    $conn->close();
}
?>
