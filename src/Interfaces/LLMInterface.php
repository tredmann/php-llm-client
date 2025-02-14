<?php

namespace LLM\Interfaces;

interface LLMInterface
{
    public function models(): array;

    public function completion(
        string $model,
        string $prompt,
        float $temperature,
        string $format = null
    ): string;

}
