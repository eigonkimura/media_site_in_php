<?php

namespace App\Domains\MediaSite\Author;

use Ramsey\Uuid\Uuid;

class Author {
    private AuthorID $id;
    private Name $name;
    
    private function __construct(Name $name, ?AuthorID $id)
    {
        $this->id = is_null($id) ? Uuid::uuid4() : $id;
        $this->name = $name;
    }

    public function create(Name $name, ?AuthorID $id): self
    {
        return new self($name, $id);
    }
}