<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return $user;
    }
}
