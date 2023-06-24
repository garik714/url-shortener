<?php

namespace App\Http\Requests\Link;


use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public const URL = 'url';

    public function rules(): array
    {
        return [
            self::URL => 'required|url',
        ];
    }

    public function getUrl(): string
    {
        return $this->get(self::URL);
    }
}
