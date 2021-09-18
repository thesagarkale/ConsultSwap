<?php

namespace App\Http\Controllers\Api;

use App\Services\Contacts as ContactsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class Contacts
{
    /**
     * @var ContactsService
     */
    private $contacts;

    public function __construct(
        ContactsService $contacts
    ) {
        $this->contacts = $contacts;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function contacts(Request $request): JsonResponse
    {
        $paging = $this->contacts->getAvailableContacts(Auth::user()->id, $request->query());

        return Response::json($paging->toArray());
    }
}