<?php

namespace App\Domains\MediaSite\Author;

class Name {

    const MIN_LENGTH = 2;
    const MAX_LENGTH = 255;
    
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): self
    {
        // TODO: maybe I can use Chain of Responsibility to remove these 'if else'
        if (is_null($value) === true) {
            throw new \InvalidArgumentException('Nome do author está sem valor.');
        }

        if (empty($value) === true) {
            throw new \InvalidArgumentException('Nome do author está sem vazio.');
        }

        if (strlen($value) < self::MIN_LENGTH) {
            throw new \InvalidArgumentException('Nome do author muito curto.');
        }

        if (self::MAX_LENGTH < strlen($value)) {
            throw new \InvalidArgumentException('Nome do author muito longo.');
        }

        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

}