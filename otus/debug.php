<?php

//$currentDateTime = date('Y-m-d H:i:s');

//$logFile = __DIR__ . '/debug.log';

//$logEntry = $currentDateTime . PHP_EOL;

//file_put_contents($logFile, $logEntry, FILE_APPEND);


require_once __DIR__ . '/CustomLogger.php';

$logger = new CustomLogger(__DIR__ . '/debug.log');

$logger->log("Тестовая запись через логгер");

echo "Дата и время записаны в лог через логгер.";
