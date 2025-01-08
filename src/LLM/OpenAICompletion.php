<?php

namespace LLM\LLM;

use LLM\Interfaces\LLMInterface;
use OpenAI\Client;

/**
 * This is the legacy Completion API from OpenAI
 */
readonly class OpenAICompletion implements LLMInterface
{
    public function __construct(private Client $client)
    {
    }

    /**
     * Find a list of models at the OpenAI pricing page:
     * @url https://openai.com/api/pricing/
     */
    public function completion(string $model, string $prompt, float $temperature): string
    {
        $response = $this->client->completions()->create([
            'model' => $model,
            'prompt' => $prompt,
            'temperature' => $temperature
        ]);

        return $response->choices[0]->text;
    }
}
