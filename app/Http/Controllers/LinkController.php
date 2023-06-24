<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\LinkRequest;
use App\Http\Resources\Link\LinkResource;
use App\Services\Link\Actions\ShortenLinkAction;
use Illuminate\Support\Facades\View;

class LinkController extends Controller
{
    public function __construct(protected ShortenLinkAction $linkAction)
    {
    }

    public function shortenUrl(LinkRequest $request): LinkResource
    {
        $url = $request->getUrl();
        $link = $this->linkAction->shortenUrl($url);

        return new LinkResource($link);
    }

    public function showIndex()
    {
        return View::make('index');
    }
}
