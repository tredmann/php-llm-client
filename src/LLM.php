<?php

namespace LLM;

use Exception;
use LLM\Enums\Type;
use LLM\Interfaces\LLMInterface;
use LLM\LLM\Gemini;
use LLM\LLM\Ollama;
use LLM\LLM\OpenAI;
use LLM\LLM\OpenAICompletion;
use OpenAI as OpenAIClient;
use Ollama\Client\OllamaClient;
use Gemini as GeminiClient;

class LLM
{
    private function __construct()
    {

    }

    /**
     * @throws Exception
     */
    public static function make(Type $type): ?LLMInterface
    {
        if (($type === Type::OpenAI || $type === Type::OpenAILegacy) && !isset($_ENV['OPEN_AI_API_KEY'])) {
            throw new Exception('You need to provide an OpenAI API key in your environment as "OPEN_AI_API_KEY"');
        }

        if ($type == Type::Gemini && !isset($_ENV['GEMINI_API_KEY'])) {
            throw new Exception('You need to provide a Gemini API key in your environment as "GEMINI_API_KEY"');
        }

        return match ($type) {
            Type::Ollama => new Ollama(client: new OllamaClient()),
            Type::OpenAI => new OpenAI(client: OpenAIClient::client(apiKey: $_ENV['OPEN_AI_API_KEY'])),
            Type::OpenAILegacy => new OpenAICompletion(client: OpenAIClient::client(apiKey: $_ENV['OPEN_AI_API_KEY'])),
            Type::Gemini => new Gemini(client: GeminiClient::client(apiKey: $_ENV['GEMINI_API_KEY'])),
            default => null
        };
    }

}
