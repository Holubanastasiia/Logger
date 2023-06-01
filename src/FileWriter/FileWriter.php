<?php

namespace Anastasiia\Logger\FileWriter;

use Anastasiia\Logger\Interfaces\FormatterInterface\FormatterInterface;
use Anastasiia\Logger\Interfaces\WriterInterface\WriterInterface;

class FileWriter implements WriterInterface
{
    private string $filename;
    public $formatter;

    public function __construct($filename, FormatterInterface $formatter) {
        $this->filename = $filename;
        $this->formatter = $formatter;
    }

    public function write($message)
    {
        file_put_contents($this->filename, $message, FILE_APPEND);
    }
}