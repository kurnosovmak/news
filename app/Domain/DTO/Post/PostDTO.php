<?php

namespace App\Domain\DTO\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostDTO extends DataTransferObject
{
    public ?int $id;
    public ?string $title;
    public ?string $description;
    public ?Carbon $created_at;
    public ?Carbon $updated_at;




    /**
     * @throws UnknownProperties
     */
    public static function fromModel(Post $post): self
    {
        return new static([
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $array): self
    {
        return new static([
            'id' => $array['id'],
            'title' => $array['title'],
            'description' => $array['description'],
            'created_at' => $array['created_at'],
            'updated_at' => $array['updated_at'],
        ]);
    }
}
