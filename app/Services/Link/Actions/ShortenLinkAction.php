<?php

namespace App\Services\Link\Actions;

use App\Models\Link;
use App\Repositories\LinkRepositoryInterface;
use App\Services\UseCases\ShortingLinkUseCase;

class ShortenLinkAction
{
    public function __construct(
        protected LinkRepositoryInterface $linkRepository,
        protected ShortingLinkUseCase     $shortingLinkUseCase
    )
    {
    }

    public function shortenUrl(string $originalUrl)
    {
        $link = $this->linkRepository->find($originalUrl);

        if ($link) {
            return $link;
        }

        $shortUrl = $this->shortingLinkUseCase->run($originalUrl);
        $link = Link::staticCreate($originalUrl, $shortUrl);
        $this->linkRepository->save($link);

        return $link;
    }
}
