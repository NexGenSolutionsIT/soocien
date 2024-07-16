<?php

namespace App\Services;

use App\Models\TokenModel;
use App\Repositories\TokenRepository;

class TokenService
{
    protected $repository;

    public function __construct(TokenRepository $TokenRepository)
    {
        $this->repository = $TokenRepository;
    }

    public function getByToken(string $token): array
    {
        return $this->repository->getByToken($token);
    }
}
