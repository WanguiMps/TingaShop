<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthSupplierController extends Controller
{
    public function newSupplier(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = Auth::user(); //get the current logged in user
        $supplier = Supplier::where('user_id', $user->id)->first(); //search for the supplier

        if ($supplier) {
            return redirect(RouteServiceProvider::SUPPLIER_DASHBOARD);
        }

        $supplier = Supplier::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        //redirect the user to dashboard
        return redirect(RouteServiceProvider::SUPPLIER_DASHBOARD);
    }

    public function index()
    {
        $user = Auth::user(); //get the current logged in user
        $supplier = Supplier::where('user_id', $user->id)->first(); //search for the supplier

        if ($supplier) {
            return redirect(RouteServiceProvider::SUPPLIER_DASHBOARD);
        }

        return view('supplier.create-supplier');
    }
}