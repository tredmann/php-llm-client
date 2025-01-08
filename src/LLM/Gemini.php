<?php

namespace LLM\LLM;

use Gemini\Client;
use Gemini\Data\GenerationConfig;
use LLM\Interfaces\LLMInterface;

readonly class Gemini implements LLMInterface
{
    public function __construct(private Client $client)
    {
    }

    public function completion(string $model, string $prompt, float $temperature): string
    {
        $response = $this->client
            ->generativeModel(model: $model)
            ->withGenerationConfig(new GenerationConfig(temperature: $temperature))
            ->generateContent($prompt);

        return $response->text();
    }
}
