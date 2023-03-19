<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return response()->view('cms.auth.login');
    }
    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            "email" => "string|required|exists:admins,email",
            "password" => "required|string",
            "remember" => "required|boolean"

        ]);
        if (!$validator->fails()) {
            // $user = User::where("email", "=", $request->input("email"));
            $card = ["email" => $request->input("email"), "password" => $request->input("password")];
            if (Auth::guard('admin')->attempt($card, $request->input("remember"))) {
                return response()->json(["message" => "login is success"], Response::HTTP_OK);
            } else {
                return response()->json(["message" => "login is error"], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(["message" => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('cms.logout'));
    }
    public function forgotPassword(Request $request)
    {
        return response()->view('cms.auth.forgot-password');
    }
}
