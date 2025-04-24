<?php

use \Bitrix\Main\ModuleManager;

class otus_orm extends CModule
{
    public function __construct()
    {
        $this->MODULE_ID = 'otus.orm';
        $this->MODULE_NAME = 'OTUS ORM Module';
        $this->MODULE_DESCRIPTION = 'Пример использования ORM';
        $this->MODULE_VERSION = '1.0.0';
        $this->MODULE_VERSION_DATE = '2024-04-01 00:00:00';
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
