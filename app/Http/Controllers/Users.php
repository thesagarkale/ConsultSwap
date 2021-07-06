<?php

namespace App\Http\Controllers;

use App\Services\Users as UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;

class Users extends Controller
{
    /**
     * @var UsersService
     */
    private $users;

    public function __construct(
        UsersService $users
    ) {
        $this->users = $users;
    }

    public function overview(Request $request, string $username): View
    {
        try {
            $user = $this->users->findByUsername($username);
        } catch (\Throwable $exception) {
            return \view('404');
        }

        return \view('profiles/overview', [
            'user' => $user,
            'authenticated' => Auth::user() ? Auth::user()->id === $user->id : false,
        ]);
    }
}
