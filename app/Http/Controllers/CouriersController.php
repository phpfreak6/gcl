<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\ParentCourier;
use Illuminate\Http\Request;

class CouriersController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id; // Get the 'id' from the request
        $service = [];
        $parentCourier = null;
        if ($id) {
            // If there's an ID, get couriers where 'parent_id' equals the provided ID
            // And also include the parent courier in the results if needed
            $services = Courier::where('parent_id', $id)->get();

            // Attempt to get the parent courier if necessary
            $parentCourier = ParentCourier::find($id);

        } else {
            // If no ID is provided, get all couriers
            $services = Courier::all();
        }

        return view('couriers.service.index', compact(['services', 'parentCourier']));
        // If including parent courier, add it to the compact method
        // return view('couriers.service.index', compact('services', 'parentCourier'));
    }
    public function create()
    {
        $parentCouriers = ParentCourier::all();

        return view('couriers.service.create', compact('parentCouriers'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Name' => 'required|string',
            'parent_id' => 'required|string',
            'service_id' => 'required|string',

        ]);

        $data = $request->all();
        $data['pickup'] = $request->has('pickup') ? '1' :'0';
        $data['dropoff'] = $request->has('dropoff') ? '1' :'0';

        $courier = new Courier($data);
        $courier->save();

        return redirect()->route('courier-services.index')->with('success', 'Courier added successfully.');
    }
    //public function show($id)
    // {
    //     $courier = Courier::findOrFail($id);
    //     return view('couriers.show', compact('courier'));
    // }

    public function edit($id)
    {
        $service = Courier::findOrFail($id);
        $parentCouriers = ParentCourier::all();
        return view('couriers.service.create', compact(['service', 'parentCouriers']));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'preset_id' => 'required|string',
            'Name' => 'required|string',
            'service_id' => 'required|string',
            // Add other fields as necessary
        ]);

        $data = $request->all();
        $data['pickup'] = $request->has('pickup') ? '1' :'0';
        $data['dropoff'] = $request->has('dropoff') ? '1' :'0';
      
        $courier = Courier::findOrFail($id);
        $courier->update($data);

        return redirect()->route('courier-services.index')->with('success', 'Courier updated successfully.');
    }
    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();

        return response()->json(null, 204);
    }

}
