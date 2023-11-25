<?php

namespace App\Actions\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Register
{
    use AsAction;

    public function handle($user)
    {
        $newUser = User::create($user);

        return $newUser;
    }

    public function asController(ActionRequest $request)
    {
        return $this->run($request->only(['name', 'email', 'password']));
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function jsonResponse($user)
    {
        return new UserResource($user);
    }
}
