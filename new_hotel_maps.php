<?php
/**
 * Template Name: New Hotel Search with Map
 * Description: Responsive hotel search with API integration
 */

if (!defined('ABSPATH')) {
    exit;
}

// ================= AJAX HANDLER =================
if (
    isset($_POST['hotel_search_action']) &&
    $_POST['hotel_search_action'] === 'fetch_hotels'
) {

    $api_key  = '1e8234c861f59b71091515efa946ed32';
    $secret   = '4c2cf69797';
    $endpoint = 'https://api.test.hotelbeds.com/hotel-api/1.0/hotels';

    $timestamp = time();
    $signature = hash('sha256', $api_key . $secret . $timestamp);

    $checkin     = sanitize_text_field($_POST['checkin'] ?? '2025-12-28');
    $checkout    = sanitize_text_field($_POST['checkout'] ?? '2025-12-30');
    $destination = sanitize_text_field($_POST['destination'] ?? 'MAD');

    $request_body = [
        'stay' => [
            'checkIn'  => $checkin,
            'checkOut' => $checkout,
        ],
        'occupancies' => [[
            'rooms'   => 1,
            'adults'  => 2,
            'children'=> 0,
        ]],
        'destination' => [
            'code' => $destination,
        ],
    ];

    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Api-key: ' . $api_key,
            'X-Signature: ' . $signature,
        ],
        CURLOPT_POSTFIELDS     => json_encode($request_body),
        CURLOPT_TIMEOUT        => 30,
    ]);

    $response  = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    header('Content-Type: application/json');
    echo $http_code === 200
        ? $response
        : json_encode(['error' => 'API request failed', 'code' => $http_code]);

    exit;
}

get_header();
?>

<main class="w-full">

    <!-- ================= SEARCH BAR ================= -->
    <section class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-end">

                <!-- Destination -->
                <div class="w-full lg:w-1/3">
                    <label class="block text-sm font-semibold mb-2">
                        Destination
                    </label>
                    <input
                        type="text"
                        id="destination-input"
                        value="MAD"
                        placeholder="Where are you going?"
                        class="w-full border rounded-lg px-4 py-3 text-lg font-medium focus:outline-none focus:ring-2 focus:ring-green-400"
                    />
                </div>

                <!-- Dates -->
                <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-1/3">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold mb-2">
                            Check-in
                        </label>
                        <input
                            type="date"
                            id="checkin-date"
                            value="2025-12-28"
                            class="w-full border rounded-lg px-4 py-3 text-lg font-medium"
                        />
                    </div>

                    <div class="flex-1">
                        <label class="block text-sm font-semibold mb-2">
                            Check-out
                        </label>
                        <input
                            type="date"
                            id="checkout-date"
                            value="2025-12-30"
                            class="w-full border rounded-lg px-4 py-3 text-lg font-medium"
                        />
                    </div>
                </div>

                <!-- Guests + Button -->
                
                    <div class="flex-1 pl-2">
                        <label class="block text-sm font-semibold mb-2">
                            Guests
                        </label>
                        <input
                            type="text"
                            id="adults_child"
                            placeholder="2 Adults, 0 Children"
                            class="w-full border rounded-lg px-4 py-3 text-lg font-medium"
                        />
                    </div>

                    
              
                <button class="p-4 bg-green-500 rounded-md text">Search</button>

            </div>
        </div>
    </section>

    <!-- ================= RESULTS + MAP ================= -->
    <section class="max-w-7xl mx-auto px-4 pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Hotel List -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6 min-h-[400px]">
                <h2 class="text-xl font-bold mb-4">
                    Available Hotels
                </h2>
                <div id="hotel-results" class="space-y-4 text-gray-500">
                    Search results will appear here.
                </div>
            </div>

            <!-- Map -->
            <div class="bg-white rounded-2xl shadow p-6 min-h-[400px]">
                <h2 class="text-xl font-bold mb-4">
                    Map View
                </h2>
                <div class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                    Map placeholder
                </div>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
