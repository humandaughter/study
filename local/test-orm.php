<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Loader;
use Otus\Orm\UsersTable;

Loader::includeModule('otus.orm');

var_dump(Loader::includeModule('otus.orm')); // должно быть true

$result = UsersTable::getList([
    'select' => ['ID', 'LOGIN', 'EMAIL'],
    'limit' => 5,
]);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>LOGIN</th><th>EMAIL</th></tr>";

while ($user = $result->fetch()) {
    echo "<tr>";
    echo "<td>{$user['ID']}</td>";
    echo "<td>{$user['LOGIN']}</td>";
    echo "<td>{$user['EMAIL']}</td>";
    echo "</tr>";
}

echo "</table>";

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
