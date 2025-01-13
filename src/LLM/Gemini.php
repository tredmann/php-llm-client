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

    /**
     * @todo: The used client in the current version doesn't support $format
     *
     * @param string      $model
     * @param string      $prompt
     * @param float       $temperature
     * @param string|null $format
     * @return string
     */
    public function completion(string $model, string $prompt, float $temperature, string $format = null): string
    {
        $response = $this->client
            ->generativeModel(model: $model)
            ->withGenerationConfig(new GenerationConfig(temperature: $temperature))
            ->generateContent($prompt);

        return $response->text();
    }
}
