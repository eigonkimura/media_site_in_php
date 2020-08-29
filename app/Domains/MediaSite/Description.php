<?php

namespace App\Domains\MediaSite;

use App\Domains\Core\Shared\Guard;

class Description {

    const MIN_LENGTH = 2;
    const MAX_LENGTH = 255;
    
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
            ->againtNonString()
            ->againstShortString(Description::MIN_LENGTH)
            ->againstLongString(Description::MAX_LENGTH);

        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

}