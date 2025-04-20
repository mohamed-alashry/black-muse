<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function save_login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('success', 'Logged in successfully.');
            return response()->json([
                'status' => 'success',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'errors' => ["email" => 'The login credentials are incorrect.'],
        ], 400);
    }

    public function validateRegister(Request $request)
    {
        $field = $request->input('field');
        $value = $request->input('value');

        $requestRules = new RegisterRequest();

        $allRules = $requestRules->rules();

        $rules = [
            $field => $allRules[$field] ?? 'nullable'
        ];

        $data = [
            $field     => $value,
            'password' => $request->password
        ];

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json([
                'valid'   => false,
                'message' => $validator->errors()->first($field)
            ], 422);
        }
    }


    public function save_register(Request $request)
    {
        $validator = \Validator::make($request->all(), (new RegisterRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        if ($request->password != $request->password_confirmation) {
            return response()->json([
                'status' => 'error',
                'errors' => ['password' => 'The password confirmation field must match password.'],
            ], 400);
        }

        $data = $request->only(['name', 'email', 'phone_number', 'password']);

        $client = Client::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
            'password'     => bcrypt($data['password']),
        ]);

        Auth::guard('client')->login($client);

        session()->flash('success', 'Logged in successfully.');
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('success', 'Logged out successfully.');

        return redirect()->route('site.home');
    }
}
