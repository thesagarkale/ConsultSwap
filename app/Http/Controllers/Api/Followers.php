<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowerRequest;
use App\Services\Followers as FollowersService;
use App\Transformers\FollowerTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class Followers extends Controller
{
    private FollowersService $followers;

    public function __construct(
        FollowersService $followers
    ) {
        $this->followers = $followers;
    }

    public function create(FollowerRequest $request): JsonResponse
    {
        $follower = $this->followers->createFromInput($request->input());

        return Response::json(FollowerTransformer::transformSingle($follower));
    }

    public function delete(FollowerRequest $request): JsonResponse
    {
        $follower = $this->followers->createFromInput($request->input());

        return Response::json(FollowerTransformer::transformSingle($follower));
    }
}