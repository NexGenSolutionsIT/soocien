<?php

namespace App\Repositories\Interfaces;

interface TokenInterface
{
    public function getByToken(string $token): array;
}
