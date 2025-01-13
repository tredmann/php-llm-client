<?php

namespace LLM\LLM;

use LLM\Interfaces\LLMInterface;
use Ollama\Api\Completion;
use Ollama\Api\ListLocalModels;
use Ollama\Client\OllamaClient;
use Ollama\Requests\CompletionRequest;

readonly class Ollama implements LLMInterface
{
    private Completion $completionApi;
    private ListLocalModels $listLocalModelsApi;

    public function __construct(private OllamaClient $client)
    {
        $this->completionApi = new Completion($this->client);
        $this->listLocalModelsApi = new ListLocalModels($this->client);
    }

    public function completion(string $model, string $prompt, float $temperature, string $format = null): string
    {
        $response = $this->completionApi->getCompletion(
            new CompletionRequest(
                model: $model,
                prompt: $prompt,
                options: ['temperature' => $temperature],
                format: $format
            ),
        );

        return $response->response;
    }
}
