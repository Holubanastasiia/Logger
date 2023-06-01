<?php

namespace Anastasiia\Logger\Interfaces\FormatterInterface;

interface FormatterInterface
{
public function format($level, $message, array $context = array());
}