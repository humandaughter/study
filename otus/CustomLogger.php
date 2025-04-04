<?php

class CustomLogger
{
    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function log($message)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $logEntry = "[{$currentDateTime}] OTUS: {$message}" . PHP_EOL;
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }
}
//$logger = new CustomLogger(__DIR__ . '/debug.log');
//$logger->log('Тестовые логи');
