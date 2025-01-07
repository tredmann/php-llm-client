<?php

namespace LLM\Interfaces;

use LLM\DTOs\Model;
use LLM\DTOs\Response;

interface ClientInterface
{
    /**
     * @return array<Model>
     */
    public function getModels(): array;

    public function completion(
        string $model,
        string $prompt,
        float $temperature
    ): Response;

}
