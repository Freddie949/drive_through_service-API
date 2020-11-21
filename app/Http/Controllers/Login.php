<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\TokenGuard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Mailgun\Mailgun;
use App\User;

class Login extends Controller
{
    /**
     * @SWG\Post(
     *   path="/api/login",
     *   summary="Login",
     *   operationId="login",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="email",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="password",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     * )
     */
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // if (!Auth::attempt($login)) {
        //     return response(['message' => 'Invalid login credentials']);
        // }

        //$user = User::find(1);

        // Creating a token without scopes...
        //$token = $user->createToken('Token Name')->accessToken;
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(["message" => "Invalid credentials"]);
        } else {
            if (!Hash::check($request->password, $user->password)) {
                return response()->json(["message" => "Invalid credentials"]);
            } elseif (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('authToken')->accessToken;
                return response(['user' => $user, 'access_token' => $token]);
            }
        }

        // Creating a token without scopes...

        //Auth::user()->createToken
        //$accessToken = Auth::user()->createToken('authToken')->accessToken;
        //$accessToken = User::createToken('authToken');
        //$token = $accessToken->accessToken;


    }


    /**
     * @SWG\Post(
     *   path="/api/register",
     *   summary="Register",
     *   operationId="Register",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="name",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="surname",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="address",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="phonenumber",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="email",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="password",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     * )
     */
    public function register(Request $request)
    {
        $login = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'address' => 'required|string',
            'phonenumber' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->password = Hash::make($request->password);
        $user->created_at = now();

        $user->save();

        // $user = User::create([
        //     $request->name,
        //     $request->surname,
        //     $request->address,
        //     $request->email,
        //     Hash::make($request->password),
        //     now()
        // ]);

        return response()->json($user, 201);
    }
}
