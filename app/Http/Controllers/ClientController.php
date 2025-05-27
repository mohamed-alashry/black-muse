<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\UpdateClientInfoRequest;
use App\Http\Requests\UpdateClientPasswordRequest;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function profile()
    {
        $client = auth('client')->user();

        return view('site.profile.info', compact('client'));
    }

    public function updateInfo(UpdateClientInfoRequest $request)
    {
        $client = auth('client')->user();
        $client->update($request->validated());

        return response()->json([
            'status' => 'success', 
            'message' => __('auth.Info updated successfully')
        ]);
    }

    public function updatePassword(UpdateClientPasswordRequest $request)
    {
        $client = auth('client')->user();

        if (!Hash::check($request->old_password, $client->password)) {
            return response()->json([
                'status' => 'error',
                'errors' => ['password' => __('auth.The Old password is incorrect.')],
            ], 400);
        }
       elseif ($request->new_password != $request->repeat_password) {
            return response()->json([
                'status' => 'error',
                'errors' => ['password' => __('auth.The password confirmation field must match password.')],
            ], 400);
        }

        $client->password = bcrypt($request->new_password);
        $client->save();

         // Logout the user
        auth('client')->logout();

        session()->flash('success', __('auth.Password updated successfully.'));

        return response()->json(['status' => 'success']);
    }
}