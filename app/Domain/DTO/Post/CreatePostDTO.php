<?php

namespace App\Domain\DTO\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreatePostDTO extends DataTransferObject
{
    public ?string $title;
    public ?string $description;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(Request $request): self
    {
        return new static([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromModel(Post $post): self
    {
        return new static([
            'title' => $post->title,
            'description' => $post->description,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $array): self
    {
        return new static([
            'title' => $array['title'],
            'description' => $array['description'],
        ]);
    }
}
