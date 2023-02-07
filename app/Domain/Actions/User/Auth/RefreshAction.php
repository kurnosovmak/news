<?php

namespace App\Domain\Actions\User\Auth;

use App\Domain\Actions\BaseAction;
use App\Domain\DTO\User\TokenDTO;
use App\Domain\DTO\User\UserDTO;
use App\Domain\Services\AuthService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\QueueableAction\QueueableAction;

class RefreshAction extends BaseAction
{
    use QueueableAction;

    public function __construct(
        protected AuthService $authService
    )
    {
    }

    /**
     * @throws UnknownProperties
     */
    public function execute(): ?TokenDTO
    {
        return $this->authService->refresh();
    }
}
