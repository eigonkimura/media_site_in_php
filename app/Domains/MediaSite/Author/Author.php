<?php

namespace App\Domains\MediaSite\Author;

use App\Domains\Core\Shared\Guard;

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
        (new Guard('nome do autor', $name))->againstNull();
        (new Guard('ID do autor', $id))->againstNull();

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