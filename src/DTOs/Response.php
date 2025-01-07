<?php

namespace LLM\DTOs;

readonly class Response
{
    public function __construct(public string $text)
    {
    }

}
