<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Supplier;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FertilizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $supplier = Supplier::where('user_id', $user->id)->first();

        if (!$supplier) {
            return view('supplier.create-supplier');
        }

        $fertilizers = Fertilizer::where('supplier_id', $supplier->id)
            ->latest()
            ->get();

        return view('supplier.fertilizer')->with('fertilizers', $fertilizers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $supplier = Supplier::where('user_id', $user->id)->first();

        if (!$supplier) {
            return view('supplier.create-supplier');
        }

        return view('supplier.new-fertilizer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'required|string|max:255',
                'image' => 'required',
            ]

        );

        $user = Auth::user();
        $supplierId = Supplier::where('user_id', $user->id)->first()->id;

        $newFertilizer = new Fertilizer();
        $newFertilizer->name = $request->name;
        $newFertilizer->price =  $request->price;
        $newFertilizer->description = $request->description;

        $imageFile = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . $imageFile;
        $imageName = str_replace(' ', '_', $imageName);
        $request->file('image')->storeAs('public/images/fertilizers', $imageName);

        $newFertilizer->image_file_path = $imageName;
        $newFertilizer->supplier_id = $supplierId;
        $newFertilizer->save();

        if ($newFertilizer) {
            // redirect to sup-fertilizer get route
            return redirect()->route('sup-fertilizer.index')->with('success', 'Fertilizer added successfully');
        }

        return redirect()->back()->with('error', 'Fertilizer could not be added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $supplier = Supplier::where('user_id', $user->id)->first();

        if (!$supplier) {
            return view('supplier.create-supplier');
        }

        $fertilizer = Fertilizer::where('id', $id)->first();

        if (!$fertilizer) {
            return redirect()->back()->with('error', 'Fertilizer not found');
        }

        return view('supplier.update-fertilizer')->with('fertilizer', $fertilizer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'required|string|max:255',
                'image' => 'required',
            ]

        );

        $user = Auth::user();
        $supplierId = Supplier::where('user_id', $user->id)->first()->id;

        $fertilizer = Fertilizer::where('id', $id)->first();

        if (!$fertilizer) {
            return redirect()->back()->with('error', 'Fertilizer not found');
        }

        $fertilizer->name = $request->name;
        $fertilizer->price =  $request->price;
        $fertilizer->description = $request->description;

        $imageFile = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . $imageFile;
        $imageName = str_replace(' ', '_', $imageName);
        $request->file('image')->storeAs('public/images/fertilizers', $imageName);

        $fertilizer->image_file_path = $imageName;
        $fertilizer->supplier_id = $supplierId;
        $fertilizer->save();

        if ($fertilizer) {
            // redirect to sup-fertilizer get route
            return redirect()->route('sup-fertilizer.index')->with('success', 'Fertilizer updated successfully');
        }

        return redirect()->back()->with('error', 'Fertilizer could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $supplier = Supplier::where('user_id', $user->id)->first();

        if (!$supplier) {
            return view('supplier.create-supplier');
        }

        $fertilizer = Fertilizer::where('id', $id)->first();

        if (!$fertilizer) {
            return redirect()->back()->with('error', 'Fertilizer not found');
        }

        $fertilizer->delete();

        return redirect()->back()->with('success', 'Fertilizer deleted successfully');
    }
}