<?php

namespace App\Domain\Actions\Post;

use App\Domain\Actions\BaseAction;
use App\Domain\DTO\Post\CreatePostDTO;
use App\Domain\DTO\Post\PostDTO;
use App\Domain\DTO\Post\UpdatePostDTO;
use App\Domain\Services\PostService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\QueueableAction\QueueableAction;

class UpdateAction extends BaseAction
{
    use QueueableAction;

    public function __construct(
        protected PostService $postService
    )
    {
    }

    /**
     * @throws UnknownProperties
     */
    public function execute(UpdatePostDTO $postDTO): ?PostDTO
    {
        return $this->postService->update($postDTO);
    }
}
