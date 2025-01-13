<?php

namespace LLM\LLM;

use LLM\Interfaces\LLMInterface;
use OpenAI\Client;

/**
 * @deprecated Use OpenAI instead
 *
 * This is the legacy Completion API from OpenAI
 */
readonly class OpenAICompletion implements LLMInterface
{
    public function __construct(private Client $client)
    {
    }

    /**
     * Find a list of models at the OpenAI pricing page:
     * @param string      $model
     * @param string      $prompt
     * @param float       $temperature
     * @param string|null $format
     * @return string
     * @url https://openai.com/api/pricing/
     */
    public function completion(string $model, string $prompt, float $temperature, string $format = null): string
    {
        $response = $this->client->completions()->create([
            'model' => $model,
            'prompt' => $prompt,
            'temperature' => $temperature
        ]);

        return $response->choices[0]->text;
    }
}
