<?php

namespace App\Domains\MediaSite\Article;
use App\Domains\MediaSite\Author\AuthorID;
use App\Domains\MediaSite\Article\ArticleID;
use App\Domains\MediaSite\Article\Title;
use App\Domains\MediaSite\Article\TextInMarkDown;
use App\Domains\MediaSite\Description;
use App\Domains\MediaSite\CreatedAt;
use App\Domains\MediaSite\LastUpdatedAt;
use App\Domains\Core\Shared\Guard;

class Article {
    private ArticleID $id;
    private AuthorID $authorID;
    private Description $description;
    private Title $title;
    private TextInMarkDown $textInMarkDown;
    private CreatedAt $createdAt;
    private LastUpdatedAt $lastUpdatedAt;
    

    private function __construct(
        ArticleID $articleID,
        AuthorID $authorID, 
        Description $description, 
        TextInMarkDown $textInMarkDown,
        Title $title)
    {
        $this->createdAt = new CreatedAt();
        $this->lastUpdatedAt = new LastUpdatedAt();
    }

    public function create(
        AuthorID $authorID, 
        Description $description, 
        Title $title, 
        TextInMarkDown $textInMarkDown,
        ArticleID $articleID
        ): self
        {
        (new Guard('ID do autor', $authorID))->againstNull();
        (new Guard('ID do artigo', $articleID))->againstNull();
        (new Guard('título', $title))->againstNull();
        (new Guard('texto em MarkDown', $textInMarkDown))->againstNull();
        (new Guard('descrição do artigo', $description))->againstNull();

        return new Article($articleID, $authorID, $description, $textInMarkDown, $title);
    }
}