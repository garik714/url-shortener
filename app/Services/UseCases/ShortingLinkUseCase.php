<?php

namespace App\Services\UseCases;

use AshAllenDesign\ShortURL\Facades\ShortURL;

class ShortingLinkUseCase
{
    public function run(string $url): string
    {
        $shortUrlObject = ShortURL::destinationUrl($url)->singleUse()->make();
        $shortUrl = $shortUrlObject->default_short_url;

        return $shortUrl;
    }
}
