<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @property string $original_url
 * @property string $short_url
 */

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';
    protected $fillable = [
        'original_url',
        'short_url',
    ];

    public static function staticCreate($originalUrl, $shortUrl): self
    {
        $link = new self();

        $link->setShortUrl($shortUrl);
        $link->setOriginalUrl($originalUrl);

        return $link;
    }

    public function setOriginalUrl(string $originalUrl): void
    {
        $this->original_url = $originalUrl;
    }

    public function setShortUrl(string $shortUrl): void
    {
        $this->short_url = $shortUrl;
    }
}
