<?php

require __DIR__ . '/../vendor/autoload.php';

use LLM\Enums\Type;
use LLM\LLM;

// make sure the environment is loaded
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$llm = LLM::make(Type::Ollama);

echo $llm->completion(
    model: 'gemma2:latest',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);
