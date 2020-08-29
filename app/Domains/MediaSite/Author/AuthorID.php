<?php

namespace App\Domains\MediaSite\Author;

use Ramsey\Uuid\Uuid;

class AuthorID {
    private string $value;
    
    private function __construct(?string $id)
    {
        $this->id = is_null($id) ? Uuid::uuid4()->toString() : $id;
    }

    public function create(?string $id): self
    {
        return new self($id);
    }

    public function getID(): string
    {
        return $this->id;
    } 
}