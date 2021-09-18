<?php

namespace App\Http\Controllers;

use App\Services\Messages as MessagesServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Messages extends Controller
{
    /**
     * @var MessagesServices
     */
    private $messages;

    public function __construct(
        MessagesServices $messages
    ) {
        $this->messages = $messages;
    }

    public function index(): View
    {
        return view('messages/index');
    }
}
