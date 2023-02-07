<?php

namespace App\Domain\Actions\Post;

use App\Domain\Actions\BaseAction;
use App\Domain\DTO\Post\CreatePostDTO;
use App\Domain\DTO\Post\PostDTO;
use App\Domain\Services\PostService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\QueueableAction\QueueableAction;

class ShowAction extends BaseAction
{
    use QueueableAction;

    public function __construct(
        protected PostService $postService
    )
    {
    }

    public function execute(int $idPost): ?PostDTO
    {
        return $this->postService->getById($idPost);
    }


}
