# php-llm-client
General Client API to easy access to several LLM APIs (OpenAPI, Ollama, Google Gemini)

## Installation

```shell
composer require tredmann/php-llm-client
```

## Usage

```php
use LLM\Enums\Type;
use LLM\LLM;

$llm = LLM::make(Type::Ollama);

echo $llm->completion(
    model: 'gemma2:latest',
    prompt: 'What is the capital of Germany?',
    temperature: 1.0
);

// Output: The capital of Germany is **Berlin**.
```

## Supported Providers/LLMs

* [x] OpenAI (`Type::OpenAI`)
* [x] OpenAI Legacy Completion (`Type::OpenAILegacy`)
* [x] Ollama (`Type::Ollama`)
* [x] Google Gemini (`Type::Gemini`)
