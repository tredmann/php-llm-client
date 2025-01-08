<?php

namespace LLM\Enums;

enum Type
{
    case Gemini;
    case OpenAI;
    case Ollama;
    case OpenAILegacy;
}
