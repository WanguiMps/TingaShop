<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthClientController extends Controller
{
    public function newClient(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = Auth::user(); //get the current logged in user
        $client = Client::where('user_id', $user->id)->first(); //search for the client

        if ($client) {
            return redirect(RouteServiceProvider::CLIENT_DASHBOARD);
        }

        $client = Client::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        //redirect the user to dashboard
        return redirect(RouteServiceProvider::CLIENT_DASHBOARD);
    }

    public function index()
    {
        $user = Auth::user(); //get the current logged in user
        $client = Client::where('user_id', $user->id)->first(); //search for the client

        if ($client) {
            return redirect(RouteServiceProvider::CLIENT_DASHBOARD);
        }

        return view('client.create-client');
    }
}
