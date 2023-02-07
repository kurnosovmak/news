<?php

namespace App\Http\Controllers\v1\User;

use App\Domain\Actions\Post\CreateAction;
use App\Domain\Actions\Post\DestroyAction;
use App\Domain\Actions\Post\ShowAction;
use App\Domain\Actions\Post\UpdateAction;
use App\Domain\DTO\Post\CreatePostDTO;
use App\Domain\DTO\Post\UpdatePostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Post\StorePostRequest;
use App\Http\Resources\v1\ErrorResource;
use App\Http\Resources\v1\Post\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(CreateAction $action, StorePostRequest $request): PostResource|ErrorResource
    {
        $postDTO = $action->execute(CreatePostDTO::fromRequest($request));
        if (!$postDTO) {
            return ErrorResource::make('Error create post', 500);
        }
        return PostResource::make($postDTO);
    }

    public function show(ShowAction $action, int $post): PostResource|ErrorResource
    {
        $postDTO = $action->execute($post);
        if (!$postDTO) {
            return ErrorResource::make('Error show post', 500);
        }
        return PostResource::make($postDTO);
    }

    public function update(UpdateAction $action, int $post, StorePostRequest $request): PostResource|ErrorResource
    {
        $postDTO = $action->execute(UpdatePostDTO::fromArray([...$request->toArray(), 'id' => $post]));
        if (!$postDTO) {
            return ErrorResource::make('Error update post', 500);
        }
        return PostResource::make($postDTO);
    }

    public function destroy(DestroyAction $action, int $post): JsonResponse
    {
        $action->execute($post);
        return response()->json(null, 204);
    }
}
