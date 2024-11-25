<?php

namespace Product\Config;


final class GlobalHandler
{

    public static function displayError(int $error_level, string $error_message, string $error_file, int $error_line): void
    {

        $error_type = self::getErrorType($error_level);
        $output = "
        <p>
            <strong>{$error_type}</strong> {$error_message}
        </p>\n";


        $output .= "
            <p>
            Error on line: {$error_line} in file {$error_file}
            </p>\n
            ";

        echo $output;

        if ($error_level === E_ERROR) {
            exit();
        }
    }

    public static function handlingException(\Throwable $exception): void
    {

        $output = "
        <p><strong>Uncaught Exception:</strong> " . get_class($exception) . "</p>\n";
        $output .= "<p>Message: {$exception->getMessage()}</p>\n";


        $output .= "
            <p>
                In file {$exception->getFile()} on line {$exception->getLine()}
            </p>\n";

        echo $output;
        exit();
    }

    private static function getErrorType(int $error_level): string
    {
        return match ($error_level) {
            E_ERROR => 'ERROR',
            E_WARNING => 'WARNING',
            E_NOTICE => 'NOTICE',
            default => 'UNKNOWN ERROR TYPE',
        };
    }
}
