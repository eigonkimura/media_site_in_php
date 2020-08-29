<?php

namespace App\Domains\MediaSite\Article;

use Ramsey\Uuid\Uuid;

class ArticleID {
    private string $value;
    
    private function __construct(?string $value)
    {
        $this->value = is_null($value) ? Uuid::uuid4()->toString() : $value;
    }

    public function create(?string $value): self
    {
        return new self($value);
    }

    public function getValue(): string
    {
        return $this->id;
    } 
}