<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserMetadata;
use App\Services\Users as UsersService;
use App\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class Users extends Controller
{
    private UsersService $users;

    private UserMetadata $userMetadata;

    public function __construct(
        UsersService $users,
        UserMetadata $userMetadata
    ) {
        $this->users = $users;
        $this->userMetadata = $userMetadata;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function fetch(Request $request, int $id): JsonResponse
    {
        $user = $this->users->find($id);

        return Response::json(UserTransformer::transformSingle($user));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function storeMetadata(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'meta_key' => 'required',
            'meta_value' => 'required'
        ]);

        try {
            $this->userMetadata->store($id, $request->input('meta_key'), $request->input('meta_value'));
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), [
                'exception' => $e
            ]);
        }

        return Response::json(['success' => true]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function categories(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'keys' => 'required'
        ]);

        try {
            $this->users->attachCategories($id, $request->input('keys'));
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage(), [
                'exception' => $exception,
            ]);
        }

        return Response::json(['success' => true]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function fetchFollowers(Request $request, int $id): JsonResponse
    {
        $paging = $this->users->getFollowers($id);

        return Response::json($paging->toArray());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function fetchFollowings(Request $request, int $id): JsonResponse
    {
        $paging = $this->users->getFollowings($id);

        return Response::json($paging->toArray());
    }

    public function follows(Request $request, int $id, int $follows): JsonResponse
    {
        $result = $this->users->checkIfFollows($id, $follows);

        return Response::json(['result' =>  $result]);
    }
}
