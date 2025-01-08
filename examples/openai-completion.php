<?php

require __DIR__ . '/../vendor/autoload.php';

use LLM\LLM\OpenAICompletion;
use OpenAI as OpenAIClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


$openai = new OpenAICompletion(client: OpenAIClient::client(apiKey: $_ENV['OPEN_AI_API_KEY']));

$response = $openai->completion(
    model: 'gpt-3.5-turbo-instruct',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);

echo $response;
