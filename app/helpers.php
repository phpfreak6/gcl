<?php

use App\ParentCourier;
use App\Models\Courier;
use Carbon\Carbon;

if (!function_exists('getImage')) {
    function getImage($input)
    {
        // Attempt to find the courier's logo and long_description by name
        $courier = ParentCourier::where('courier_name', $input)->first(['logo', 'long_description']);

        if ($courier && $courier->logo) {
            // Assuming the 'logo' field contains the path or filename of the logo
            // And assuming logos are stored in the 'storage/app/public/logos' directory
            // Use 'asset' or a direct path depending on your storage setup
            $logoUrl = asset($courier->logo);
            $longDescription = $courier->long_description; // Fetch the long_description

            // Return both logo URL and long description
            return [
                'logo' => $logoUrl,
                'long_description' => $longDescription,
            ];
        } else {
            // Fallback handling for known couriers without a database entry
            $fallbackData = [
                'Fast Despatch Logistics' => ['logo' => 'images/fdl.png', 'long_description' => ''],
                'DHL' => ['logo' => 'images/dhl.png', 'long_description' => ''],
                'PalletWays' => ['logo' => 'images/pallet-ways.png', 'long_description' => ''],
                'DHL ParcelUK' => ['logo' => 'images/dhl.png', 'long_description' => ''],
                'DX Express' => ['logo' => 'images/dx.jpeg', 'long_description' => ''],
            ];

            if (array_key_exists($input, $fallbackData)) {
                $data = $fallbackData[$input];
                // Return the asset path for the logo and any available description
                return [
                    'logo' => asset($data['logo']),
                    'long_description' => $data['long_description'],
                ];
            } else {
                // Return a default logo or null if no specific handling is desired
                return [
                    'logo' => asset('images/default-logo.png'),
                    'long_description' => '',
                ];
            }
        }
    }
}


if (!function_exists('getCourierServiceData')) {
    function getCourierServiceData($input)
    {
        // Attempt to find the courier's logo and long_description by name
        $courier = Courier::where('preset_id', $input)->orWhere('service_id', $input)->first(['exp_lead_time', 'dropoff', 'pickup']);

        if ($courier) {

            // Retrieve the selected lead time from the request
            $selectedLeadTime = $courier->exp_lead_time;
            if (isset($selectedLeadTime)) {

                // Calculate the date range based on the selected lead time
                $startDate = Carbon::now(); // Start date is today
                $endDate = Carbon::now(); // End date is also today by default
                $exp_time='';
                switch ($selectedLeadTime) {
                    case 'same_day':
                        // End date is the same as the start date (today)
                       
                        $endDate->addDay(2);
                        $exp_time='SAME DAY';
                        break;
                    case 'next_day':
                        // End date is one day ahead of the start date
                        $startDate->addDay();
                        $endDate->addDay(3);
                        $exp_time='NEXT DAY';

                        break;
                    case 'two_day':
                        // End date is two days ahead of the start date
                        $startDate->addDays(2);
                        $endDate->addDays(5);
                        $exp_time='2 DAY';

                        break;
                    case 'two_day_plus':
                        // You can define your custom logic for two day plus
                        // For example, you can add more days to the end date
                        $startDate->addDays(3); // Assuming two days plus means three days total
                        $endDate->addDays(6); // Assuming two days plus means three days total
                        $exp_time='2+ DAY';

                        break;
                    default:
                        // Handle default case
                        break;
                }
                // Format the date range for display
                $formattedStartDate = $startDate->format('l dM');
                $formattedEndDate = $endDate->format('l dM');

                // Return both logo URL and long description
                return [
                    'exp_lead_time' => $exp_time,
                    'start_date' => $formattedStartDate,
                    'end_date' => $formattedEndDate,
                    'dropoff' => $courier->dropoff,
                    'pickup' => $courier->pickup,
                ];
            }
        } else {
            return [
                'exp_lead_time' => '',
                'dropoff' => '',
                'pickup' => '',
            ];
        }
    }
}
