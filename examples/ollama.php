<?php

require __DIR__ . '/../vendor/autoload.php';

use LLM\LLM\Ollama;
use Ollama\Client\OllamaClient;

$ollama = new Ollama(client: new OllamaClient());

$response = $ollama->completion(
    model: 'gemma2:latest',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);

echo $response;
