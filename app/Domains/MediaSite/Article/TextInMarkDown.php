<?php

namespace App\Domains\MediaSite\Article;

use App\Domains\Core\Shared\Guard;

class TextInMarkDown {
    
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): self
    {
        (new Guard("descrição do artigo", $value))
            ->againstNull()
            ->againstEmpty()
            ->againtNonString();

        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

}