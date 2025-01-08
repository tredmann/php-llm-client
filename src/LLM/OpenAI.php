<?php

namespace LLM\LLM;

use LLM\Interfaces\LLMInterface;
use OpenAI\Client;

readonly class OpenAI implements LLMInterface
{
    public function __construct(private Client $client)
    {
    }

    /**
     * Find a list of models at the OpenAI pricing page:<br/>
     * @url https://openai.com/api/pricing/
     * <br/><br/>
     * Library docs:<br/>
     * @url https://github.com/openai-php/client?tab=readme-ov-file#chat-resource
     * <br/><br/>
     * OpenAI doc:<br/>
     * @url https://platform.openai.com/docs/api-reference/chat/create
     */
    public function completion(string $model, string $prompt, float $temperature): string
    {
        $response = $this->client->chat()->create([
            'model' => $model,
            'n' => 1, // force just one answer
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ]
            ],
            'temperature' => $temperature,
        ]);

        return $response->choices[0]->message->content;
    }
}
