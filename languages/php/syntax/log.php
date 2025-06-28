<?php

/**
 * PHP Logging Utilities and Examples
 *
 * This file demonstrates various logging approaches in PHP including:
 * - Custom debug logging function
 * - Monolog library usage
 * - Different log levels and handlers
 * - Log formatting and processors
 */

declare(strict_types=1);

/**
 * Custom debug logging function
 *
 * Useful for debugging in non-local or distributed environments
 * Writes variable values to a specified log file
 *
 * @param mixed $data Log data to write
 * @param string $logPath Log file path (default: /var/log/)
 * @param string $logName Log file name (default: debug.log)
 * @param bool $includeTimestamp Whether to include timestamp (default: true)
 * @return bool Success status
 */
function super_debug(
    mixed $data,
    string $logPath = '/var/log/',
    string $logName = 'debug.log',
    bool $includeTimestamp = true
): bool {
    try {
        // Ensure log directory exists
        if (!is_dir($logPath)) {
            if (!mkdir($logPath, 0755, true)) {
                throw new RuntimeException("Cannot create log directory: {$logPath}");
            }
        }

        $fullPath = $logPath . $logName;
        $timestamp = $includeTimestamp ? '[' . date('Y-m-d H:i:s') . '] ' : '';
        $logData = $timestamp . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . PHP_EOL;

        return (bool) file_put_contents($fullPath, $logData, FILE_APPEND | LOCK_EX);
    } catch (Exception $e) {
        error_log("Super debug error: " . $e->getMessage());
        return false;
    }
}

/**
 * Simple file download function
 *
 * @param string $fileUrl URL of file to download
 * @param string $filename Custom filename (optional)
 * @return bool Success status
 */
function downloadFile(string $fileUrl, string $filename = ''): bool {
    try {
        if (!filter_var($fileUrl, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid URL: {$fileUrl}");
        }

        $filename = $filename ?: basename($fileUrl);

        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: Binary');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Read and output file
        $fileContent = file_get_contents($fileUrl);
        if ($fileContent === false) {
            throw new RuntimeException("Cannot read file from URL: {$fileUrl}");
        }

        echo $fileContent;
        return true;
    } catch (Exception $e) {
        error_log("Download error: " . $e->getMessage());
        return false;
    }
}

/**
 * Advanced logging with Monolog
 *
 * Demonstrates professional logging setup with multiple handlers,
 * formatters, and processors
 *
 * @return object Logger instance or null if Monolog not available
 */
function setupAdvancedLogging() {
    // Check if Monolog is available
    if (!class_exists('Monolog\Logger')) {
        return null;
    }

    try {
        // Import Monolog classes
        require_once __DIR__ . '/../vendor/autoload.php';

        // Create logger instance
        $logger = new \Monolog\Logger('application');

        // Create handlers
        $streamHandler = new \Monolog\Handler\StreamHandler(
            __DIR__ . '/runtime/logger/app.log',
            \Monolog\Logger::DEBUG
        );
        $fireHandler = new \Monolog\Handler\FirePHPHandler();

        // Configure formatter
        $dateFormat = "Y-m-d H:i:s";
        $outputFormat = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
        $formatter = new \Monolog\Formatter\LineFormatter($outputFormat, $dateFormat, true, true);

        // Apply formatter to stream handler
        $streamHandler->setFormatter($formatter);

        // Add handlers to logger
        $logger->pushHandler($streamHandler);
        $logger->pushHandler($fireHandler);

        // Add processors for additional context
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushProcessor(new \Monolog\Processor\MemoryPeakUsageProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['server'] = $_SERVER['SERVER_NAME'] ?? 'unknown';
            $record['extra']['ip'] = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            return $record;
        });

        return $logger;
    } catch (Exception $e) {
        error_log("Monolog setup error: " . $e->getMessage());
        return null;
    }
}

// Example usage and demonstration
if (php_sapi_name() === 'cli' || isset($_GET['demo'])) {
    echo "=== PHP Logging Demo ===\n";

    // Test custom debug function
    echo "1. Testing custom debug function...\n";
    $testData = [
        'name' => 'henry',
        'time' => time(),
        'environment' => 'development'
    ];

    $debugResult = super_debug($testData, './logs/', 'demo.log');
    echo $debugResult ? "✓ Debug log written successfully\n" : "✗ Debug log failed\n";

    // Test advanced logging (if Monolog is available)
    echo "\n2. Testing advanced logging...\n";
    $logger = setupAdvancedLogging();

    if ($logger !== null) {
        // Log different levels
        $logger->info('Application started', ['version' => '1.0.0']);
        $logger->warning('Deprecated feature used', ['feature' => 'old_api']);
        $logger->error('Database connection failed', ['db' => 'mysql']);
        $logger->debug('Processing user request', ['user_id' => 123]);

        echo "✓ Advanced logging completed\n";
    } else {
        echo "✗ Advanced logging failed: Monolog not available\n";
        echo "  Install Monolog: composer require monolog/monolog\n";
    }

    // Test file download (commented out to avoid actual download)
    echo "\n3. File download function available (commented out for demo)\n";
    // downloadFile('https://example.com/file.jpg', 'downloaded_file.jpg');

    echo "\n=== Demo completed ===\n";
}
