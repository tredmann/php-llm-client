<?php

namespace LLM\LLMs;

use LLM\DTOs\Response;
use LLM\Interfaces\ClientInterface;
use OpenAI\Client;

readonly class OpenAI implements ClientInterface
{
    public function __construct(private Client $client)
    {
    }

    public function getModels(): array
    {
        // TODO: Implement getModels() method.
    }

    public function completion(string $model, string $prompt, float $temperature): Response
    {
        $response = $this->client->completions()->create([
            'model' => $model,
            'prompt' => $prompt,
            'temperature' => $temperature
        ]);

        return new Response($response->choices[0]->text);
    }
}
