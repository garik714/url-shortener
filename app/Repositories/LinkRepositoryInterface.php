<?php

namespace App\Repositories;

use App\Models\Link;

interface LinkRepositoryInterface
{
    public function save(Link $link): Link;
    public function find(string $url);
}
