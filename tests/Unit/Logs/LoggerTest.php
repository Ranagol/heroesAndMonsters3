<?php

declare(strict_types=1);

namespace Tests\Unit\Logs;

use App\Logs\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testLog(): void
    {
        $logger = Logger::getInstance();
        $this->expectOutputString('<br>Test log entry<br>');
        $logger->log('Test log entry');

        $logFilePath = Logger::getPathForLogs();
        $this->assertFileExists($logFilePath);
        $logContents = file_get_contents($logFilePath);
        $this->assertStringContainsString('Test log entry', $logContents);
    }
}