<?php

use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(
    'otus.orm',
    [
        'Otus\Orm\UsersTable' => 'lib/users.php',
    ]
);
