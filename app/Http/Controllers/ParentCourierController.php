<?php

namespace App\Http\Controllers;

use App\ParentCourier;
use Illuminate\Http\Request;

class ParentCourierController extends Controller
{
    public function index()
    {
        $couriers = ParentCourier::all();
        return view('couriers.show', compact('couriers'));
    }
    public function showForm(Request $request)
    {
        $courier = null;
        if ($request->id) {
            $courier = ParentCourier::find($request->id);

        }
        return $courier ? view('couriers.add', compact('courier')) : view('couriers.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'courier_name' => 'required',
        ]);

        $data = $request->except('logo'); // Exclude logo from $data

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('logos'), $filename);
            $data['logo'] = 'logos/' . $filename;
        }

        $courier = ParentCourier::create($data);

        return redirect()->back()->with('success', 'Courier added successfully.');
    }

    public function update(Request $request, ParentCourier $courier)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'courier_name' => 'required',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            $oldLogo = public_path($courier->logo);
            if (file_exists($oldLogo)) {
                @unlink($oldLogo);
            }

            // Upload the new logo
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('logos'), $filename);
            $data['logo'] = 'logos/' . $filename;
        }

        $courier->update($data);

        return redirect()->back()->with('success', 'Courier updated successfully.');
    }

    public function show(ParentCourier $courier)
    {
        return response()->json($courier);
    }

    public function destroy(ParentCourier $courier)
    {
        $courier->delete();
        return response()->json(null, 204);
    }
}
