<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository implements LinkRepositoryInterface
{
    public function save($link): Link
    {
        if (!$link->save()) {
            throw new \Exception('Saving error');
        }
        return $link;
    }

    public function find(string $url)
    {
        return Link::where('original_url', $url)->first();
    }
}
