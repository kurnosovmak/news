<?php

namespace App\Domain\DTO\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdatePostDTO extends DataTransferObject
{
    public int $id;
    public ?string $title;
    public ?string $description;


    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $array): self
    {
        return new static([
            'id' => $array['id'],
            'title' => $array['title'],
            'description' => $array['description'],
        ]);
    }
}
