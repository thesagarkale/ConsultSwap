<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Notifications as NotificationsService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Notifications extends Controller
{
    /**
     * @var NotificationsService
     */
    private $notifications;

    public function __construct(
        NotificationsService $notifications
    ) {
        $this->notifications = $notifications;
    }

    public function search(Request $request): JsonResponse
    {
        $paging = $this->notifications->search($request->query());

        return Response::json($paging->toArray());
    }

    public function read(Request $request, int $id): JsonResponse
    {
        $notification = $this->notifications->patchFromInput($id, [
            'read_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return Response::json($notification);
    }
}
