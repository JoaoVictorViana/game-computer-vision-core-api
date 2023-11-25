<?php

namespace App\Actions\Auth;

use App\Http\Resources\UserResource;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Login
{
    use AsAction;

    public function handle($credentials)
    {
        if (!$token = auth()->attempt($credentials)) {
            throw new UnauthorizedHttpException('');
        }

        return $token;
    }

    public function asController(ActionRequest $request)
    {
        return $this->run($request->only(['email', 'password']));
    }

    public function jsonResponse($token)
    {
        if (!$token) {
            response()->json([
                'message' => 'Credênciais inválidas',
            ], 401);
        }

        $user = auth()->user();
        $user->token = $token;
        return new UserResource($user);
    }
}
