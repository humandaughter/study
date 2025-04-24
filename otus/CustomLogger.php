<?php

use Bitrix\Main\Diag\FileLogger;
class CustomLogger extends FileLogger
{
    public function __construct($logFile)
    {
        parent::__construct([
            'file' => $logFile
        ]);
    }

    public function log($message, array $context = [])
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $customMessage = "[{$currentDateTime}] OTUS: {$message}";
        parent::log($customMessage, $context);
    }
}
