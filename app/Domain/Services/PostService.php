<?php

namespace App\Domain\Services;

use App\Domain\DTO\Post\CreatePostDTO;
use App\Domain\DTO\Post\PostDTO;
use App\Domain\DTO\Post\UpdatePostDTO;
use App\Models\Post;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostService extends BaseService
{

    /**
     * @throws UnknownProperties
     */
    public function create(CreatePostDTO $DTO): ?PostDTO
    {
        /** @var Post $post */
        $post = Post::query()->create($DTO->toArray());

        return PostDTO::fromModel($post);
    }

    public function update(UpdatePostDTO $postDTO): ?PostDTO
    {
        /** @var Post $post */
        $post = Post::query()->findOrFail($postDTO->id);
        $post->fill($postDTO->except('id')->toArray());
        $post->save();

        return PostDTO::fromModel($post);

    }
    public function delete(int $postId): void
    {
        $post = Post::query()->findOrFail($postId);
        $post->delete();
    }

    public function getById(int $idPost): ?PostDTO
    {
        return PostDTO::fromModel(Post::query()->findOrFail($idPost));
    }
}
