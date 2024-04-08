<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\PickupDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\PickupRepository;
use App\Http\Requests\CreatePickupRequest;

class PickupController extends Controller
{
    /** @var  PickupRepository */
    private $pickupRepository;

    public function __construct(PickupRepository $pickupRepo)
    {
        $this->pickupRepository = $pickupRepo;
    }

    /**
     * Display a listing of the pickups.
     *
     * @param PickupDataTable $PickupDataTable
     * @return Response
     */
    public function index(PickupDataTable $PickupDataTable)
    {
        return $PickupDataTable->render('pickups.index');
    }

    /**
     * Show the form for creating a new pickups.
     *
     * @return Response
     */
    public function create()
    {
        return view('pickups.create');
    }

    /**
     * Store a newly created pickups in storage.
     *
     * @param CreateRequest $request
     *
     * @return Response
     */
    public function store(CreatePickupRequest $request)
    {
        $input = $request->all();

        
        $pickup = $this->pickupRepository->createPickup($input);

        Flash::success('Pickup request saved successfully.');

        return redirect(route('pickups.index'));
    }

    /**
     * Display the specified Pickup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pickup = $this->pickupRepository->find($id);

        if (empty($pickup)) {
            Flash::error('pickup request not found');

            return redirect(route('pickups.index'));
        }

        return view('pickups.show')->with('pickup', $pickup);
    }

    /**
     * Remove the specified pickup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pickup = $this->pickupRepository->find($id);

        if (empty($pickup)) {
            Flash::error('pickup request not found');

            return redirect(route('pickups.index'));
        }

        $this->pickupRepository->delete($id);

        Flash::success('pickup deleted successfully.');

        return redirect(route('pickups.index'));
    }
}
