<?php

require __DIR__ . '/../vendor/autoload.php';

use LLM\LLM\OpenAI;
use OpenAI as OpenAIClient;

$openai = new OpenAI(client: OpenAIClient::client(apiKey: $_ENV['OPEN_AI_API_KEY']));

$response = $openai->completion(
    model: 'gpt-4o-mini',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);

echo $response;
