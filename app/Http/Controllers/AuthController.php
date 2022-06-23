<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetLinkRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

/**
 * Class AuthController
 * Handles authentication process
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware( 'auth:api', [
            'except' => [
                'login',
                'register',
                'sendResetLinkResponse',
                'sendResetResponse'
            ]
        ] );
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login( LoginRequest $request ): JsonResponse
    {
        if ( ! $token = auth()->attempt( $request->validated() ) ) {
            return response()->json( [ 'message' => 'Check your login requisites' ], 401 );
        }

        return $this->createNewToken( $token );
    }

    /**
     * Register a User.
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register( RegisterRequest $request ): JsonResponse
    {
        $user = User::create( array_merge(
            $request->validated(),
            [ 'password' => bcrypt( $request->password ) ]
        ) );

        return response()->json( [
            'message' => 'User successfully registered',
            'data'    => $user
        ], 201 );
    }

    protected function sendResetLinkResponse( ResetLinkRequest $request )
    {
        $input    = $request->only( 'email' );
        $response = Password::sendResetLink( $input );

        if ( $response === Password::RESET_LINK_SENT ) {
            $message = "Mail send successfully";
        } else {
            $message = "Email could not be sent to this email address";
        }

        $response = [ 'data' => '', 'message' => $message ];

        return response()->json( $response );
    }

    protected function sendResetResponse( ResetPasswordRequest $request ): JsonResponse
    {
        $input = $request->only( 'email', 'token', 'password', 'password_confirmation' );

        $response = Password::reset( $input, function ( $user, $password )
        {
            $user->forceFill( [
                'password' => bcrypt( $password )
            ] )->save();

            event( new PasswordReset( $user ) );
        } );

        $status = 200;
        if ( $response === Password::PASSWORD_RESET ) {
            $message = "Password reset successfully";
        } else {
            $message = "Oops! Something went wrong";
            $status  = 400;
        }

        $response = [ 'data' => '', 'message' => $message ];

        return response()->json( $response, $status );
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json( [ 'message' => 'User successfully signed out' ] );
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->createNewToken( auth()->refresh() );
    }


    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function createNewToken( string $token ): JsonResponse
    {
        return response()->json( [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'user'         => auth()->user()
        ] );
    }
}
