<?php

namespace Anastasiia\Logger\Formatter;

use Anastasiia\Logger\Interfaces\FormatterInterface\FormatterInterface;

class Formatter implements FormatterInterface
{
    public function format($level, $message, array $context = []): string
    {
        $formattedMessage = sprintf(
            "[%s] [%s] [%s] [%s]\n",
            strtoupper($level),
            date('Y-m-d H:i:s'),
            $message,
            $this->formatContext($context)
        );

        return $formattedMessage;
    }

    private function formatContext(array $context)
    {
        $formattedContext = '';
        foreach ($context as $key => $value) {
            $formattedContext .= sprintf("%s:%s, ", $key, $value);
        }

        return rtrim($formattedContext, ', ');
    }
}