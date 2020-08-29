<?php

namespace App\Domains\MediaSite\Article;

use App\Domains\Core\Shared\Guard;

class Title {

    const MIN_LENGTH = 2;
    const MAX_LENGTH = 255;
    
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): self
    {
        (new Guard("título", $value))
            ->againstNull()
            ->againstEmpty()
            ->againtNonString()
            ->againstShortString(Title::MIN_LENGTH)
            ->againstLongString(Title::MAX_LENGTH);

        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

}