<?php

namespace Otus\Orm;

use Bitrix\Main\Entity\DataManager;

class UsersTable extends DataManager
{
    public static function getTableName()
    {
        return 'b_user';
    }

    public static function getMap()
    {
        return [
            'ID' => [
                'data_type' => 'integer',
                'primary' => true
            ],
            'LOGIN' => [
                'data_type' => 'string'
            ],
            'EMAIL' => [
                'data_type' => 'string'
            ],
        ];
    }
}
