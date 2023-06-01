<?php
namespace Anastasiia\Logger;

use Anastasiia\Logger\Interfaces\WriterInterface\WriterInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    protected WriterInterface $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $formattedMessage = $this->writer->formatter->format($level, $message, $context);
        $this->writer->write($formattedMessage);
    }

}