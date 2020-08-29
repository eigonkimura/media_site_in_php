<?php

namespace App\Domains\MediaSite;

use DateTimeImmutable;

class CreatedAt {
    private DateTimeImmutable $date;

    public function __construct()
    {
        $this->date = new DateTimeImmutable();
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
}