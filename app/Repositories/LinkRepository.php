<?php

namespace App\Repositories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Builder;

class LinkRepository implements LinkRepositoryInterface
{
    public function query(): Builder
    {
        return Link::query();
    }

    public function save($link): Link
    {
        if (!$link->save()) {
            throw new \Exception('Saving error');
        }
        return $link;
    }

    public function find(string $url)
    {
        $query = $this->query();
        return $query->where('original_url', $url)->first();
    }
}
