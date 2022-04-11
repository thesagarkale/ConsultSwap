<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Services\Messages as MessagesService;
use App\Transformers\MessagesTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class Messages extends Controller
{
    /**
     * @var MessagesService
     */
    private $messages;

    public function __construct(
        MessagesService $messages
    ) {
        $this->messages = $messages;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $paging = $this->messages->search($request->query());

        return Response::json($paging->toArray());
    }

    public function create(MessageRequest $request): JsonResponse
    {
        $message = $this->messages->createFromInput($request->input());

        return Response::json(MessagesTransformer::transformSingle($message));
    }
}