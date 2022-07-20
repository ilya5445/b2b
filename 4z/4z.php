<?php

/* 
* Конфигурацию базы данных требуется вынести в отдельный файл
*/
$DB_HOST = '127.0.0.1'; // В качестве хоста требуется использовать прямой IP или localhost, алиасы не не всегда настроены 
$DB_USER = 'root'; // Лучше не использовать рут доступ а создать отдельного пользователя
$DB_PASSWORD = '123123';
$DB_NAME = 'database';


// При использовании данных $user_id напрямую в запросе может быть вставлена SQL инъекция т.к. нет проверок валидности.

/**
 * @param string|boolean $ids
 * @param PDO $db
 * @return void
 */
function loadUsersData(string|bool $ids, PDO $db) {
    
    $result = [];

    if (!$ids) return $result;

    $ids = explode(',', $ids);
    
    // Проверка на пустые значения
    if (empty($ids)) return $result;

    // преобразуем в числа
    foreach ($ids as &$_id) $_id = intval($_id);

    // преобразем в строку для отправки в запросе
    $str_ids = "'".implode("','", $ids)."'";
    
    // В запросе используется 2 поля требуется указать конкретно. Влияет на скорость выполнения запроса
    $smtp = $db->prepare("SELECT `id`, `name` FROM `users` WHERE `id` IN (?)");
    $smtp->execute([$str_ids]);

    while ($user = $smtp->fetchObject()) 
        $result[intval($user->id)] = $user->name;

    return $result;
}

// Вынесем рендер в отдельную функцию для удобства использования
function render($data) {

    if (!empty($data)) foreach ($data as $user_id => $name) {
        echo <<<HTML
    <a href="show_user.php?id=$user_id">$name</a>
HTML;
    } else {
        echo <<<HTML
    <span>Данные не найдены</span>
HTML;
    }
}


// Mysqli не безопасно в использовании, рекомендуется использовать PDO
// Чтобы при неудачном подключении данные не показались пользователю на экране занесем в конструкцию try catch
try {

    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

    // Проверка на существование параметра (Чтобы не было Nitice)
    $user_ids = isset($_GET['user_ids']) && $_GET['user_ids'] ? $_GET['user_ids'] : false;
    $data = loadUsersData($user_ids, $conn);
    render($data);

} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных";
    exit;
}
