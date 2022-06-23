<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserProfileResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware( 'auth:api' );
    }

    /**
     * Get the authenticated User.
     *
     * @return UserProfileResource
     */
    public function userProfile(): UserProfileResource
    {
        return new UserProfileResource( auth()->user() );
    }
}
