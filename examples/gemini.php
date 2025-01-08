<?php

require __DIR__ . '/../vendor/autoload.php';

use LLM\LLM\Gemini;
use Gemini as GeminiClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$gemini = new Gemini(client: GeminiClient::client(apiKey: $_ENV["GEMINI_API_KEY"]));

$response = $gemini->completion(
    model: 'models/gemini-pro',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);

echo $response;
