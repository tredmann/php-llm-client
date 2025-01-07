<?php

namespace LLM\LLMs;

use LLM\DTOs\Response;
use LLM\Interfaces\ClientInterface;
use Ollama\Api\Completion;
use Ollama\Api\ListLocalModels;
use Ollama\Client\OllamaClient;
use Ollama\Requests\CompletionRequest;

readonly class Ollama implements ClientInterface
{
    private Completion $completionApi;
    private ListLocalModels $listLocalModelsApi;

    public function __construct(private OllamaClient $client)
    {
        $this->completionApi = new Completion($this->client);
        $this->listLocalModelsApi = new ListLocalModels($this->client);
    }

    public function getModels(): array
    {
        $response = $this->listLocalModelsApi->listLocalModels();

        return [];
    }

    public function completion(string $model, string $prompt, float $temperature): Response
    {
        $response = $this->completionApi->getCompletion(
            new CompletionRequest(model: $model, prompt: $prompt, options: ['temperature' => $temperature]),
        );

        return new Response(text: $response->response);
    }
}
