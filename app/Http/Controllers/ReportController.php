<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Booking;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $courier_data = Booking::select('courier as label', DB::raw('count(*) as count'))
            ->whereNotNull('courier')
            ->groupBy('courier')
            ->get();

        $courier = $this->getChart($courier_data);

        $courier_service_data = Booking::select('dc_service_id as label', DB::raw('count(*) as count'))
            ->whereNotNull('dc_service_id')
            ->groupBy('dc_service_id')
            ->get();
        $courier_service = $this->getChart($courier_service_data);
        // dd($courier, $courier_service);
        return view('reports.index', compact('courier', 'courier_service'));
    }

    protected function getChart($db_data)
    {
        $data = [
            'label' => [],
            'data' => [],
        ];

        foreach ($db_data as $row) {
            $data['label'][] = $row->label;
            $data['data'][] = (int)$row->count;
        }

        $ret_data['chart_data'] = json_encode($data);

        return $ret_data;
    }

    public function change($period = 'daily')
    {
        $startDate = null;
        $endDate = Carbon::now();

        // Calculate start and end dates based on the selected period
        switch ($period) {
            case 'weekly':
                $startDate = Carbon::now()->startOfWeek();
                break;
            case 'monthly':
                $startDate = Carbon::now()->startOfMonth();
                break;
            case 'yearly':
                $startDate = Carbon::now()->startOfYear();
                break;
            default:
                // Default to daily
                $startDate = Carbon::now()->startOfDay();
                break;
        }
        // dd($startDate);
        $courier_data = Booking::select('courier as label', DB::raw('count(*) as count'))
            ->whereNotNull('courier')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('courier')
            ->get();

            $courier = $this->getChart($courier_data);

            $courier_service_data = Booking::select('dc_service_id as label', DB::raw('count(*) as count'))
                ->whereNotNull('dc_service_id')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->groupBy('dc_service_id')
                ->get();
            $courier_service = $this->getChart($courier_service_data);
   
        // return response()->json(['chart_data' => $data]);
        return response()->json(['courier' => $courier,'courier_service' => $courier_service]);
    }
}
