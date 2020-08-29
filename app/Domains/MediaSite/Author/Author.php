<?php

namespace App\Domains\MediaSite\Author;

use Ramsey\Uuid\Uuid;

class Author {
    private AuthorID $id;
    private Name $name;
    
    private function __construct(Name $name, AuthorID $id)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function create(Name $name, AuthorID $id): self
    {
        return new self($name, $id);
    }

    public function getID(): AuthorID
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}