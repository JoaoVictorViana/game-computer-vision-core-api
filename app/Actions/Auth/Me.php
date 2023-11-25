<?php

namespace App\Actions\Auth;

use App\Http\Resources\UserResource;
use Lorisleiva\Actions\Concerns\AsAction;

class Me
{
    use AsAction;

    public function handle()
    {
        return auth()->user();
    }

    public function asController()
    {
        return $this->run();
    }

    public function jsonResponse($user)
    {
        return new UserResource($user);
    }
}
