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
     * @param string      $model
     * @param string      $prompt
     * @param float       $temperature
     * @param string|null $format
     * @return string
     * @url https://openai.com/api/pricing/
     * <br/><br/>
     * Library docs:<br/>
     * @url https://github.com/openai-php/client?tab=readme-ov-file#chat-resource
     * <br/><br/>
     * OpenAI doc:<br/>
     * @url https://platform.openai.com/docs/api-reference/chat/create
     */
    public function completion(string $model, string $prompt, float $temperature, string $format = null): string
    {
        $request = [
            'model' => $model,
            'n' => 1, // force just one answer
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ]
            ],
            'temperature' => $temperature,
        ];

        if (isset($format)) {
            if ($format === 'json') {
                $request['response_format']['type'] = 'json_object';
            } else {
                $request['response_format']['type'] = 'json_schema';
                $request['response_format']['json_schema'] = $format;
            }
        }

        $response = $this->client->chat()->create($request);

        return $response->choices[0]->message->content;
    }

    public function models(): array
    {
        $models = [];

        $modelResponse = $this->client->models()->list();

        foreach ($modelResponse->data as $model) {
            $models[] = $model->id;
        }

        return $models;
    }
}
