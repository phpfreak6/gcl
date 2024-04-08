<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingTemp;
use App\Http\Controllers\AppBaseController;
use App\Models\Country;
use App\Models\Courier;
use App\Repositories\GetQuoteRepository;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class GetQuoteController extends AppBaseController
{
    /** @var  GetQuoteRepository */
    private $getQuoteRepository;

    public function __construct(GetQuoteRepository $getQuoteRepository)
    {
        $this->getQuoteRepository = $getQuoteRepository;
    }

    public function index(Request $request)
    {
        //Removing data of previous quotes if in session.
        $request->session()->forget('quotes');
        $request->session()->forget('parcels');
        $request->session()->forget('quote_input');

        $countries = Country::all();
        return view('quotes.index', [
            'countries' => $countries,
        ]);
    }

    public function showResult(Request $request)
    {
        $responseData = $request->session()->get('quotes');
        if ($responseData) {
            // dd($responseData);
            return view('quotes.qoute-result', compact('responseData'));
        } else {
            // return redirect()->back();
        }
    }

    public function getQuote(Request $request)
    {

        $packageType = $request->input('package_type');
        $request->session()->put('quote_input', $request->all());
        if ($packageType == 'parcel') {
            return $this->getParcelQuote($request);
        } elseif ($packageType == 'pallet') {
            // return $this->getPalletQuote($request);
            return response()->json(['error' => "No quotes were found for the provided data. We apologize for the inconvenience."], 200);
        }

        return redirect()->back();
    }

    public function getParcelQuote(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'postal' => 'required',
            'dim_length.*' => 'required|numeric',
            'dim_width.*' => 'required|numeric',
            'dim_height.*' => 'required|numeric',
            'dim_unit.*' => 'required',
            'unit_weight.*' => 'required|numeric',
            'weight_unit.*' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        }

        // Prepare the request body
        $parcels = [];

        $dimLength = $request->input('dim_length');
        $dimWidth = $request->input('dim_width');
        $dimHeight = $request->input('dim_height');
        $dimUnit = $request->input('dim_unit');
        $unitWeight = $request->input('unit_weight');
        $weightUnit = $request->input('weight_unit');

        for ($i = 0; $i < count($dimLength); $i++) {
            $parcel = [
                'dim_length' => $dimLength[$i],
                'dim_width' => $dimWidth[$i],
                'dim_height' => $dimHeight[$i],
                'dim_unit' => $dimUnit[$i],
                'items' => [
                    [
                        "description" => "item " . ($i + 1),
                        "sku" => $this->generateRandomOrderId(),
                        'quantity' => 1,
                        'weight' => (int) $unitWeight[$i],
                        'unit_weight' => $unitWeight[$i],
                        'weight_unit' => $weightUnit[$i],
                    ],
                ],
            ];

            $parcels[] = $parcel;
        }

        $response = $this->generateQuotes($parcels, $request);

        // Handle the API response
        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody()->getContents(), true);

            //return $responseData;
            // Process the response data and return the result
            $request->session()->put('parcels', $parcels);
            $request->session()->put('quotes', $responseData);

            return response()->json(['success' => $responseData], $response->getStatusCode());

            // return view('quotes.qoute-result', compact('responseData'));
            //return response()->json(json_decode($responseData));
        } else {
            // Handle the API error response
            $errorResponse = $response->getBody()->getContents();
            return response()->json(['error' => $errorResponse], $response->getStatusCode());
        }
    }
    public function getPalletQuote(Request $request)
    {

        // return $request->all();
        // Validate the request
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'postal' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        }

        // Prepare the request body
        $parcels = [];

        if (!empty($request->input('micro_dim_quantity'))) {
            $parcels[] = [

                'dim_length' => '100',
                'dim_width' => '120',
                'dim_height' => '60',
                'dim_unit' => 'cm',
                'items' => [
                    [
                        "description" => "mirco pallet",
                        "sku" => $this->generateRandomOrderId(),
                        'quantity' => (int) $request->input('micro_dim_quantity'),
                        'weight' => (int) $request->input('micro_dim_weight'),
                        'unit_weight' => $request->input('micro_dim_weight'),
                        'weight_unit' => 'kg',
                    ],
                ],

            ];
        }
        if (!empty($request->input('medium_dim_quantity'))) {
            $parcels[] = [

                'dim_length' => '120',
                'dim_width' => '100',
                'dim_height' => '60',
                'dim_unit' => 'cm',
                'items' => [
                    [
                        "description" => "medium pallet",
                        "sku" => $this->generateRandomOrderId(),
                        'quantity' => (int) $request->input('medium_dim_quantity'),
                        'weight' => (int) $request->input('medium_dim_weight'),
                        'unit_weight' => $request->input('medium_dim_weight'),
                        'weight_unit' => 'kg',
                    ],
                ],

            ];
        }
        if (!empty($request->input('large_dim_quantity'))) {
            $parcels[] =
                [
                    'dim_length' => '120',
                    'dim_width' => '100',
                    'dim_height' => '60',
                    'dim_unit' => 'cm',
                    'items' => [
                        [
                            "description" => "large pallet",
                            "sku" => $this->generateRandomOrderId(),
                            'quantity' => (int) $request->input('large_dim_quantity'),
                            'weight' => (int) $request->input('large_dim_weight'),
                            'unit_weight' => $request->input('large_dim_weight'),
                            'weight_unit' => 'kg',
                        ],
                    ],
                    'items' => [
                        [],
                    ],
                ];
        }
        if (!empty($request->input('custom_dim_quantity'))) {
            $parcels[] =
                [
                    'dim_length' => $request->input('custom_dim_length'),
                    'dim_width' => $request->input('custom_dim_width'),
                    'dim_height' => $request->input('custom_dim_height'),
                    'dim_unit' => 'cm',
                    'items' => [
                        [
                            "description" => "custom pallet",
                            "sku" => $this->generateRandomOrderId(),
                            'quantity' => (int) $request->input('custom_dim_quantity'),
                            'weight' => (int) $request->input('custom_dim_weight'),
                            'unit_weight' => $request->input('custom_dim_weight'),
                            'weight_unit' => 'kg',
                        ],
                    ],
                ];
        }

        $response = $this->generateQuotes($parcels, $request);
        // Handle the API response
        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody()->getContents(), true);
            // Process the response data and return the result
            $request->session()->put('parcels', $parcels);

            $request->session()->put('quotes', $responseData);

            return response()->json(['success' => $responseData], $response->getStatusCode());

            //return response()->json(json_decode($responseData));
        } else {
            // Handle the API error response
            $errorResponse = $response->getBody()->getContents();
            return response()->json(['error' => $errorResponse], $response->getStatusCode());
        }
    }

    public function generateQuotes($parcels, $request)
    {
        $request->session()->forget('parcels');
        $request->session()->forget('quotes');
        $requestBody = [
            'shipment' => [
                'order_id' => $this->generateRandomOrderId(),
                'ship_to' => [
                    'name' => '',
                    'postcode' => $request->input('postal'),
                    'country_iso' => $request->input('country'),
                ],
                'parcels' => $parcels,
                'customer_dc_id' => auth()->user()->dcID,
                'despatch_date' => now()->toISOString(),
            ],
        ];

        // Make the API call
        $client = new Client;
        $response = $client->post('https://production.billingapi.co.uk/api/get-quote', [
            'headers' => [
                // 'Authorization' => 'Bearer ' . env('BILLINGAPI_TOKEN'),
                'Authorization' => 'Bearer ' . 'IBSQr2rihrBYnRnN', //use env variable letter
                'Content-Type' => 'application/json',
            ],
            'json' => $requestBody,
        ]);
        // $request->session()->put('parcels', $parcels);

        return $response;
    }

    // Generate a random order ID
    private function generateRandomOrderId()
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $orderId = '';

        for ($i = 0; $i < 10; $i++) {
            $orderId .= $chars[rand(0, strlen($chars) - 1)];
        }

        return $orderId;
    }

    public function saveBooking(Request $request)
    {

        if (empty($request->session('parcels'))) {

            return redirect('/quotes');
        }
        try {

            $dateTime = $request->input('datepicker');
            $presetId = $request->input('preset_id');
            $courierName = $request->input('courier');
            $courierPrice = $request->input('courier_price');

            // Parse the datetime input into a Carbon instance
            $carbonDateTime = Carbon::parse($dateTime);

            // Extract date and time components
            $date = $carbonDateTime->toDateString(); // Gets the date in Y-m-d format
            $time = $carbonDateTime->toTimeString(); // Gets the time in H:i:s format

            ///Saving a data of booking/lable in database
            $bookingtemp = new BookingTemp([
                "user_id" => Auth::User()->id,
                "description" => $request->input('description'),
                "email" => $request->input('email'),

                "origin_phone" => $request->input('origin_contact_phone'),
                "origin_email" => $request->input('origin_contact_email'),
                "origin_contact_name" => $request->input('origin_contact_name'),
                "origin_name" => $request->input('origin_name'),
                "origin_address_1" => $request->input('origin_address_1'),
                "origin_address_2" => $request->input('origin_address_2'),
                "origin_city" => $request->input('origin_city'),
                "origin_postal" => $request->input('origin_postal'),
                "origin_country" => $request->input('origin_country'),

                "destination_phone" => $request->input('ship_to_phone'),
                "destination_email" => $request->input('ship_to_email'),
                "destination_contact_name" => $request->input('ship_to_reference'),
                "destination_name" => $request->input('ship_to_name'),
                "destination_address_1" => $request->input('ship_to_address_1'),
                "destination_address_2" => $request->input('ship_to_address_2'),
                "destination_city" => $request->input('ship_to_city'),
                "destination_postal" => $request->input('postal'),
                "destination_country" => $request->input('country'),

                "collection_note" => $request->input('collection_note'),
                "delivery_instructions" => $request->input('delivery_instructions'),

            ]);
            // $bookingtemp->save();
            if ($bookingtemp->save()) {

                return view('quotes.generate-label', compact('date', 'time', 'presetId', 'courierName', 'courierPrice', 'bookingtemp'));
            } else {

                return redirect()->back()->withErrors('Some problem')->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function editBooking(Request $request)
    {
        if (empty($request->session('parcels'))) {
            return redirect('/quotes');
        }

        try {
            // Get the booking ID from the request
            $bookingId = $request->input('booking_id');

            // Find the booking record to update
            $bookingtemp = BookingTemp::findOrFail($bookingId);

            $presetId = $request->input('preset_id');
            $courierName = $request->input('courier');
            $courierPrice = $request->input('courier_price');
            $date = $request->input('shipt_to_collection_date'); // Gets the date in Y-m-d format
            $time = $request->input('shipt_to_collection_time'); // Gets the time in H:i:s format

            // Update the booking data
            $bookingtemp->description = $request->input('description');
            $bookingtemp->email = $request->input('email');
            $bookingtemp->origin_phone = $request->input('origin_contact_phone');
            $bookingtemp->origin_email = $request->input('origin_contact_email');
            $bookingtemp->origin_contact_name = $request->input('origin_contact_name');
            $bookingtemp->origin_name = $request->input('origin_name');
            $bookingtemp->origin_address_1 = $request->input('origin_address_1');
            $bookingtemp->origin_address_2 = $request->input('origin_address_2');
            $bookingtemp->origin_city = $request->input('origin_city');
            $bookingtemp->origin_postal = $request->input('origin_postal');
            $bookingtemp->origin_country = $request->input('origin_country');
            $bookingtemp->destination_phone = $request->input('ship_to_phone');
            $bookingtemp->destination_email = $request->input('ship_to_email');
            $bookingtemp->destination_contact_name = $request->input('ship_to_reference');
            $bookingtemp->destination_name = $request->input('ship_to_name');
            $bookingtemp->destination_address_1 = $request->input('ship_to_address_1');
            $bookingtemp->destination_address_2 = $request->input('ship_to_address_2');
            $bookingtemp->destination_city = $request->input('ship_to_city');
            $bookingtemp->destination_postal = $request->input('postal');
            $bookingtemp->destination_country = $request->input('country');
            $bookingtemp->collection_note = $request->input('collection_note');
            $bookingtemp->delivery_instructions = $request->input('delivery_instructions');

            // Save the updated booking data
            if ($bookingtemp->save()) {
                // Redirect to a success page or return a view
                return view('quotes.generate-label', compact('date', 'time', 'presetId', 'courierName', 'courierPrice', 'bookingtemp'));
            } else {
                // Handle error if the update fails
                return redirect()->back()->withErrors('Some problem occurred while updating booking')->withInput();
            }
        } catch (Exception $e) {
            // Handle any exceptions
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function editBookingView(Request $request)
    {
        if (empty($request->session()->get('quote_input'))) {
            return redirect('/quotes');
        }

        $date = $request->input('shipt_to_collection_date');
        $time = $request->input('shipt_to_collection_time');
        $presetId = $request->input('preset_id');
        $courierName = $request->input('courier');
        $courierPrice = $request->input('courier_price');
        $id = $request->input('id');

        $bookingtemp = BookingTemp::where('id', $id)->first();
        // Pass $date and $time to the view
        return view('quotes.edit-address', compact('date', 'time', 'presetId', 'courierName', 'courierPrice', 'bookingtemp'));
    }

    public function generateLabel(Request $request)
    {

        if (empty($request->session('parcels'))) {

            return redirect('/quotes');
        }
        try {

            $parcels = $parcels = $request->session()->get('parcels', []);

            $courier_price = $request->input('courier_price');
            $price = $courier_price / count($parcels[0]['items']);
            $currency = 'EUR';

            foreach ($parcels as &$package) {
                foreach ($package['items'] as &$item) {
                    $item['value'] = $price;
                    $item['value_currency'] = $currency;
                }
            }

            // Validate the request
            $validator = Validator::make($request->all(), [
                'country' => 'required',
                'postal' => 'required',
                'origin_postal' => 'required',
                'origin_country' => 'required',
                'origin_name' => 'required',
                'origin_city' => 'required',
                'origin_address_1' => 'required',
                'origin_contact_name' => 'required',
                'origin_contact_phone' => 'required',
                'origin_contact_email' => 'required',

                // 'dim_length.*' => 'required|numeric',
                // 'dim_width.*' => 'required|numeric',
                // 'dim_height.*' => 'required|numeric',
                // 'dim_unit.*' => 'required',
                // 'unit_weight.*' => 'required|numeric',
                // 'weight_unit.*' => 'required',

                'shipt_to_collection_date' => 'required',
                'shipt_to_collection_time' => 'required',
                'ship_to_name' => 'required',
                'ship_to_phone' => 'required',
                'ship_to_email' => 'required',
                'ship_to_address_1' => 'required',
                'ship_to_city' => 'required',
                'ship_to_reference' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // return $errors;
                return response()->json(['errors' => $errors], 422);
            }

            // prepare required fields as per selected Courier
            $courier_service = Courier::with('parentCourier')
                ->where('service_id', $request->input('preset_id'))
                ->orWhere('preset_id', $request->input('preset_id'))
                ->first();

            $courier = $request->input('courier');
            // $selectedQuote = $this->getSelectedQuote($request, $request->input('preset_id'), $courier);
            // dd($selectedQuote);
            $courier_req = [];
            if ($courier_service && $courier) {

                $courier = str_replace(' ', '', $courier);
                if ($courier == 'DHL') {
                    $courier_req = [
                        "global_product_code" => $courier_service->global_product_code,

                    ];
                } else if ($courier == 'DHL ParcelUK') {
                    $courier_req = [
                        "service_key" => $courier_service->service_key,
                    ];
                } else if ($courier == 'PalletWays') {
                    $courier_req = [
                        "service_code" => $courier_service->service_code,
                        "service_surcharge" => $courier_service->service_surcharge,
                    ];
                }
            } else {
                $courier = str_replace(' ', '', $courier);
                $courier_req = [
                    "service_code" => $courier_service->service_code,
                    "service_key" => $courier_service->service_key,
                    "service_surcharge" => $courier_service->service_surcharge,
                    "global_product_code" => $courier_service->global_product_code,
                ];
                // return response()->json(['error' => "Something went wrong!"], 422);
            }
            if ($courier == 'DXExpress') {
                $courier = $courier_service->parentCourier->courier_name;
            }
            // prepare ship from and to address
            $ship_from = [
                "name" => $request->input('origin_contact_name'),
                "phone" => $request->input('origin_contact_phone'),
                "email" => $request->input('origin_contact_email'),
                "company_name" => $request->input('origin_name'),
                "address_1" => $request->input('origin_address_1'),
                "address_2" => $request->input('origin_address_2'),
                "city" => $request->input('origin_city'),
                "postcode" => $request->input('origin_postal'),
                "county" => "",
                "country_iso" => $request->input('origin_country'),
            ];
            $ship_to = [
                "name" => $request->input('ship_to_reference'),
                "phone" => $request->input('ship_to_phone'),
                "email" => $request->input('ship_to_email'),
                "company_name" => $request->input('ship_to_name'),
                "address_1" => $request->input('ship_to_address_1'),
                "address_2" => $request->input('ship_to_address_2'),
                "city" => $request->input('ship_to_city'),
                "postcode" => $request->input('postal'),
                "county" => "",
                "country_iso" => $request->input('country'),
            ];

            // collection date
            $dateTimeString = $request->input('shipt_to_collection_date') . ' ' . $request->input('shipt_to_collection_time');
            $collectionDateTime = new DateTime($dateTimeString);
            $collectionDateTime = $collectionDateTime->format('Y-m-d\TH:i:s.u\Z');

            $latestBookingId = Booking::latest('id')->first()->id ?? 0;
            $nextBookingId = $latestBookingId + 1;

            // Format the next booking ID as needed
            $formattedNextBookingId = str_pad($nextBookingId, 4, '0', STR_PAD_LEFT);
            $reference = Auth::user()->user_code ? Auth::user()->user_code : "SH-" . Auth::user()->id;
            $reference .= "-" . $formattedNextBookingId;

            $requestBody = [
                // 'auth_company' => env('AUTH_COMPANY'),
                'testing' => false,
                'auth_company' => $courier_service->parentCourier->auth_company,
                'format_address_default' => true,
                'shipment' => [
                    "dc_service_id" => $courier_service->service_id ?? $request->input('preset_id'),
                    "label_size" => "10x4",
                    "label_format" => "pdf",
                    "generate_invoice" => false,
                    "generate_packing_slip" => false,
                    "courier" => $courier_req,
                    "reference" => $reference,
                    'delivery_instructions' => $request->input('delivery_instructions') ?? " ",
                    'collection_date' => $collectionDateTime,
                    'ship_from' => $ship_from,
                    'ship_to' => $ship_to,
                    'parcels' => $parcels,
                ],
            ];

            //return $requestBody;
            // Make the API call
            $client = new Client;
            $response = $client->post('https://production.courierapi.co.uk/api/couriers/v1/' . $courier . '/create-label', [
                'headers' => [
                    // 'api-user' => env("COURIERAPI_USER"),
                    'api-user' => "GCL Courier Accounts",
                    // 'api-token' => env("COURIERAPI_TOKEN"),
                    'api-token' => "cwqpnhmjtrvbyafs",
                    'Content-Type' => 'application/json',
                ],
                'json' => $requestBody,
            ]);

            list($totalWeight, $totalQuantity) = $this->calculateTotalWeightAndQuantity($parcels);
            $selectedQuote = $this->getSelectedQuote($request, $request->input('preset_id'), $request->input('courier'));
            // Handle the API response

            if ($response->getStatusCode() === 200) {
                $responseData = $response->getBody()->getContents();
                $result = json_decode($responseData);

                $vat_price = $selectedQuote['price']['total'] * 0.20;
                ///Saving a data of booking/lable in database
                $booking = new Booking([
                    "user_id" => Auth::User()->id,
                    "origin_phone" => $request->input('origin_contact_phone'),
                    "origin_email" => $request->input('origin_contact_email'),
                    "origin_name" => $request->input('origin_contact_name'),
                    "origin_company" => $request->input('origin_name'),
                    "origin_address" => $request->input('origin_address_1') . ' ' . $request->input('origin_address_2'),
                    "origin_city" => $request->input('origin_city'),
                    "origin_postal" => $request->input('origin_postal'),
                    "origin_country" => $request->input('origin_country'),

                    "destination_phone" => $request->input('ship_to_phone'),
                    "destination_email" => $request->input('ship_to_email'),
                    "destination_name" => $request->input('ship_to_reference'),
                    "destination_company" => $request->input('ship_to_name'),
                    "destination_address" => $request->input('ship_to_address_1') . ' ' . $request->input('ship_to_address_1'),
                    "destination_city" => $request->input('ship_to_city'),
                    "destination_postal" => $request->input('postal'),
                    "destination_country" => $request->input('country'),

                    'total_weight' => $totalWeight,
                    'total_items' => $totalQuantity,
                    'vat_price' => $vat_price,
                    'shipping_price' => $selectedQuote['price']['total'],
                    'total_price' => $selectedQuote['price']['total'] + $vat_price,
                    'service_code' => $selectedQuote['service_code'],
                    'type' => $result->type,
                    'tracking_codes' => $result->tracking_codes[0],
                    'tracking_urls' => $result->tracking_urls[0],
                    'uri' => $this->downloadAndSavePdf($result->uri),
                    'key' => $result->key,
                    'tracking_request_id' => $result->tracking_request_id,
                    'tracking_request_hash' => $result->tracking_request_hash,
                    'label_size' => $result->label_size,
                    'courier' => $result->courier,
                    'dc_service_id' => $result->dc_service_id ?? null,
                    'dc_request_id' => $result->dc_request_id ?? null,

                    // 'terms' => $request->input('terms'),
                    // 'payment_gateway' => $request->input('payment_gateway'),
                ]);
                $booking->save();
                return response()->json(json_decode($responseData));
            } else {
                // Handle the API error response
                $errorResponse = $response->getBody()->getContents();
                return response()->json(['error' => $response], $response->getStatusCode());
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function downloadAndSavePdf($pdfUrl)
    {
        $savePath = public_path('lables_pdf');

        // Ensure the directory exists
        if (!file_exists($savePath)) {
            mkdir($savePath, 0755, true);
        }

        // Use Guzzle to download the PDF
        $client = new Client();
        $response = $client->get($pdfUrl);

        // Extract the filename from the URL
        $originalFilename = pathinfo("quote-lable", PATHINFO_BASENAME);

        // Append a timestamp to the filename to make it unique
        $filename = $originalFilename . '_' . now()->format('YmdHis');

        // Save the PDF locally
        $filePath = $savePath . '/' . $filename . ".pdf";
        file_put_contents($filePath, $response->getBody());

        return "lables_pdf/" . $filename . ".pdf";
    }

    public function generateQuoteSummary(Request $request)
    {

        // Retrieve session values which we generated in the generateQuotes function
        $parcels = $request->session()->get('parcels', []);
        $quotes = $request->session()->get('quotes', []);

        $service_code = $request->input('service_code');
        $courier = $request->input('courier');

        $selectedQuote = $this->getSelectedQuote($request, $service_code, $courier);

        list($totalWeight, $totalQuantity) = $this->calculateTotalWeightAndQuantity($parcels);

        // Check if parcels and quotes are empty or non-existent
        if (empty($parcels) || empty($quotes)) {
            // If parcels or quotes are empty, redirect back
            return redirect('/quotes')->with('error', 'Parcels or quotes are empty.');
        }

        // If parcels and quotes are not empty, return the view
        return view('quotes.summary', compact('parcels', 'totalWeight', 'totalQuantity', 'selectedQuote'));
    }

    private function calculateTotalWeightAndQuantity($parcels)
    {
        $totalWeight = 0;
        $totalQuantity = 0;

        // Iterate through parcels array to calculate total weight and total quantity
        foreach ($parcels as $parcel) {
            // Calculate total weight
            foreach ($parcel['items'] as $item) {
                $totalWeight += $item['quantity'] * $item['weight'];
            }

            // Calculate total quantity
            foreach ($parcel['items'] as $item) {
                $totalQuantity += $item['quantity'];
            }
        }

        return [$totalWeight, $totalQuantity];
    }
    public function getSelectedQuote(Request $request, $serviceCode, $courier)
    {

        // Retrieve session values which we generated in the generateQuotes function
        $quotes = $request->session()->get('quotes', []);

        // Search for the quote based on service_code and courier
        $filteredQuotes = array_filter($quotes, function ($quote) use ($serviceCode, $courier) {
            return $quote['service_code'] === $serviceCode && $quote['courier'] === $courier;
        });

        // If a matching quote is found, $filteredQuotes will contain the matched quote(s)
        if (!empty($filteredQuotes)) {
            $selectedQuote = reset($filteredQuotes); // Get the first matching quote
            return $selectedQuote;
        } else {
            return redirect('/quotes')->with('error', 'Selected quote not found.');
        }
    }
    public function getAddress(Request $request)
    {
        if (empty($request->session()->get('quote_input'))) {
            return redirect('/quotes');
        }

        $dateTime = $request->input('datepicker');
        $presetId = $request->input('preset_id');
        $courierName = $request->input('courier');
        $courierPrice = $request->input('courier_price');

        // Parse the datetime input into a Carbon instance
        $carbonDateTime = Carbon::parse($dateTime);

        // Extract date and time components
        $date = $carbonDateTime->toDateString(); // Gets the date in Y-m-d format
        $time = $carbonDateTime->toTimeString(); // Gets the time in H:i:s format

        // Pass $date and $time to the view
        return view('quotes.get-address', compact('date', 'time', 'presetId', 'courierName', 'courierPrice'));
    }

    public function getPostCode($postcode)
    {

        // Initialize Guzzle client
        $client = new Client();
        // Make the API request
        try {
            $response = $client->request('GET', 'https://api.postcodes.io/postcodes/' . $postcode);
            $postcodeData = json_decode($response->getBody(), true);
            // Process the postcode data as needed
            return response()->json($postcodeData);
        } catch (\Exception $e) {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch postcode data'], 500);
        }
    }
}
