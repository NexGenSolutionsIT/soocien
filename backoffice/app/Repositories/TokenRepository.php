<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TokenInterface;
use App\Models\TokenModel;
use Illuminate\Database\Eloquent\Model;

class TokenRepository implements TokenInterface
{

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getByToken(string $token): array
    {
        return $this->model->where('token', $token)->first()->toArray();
    }
}
