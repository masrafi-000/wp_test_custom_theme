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
            'children' => 0,
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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="w-full">

        <!-- ================= SEARCH BAR ================= -->
        <section class="px-4 py-4">
            <!-- SEARCH SECTION -->
            <div class="bg-white shadow-lg rounded-2xl p-6 mb-8">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-end">
                    <!-- Destination -->
                    <div class="w-full lg:w-1/3">
                        <label class="block text-sm font-semibold mb-2">Destination</label>
                        <input type="text" id="destination-input" value="MAD" placeholder="Where are you going?" class="w-full border rounded-lg px-4 py-3 text-lg font-medium focus:outline-none focus:ring-2 focus:ring-green-400" />
                    </div>
                    <!-- Dates -->
                    <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-1/3">
                        <div class="flex-1">
                            <label class="block text-sm font-semibold mb-2">Check-in</label>
                            <input type="date" id="checkin-date" value="2025-12-28" class="w-full border rounded-lg px-4 py-3 text-lg font-medium" />
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-semibold mb-2">Check-out</label>
                            <input type="date" id="checkout-date" value="2025-12-30" class="w-full border rounded-lg px-4 py-3 text-lg font-medium" />
                        </div>
                    </div>
                    <!-- Guests -->
                    <div class="flex-1 pl-2">
                        <label class="block text-sm font-semibold mb-2">Guests And Rooms</label>
                        <input type="text" id="adults_child" placeholder="2 Adults, 1 Room" class="w-full border rounded-lg px-4 py-3 text-lg font-medium" />
                    </div>
                    <!-- Search Button -->
                    <button id="search-btn" class="p-4 bg-green-500 rounded-md text-white font-bold hover:bg-green-600 transition">Search</button>
                </div>
                <hr class="my-6">

                <!-- FILTER BAR -->
                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center gap-4 flex-wrap">

                        <!-- Sort by -->
                        <div class="relative dropdown-container">
                            <button onclick="toggleDropdown('sort-dropdown')" class="w-full flex items-center justify-between px-4 py-2 border border-gray-300 rounded-lg hover:border-gray-400 transition bg-white text-gray-700 text-sm font-medium">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                    </svg>
                                    Sort by
                                </span>
                                <svg class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="sort-dropdown" class="dropdown-menu hidden absolute left-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-20">
                                <button onclick="sortHotels('price-asc')" class="block w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700">Price: Low to High</button>
                                <button onclick="sortHotels('price-desc')" class="block w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700">Price: High to Low</button>
                                <button onclick="sortHotels('rating-desc')" class="block w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700">Rating: High to Low</button>
                            </div>
                        </div>

                        <!-- Hotel Name Search -->
                        <div class="relative">
                            <input type="text" id="name-filter" placeholder="Hotel Name" class="w-full px-4 py-2 border border-gray-300 rounded-lg hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-sm">
                        </div>

                        <!-- Price Range -->
                        <div class="relative dropdown-container">
                            <button onclick="toggleDropdown('price-dropdown')" class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white text-sm font-medium">
                                Price Range <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="price-dropdown" class="dropdown-menu hidden absolute left-0 mt-2 w-56 bg-white border border-gray-300 rounded-lg shadow-lg z-20 p-4">
                                <div class="space-y-3">
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox price-check" value="0-100"> <span class="text-sm">Under $100</span></label>
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox price-check" value="100-250"> <span class="text-sm">$100 - $250</span></label>
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox price-check" value="250-500"> <span class="text-sm">$250 - $500</span></label>
                                </div>
                            </div>
                        </div>

                        <!-- Star Rating -->
                        <div class="relative dropdown-container">
                            <button onclick="toggleDropdown('star-dropdown')" class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white text-sm font-medium">
                                Star Rating <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="star-dropdown" class="dropdown-menu hidden absolute left-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-20 p-4">
                                <div class="space-y-3">
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox star-check" value="5"> <span class="text-sm">⭐⭐⭐⭐⭐ 5 Stars</span></label>
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox star-check" value="4"> <span class="text-sm">⭐⭐⭐⭐ 4 Stars</span></label>
                                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-checkbox star-check" value="3"> <span class="text-sm">⭐⭐⭐ 3 Stars</span></label>
                                </div>
                            </div>
                        </div>

                        <!-- Clear Filter Button -->
                        <button onclick="resetFilters()" class="px-4 py-2 text-red-500 text-sm font-medium hover:bg-red-50 rounded-lg">Reset</button>
                    </div>
                </div>
            </div>


        </section>


        <!-- ================= RESULTS + MAP ================= -->
        <section class="px-4 pb-16 h-screen flex gap-4 ">

            <!-- Left: Hotel List -->
            <div class="w-1/2 bg-white rounded-2xl shadow  flex flex-col overflow-y-auto">

                <h2 class="text-xl font-bold sticky top-0 bg-gray-300 z-10 p-4">
                    Available Hotels
                </h2>

                <div
                    id="results-container"
                    class="flex-1 grid grid-cols-1 gap-6 px-6 py-4"></div>

            </div>

            <!-- Right: Map -->

            <div id="map" class="flex-1 border shadow-2xl rounded-md"></div>


        </section>


    </main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);


    var markers = locations.map(loc => 
        L.marker([loc.lat, loc.lng])
         .bindPopup(`<b>${loc.title}</b><br>Lat: ${loc.lat}, Lng: ${loc.lng}`)
    );
    
    var group = L.featureGroup(markers).addTo(map)
    map.fitBounds(group.getBounds())


});
</script>
    

    <script>
        // ১. Mock Data (নমুনা ডাটাবেস)
        const hotels = [{
                id: 1,
                name: "Grand Madrid Hotel",
                price: 150,
                rating: 8.5,
                stars: 5,
                image: "https://via.placeholder.com/400x250?text=Grand+Hotel"
            },
            {
                id: 2,
                name: "City Backpackers",
                price: 50,
                rating: 7.2,
                stars: 2,
                image: "https://via.placeholder.com/400x250?text=Backpackers"
            },
            {
                id: 3,
                name: "Luxury Palace",
                price: 300,
                rating: 9.5,
                stars: 5,
                image: "https://via.placeholder.com/400x250?text=Luxury"
            },
            {
                id: 4,
                name: "Comfort Inn",
                price: 120,
                rating: 8.0,
                stars: 3,
                image: "https://via.placeholder.com/400x250?text=Comfort"
            },
            {
                id: 5,
                name: "Budget Stay",
                price: 80,
                rating: 6.5,
                stars: 3,
                image: "https://via.placeholder.com/400x250?text=Budget"
            },
            {
                id: 6,
                name: "Royal Suite",
                price: 450,
                rating: 9.8,
                stars: 5,
                image: "https://via.placeholder.com/400x250?text=Royal"
            },
        ];

        let currentHotels = [...hotels]; // বর্তমানে যা দেখানো হচ্ছে

        // ২. Dropdown Toggle Logic (Hover সমস্যা সমাধান)
        function toggleDropdown(id) {
            // সব ড্রপডাউন আগে বন্ধ করি
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu.id !== id) menu.classList.add('hidden');
            });
            // নির্দিষ্ট ড্রপডাউনটি টগল করি
            const menu = document.getElementById(id);
            menu.classList.toggle('hidden');
        }

        // উইন্ডোতে অন্য কোথাও ক্লিক করলে ড্রপডাউন বন্ধ হবে
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-container')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });

        // ৩. Rendering Function (কার্ড দেখানোর ফাংশন)
        function renderHotels(data) {
            const container = document.getElementById('results-container');
            container.innerHTML = "";

            if (data.length === 0) {
                container.innerHTML = `<p class="text-gray-500 text-center col-span-full py-10">No hotels found matching your criteria.</p>`;
                return;
            }

            data.forEach(hotel => {
                const html = `
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="${hotel.image}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-bold text-gray-800">${hotel.name}</h3>
                                <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded">${hotel.rating}</span>
                            </div>
                            <div class="text-yellow-400 text-sm mt-1">
                                ${'★'.repeat(hotel.stars)}${'☆'.repeat(5 - hotel.stars)}
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-gray-500 text-sm">per night</span>
                                <span class="text-xl font-bold text-green-600">$${hotel.price}</span>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += html;
            });
        }

        // ৪. Filtering Logic (ফিল্টার লজিক)
        function applyFilters() {
            let filtered = hotels;

            // Name Search
            const nameQuery = document.getElementById('name-filter').value.toLowerCase();
            if (nameQuery) {
                filtered = filtered.filter(h => h.name.toLowerCase().includes(nameQuery));
            }

            // Price Filter
            const priceCheckboxes = document.querySelectorAll('.price-check:checked');
            if (priceCheckboxes.length > 0) {
                filtered = filtered.filter(h => {
                    return Array.from(priceCheckboxes).some(cb => {
                        const [min, max] = cb.value.split('-').map(Number);
                        return h.price >= min && h.price <= max;
                    });
                });
            }

            // Star Filter
            const starCheckboxes = document.querySelectorAll('.star-check:checked');
            if (starCheckboxes.length > 0) {
                const stars = Array.from(starCheckboxes).map(cb => Number(cb.value));
                filtered = filtered.filter(h => stars.includes(h.stars));
            }

            currentHotels = filtered;
            renderHotels(filtered);
        }

        // ৫. Sorting Logic
        function sortHotels(criteria) {
            let sorted = [...currentHotels];
            if (criteria === 'price-asc') sorted.sort((a, b) => a.price - b.price);
            if (criteria === 'price-desc') sorted.sort((a, b) => b.price - a.price);
            if (criteria === 'rating-desc') sorted.sort((a, b) => b.rating - a.rating);

            currentHotels = sorted;
            renderHotels(sorted);
            document.getElementById('sort-dropdown').classList.add('hidden'); // Close dropdown
        }

        function resetFilters() {
            // Uncheck all boxes
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
            document.getElementById('name-filter').value = "";
            currentHotels = [...hotels];
            renderHotels(hotels);
        }

        // ৬. Event Listeners (ইভেন্ট যোগ করা)
        document.querySelectorAll('.filter-checkbox').forEach(cb => {
            cb.addEventListener('change', applyFilters);
        });

        document.getElementById('name-filter').addEventListener('input', applyFilters);

        // প্রথমবার পেজ লোড হলে সব দেখাবে
        renderHotels(hotels);



        document.addEventListener('DOMContentLoaded', function() {
            let hotelsData = [];
            let map = null;
            let markers = [];

            // Initialize Map
            function initMap() {
                const mapElement = document.getElementById('hotel-map');
                if (!mapElement) {
                    console.error('Map element not found');
                    return;
                }

                try {
                    map = L.map('hotel-map').setView([40.4168, -3.7038], 12);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap',
                        maxZoom: 19
                    }).addTo(map);
                } catch (e) {
                    console.error('Map initialization error:', e);
                }
            }

            // Fetch Hotels
            async function fetchHotels() {
                const container = document.getElementById('hotels-list');
                const btn = document.getElementById('search-hotels-btn');

                if (!container) return;

                container.innerHTML = `
                    <div class="loading-state">
                        <div class="spinner"></div>
                        <p>Loading hotels...</p>
                    </div>
                `;

                if (btn) btn.disabled = true;

                try {
                    const formData = new FormData();
                    formData.append('hotel_search_action', 'fetch_hotels');
                    formData.append('checkin', document.getElementById('checkin-date').value);
                    formData.append('checkout', document.getElementById('checkout-date').value);
                    formData.append('destination', document.getElementById('destination-input').value);

                    const response = await fetch(window.location.href, {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const data = await response.json();

                    if (data.error) {
                        throw new Error(data.error);
                    }

                    hotelsData = data.hotels?.hotels || [];

                    if (hotelsData.length === 0) {
                        container.innerHTML = '<div style="padding: 40px; text-align: center;"><h3>😕 No hotels found</h3></div>';
                        return;
                    }

                    displayHotels(hotelsData);
                    displayMarkersOnMap(hotelsData);

                } catch (error) {
                    console.error('Error:', error);
                    container.innerHTML = `
                        <div style="padding: 40px; text-align: center;">
                            <h3 style="color: #e53e3e; margin-bottom: 12px;">❌ Error Loading Hotels</h3>
                            <p style="color: var(--text-secondary);">${error.message}</p>
                            <button class="search-btn" style="margin-top: 16px;" onclick="window.location.reload()">🔄 Retry</button>
                        </div>
                    `;
                } finally {
                    if (btn) btn.disabled = false;
                }
            }

            // Display Hotels
            function displayHotels(hotels) {
                const container = document.getElementById('hotels-list');
                if (!container) return;

                container.innerHTML = hotels.map((hotel, index) => {
                    const minRate = parseFloat(hotel.minRate);
                    const room = hotel.rooms[0];
                    const rate = room.rates[0];
                    const hasPromotion = rate.promotions && rate.promotions.length > 0;
                    const stars = hotel.categoryCode.match(/\d+/)?.[0] || '4';
                    const initial = hotel.name.charAt(0).toUpperCase();

                    return `
                        <div class="hotel-card" data-hotel-code="${hotel.code}" style="animation-delay: ${index * 0.05}s">
                            <div class="hotel-card-inner">
                                <div class="hotel-image-placeholder">${initial}</div>
                                
                                <div class="hotel-info">
                                    <div class="hotel-name">${hotel.name}</div>
                                    <div class="hotel-rating">
                                        ${'⭐'.repeat(parseInt(stars))}
                                        <span class="category-badge">${hotel.categoryName}</span>
                                    </div>
                                    <div class="hotel-location">
                                        📍 ${hotel.destinationName} · ${hotel.zoneName}
                                    </div>
                                    
                                    <div class="hotel-features">
                                        ${hasPromotion ? `<span class="promotion-tag">🎁 ${rate.promotions[0].name}</span>` : ''}
                                        <span class="feature-tag">${rate.boardName}</span>
                                        <span class="feature-tag">📶 ${rate.allotment} rooms</span>
                                    </div>
                                </div>
                                
                                <div class="hotel-pricing">
                                    ${hasPromotion ? '<div class="discount-badge">OFFER</div>' : ''}
                                    <div class="price-amount">
                                        <span class="price-currency">${hotel.currency}</span> ${minRate}
                                    </div>
                                    <div class="price-note">per night</div>
                                </div>
                            </div>
                        </div>
                    `;
                }).join('');

                // Add click handlers
                container.querySelectorAll('.hotel-card').forEach(card => {
                    card.addEventListener('click', function() {
                        const hotelCode = this.getAttribute('data-hotel-code');
                        const hotel = hotels.find(h => h.code == hotelCode);
                        if (hotel && map) {
                            map.setView([parseFloat(hotel.latitude), parseFloat(hotel.longitude)], 15, {
                                animate: true
                            });
                        }
                    });
                });
            }

            // Display Markers
            function displayMarkersOnMap(hotels) {
                if (!map) return;

                markers.forEach(marker => map.removeLayer(marker));
                markers = [];

                hotels.forEach(hotel => {
                    const lat = parseFloat(hotel.latitude);
                    const lng = parseFloat(hotel.longitude);
                    const price = Math.round(parseFloat(hotel.minRate));

                    if (isNaN(lat) || isNaN(lng)) return;

                    const markerIcon = L.divIcon({
                        className: 'custom-marker',
                        html: `<div class="price-marker">${hotel.currency}${price}</div>`,
                        iconSize: [60, 30],
                        iconAnchor: [30, 15]
                    });

                    const marker = L.marker([lat, lng], {
                        icon: markerIcon
                    }).addTo(map);
                    marker.bindPopup(`
                        <div style="font-family: inherit;">
                            <strong>${hotel.name}</strong><br>
                            ${hotel.categoryName}<br>
                            <span style="color: var(--primary-color); font-weight: bold;">${hotel.currency} ${hotel.minRate}</span>
                        </div>
                    `);

                    markers.push(marker);
                });

                if (markers.length > 0) {
                    const group = L.featureGroup(markers);
                    map.fitBounds(group.getBounds().pad(0.1));
                }
            }

            // Price Filter
            const priceRange = document.getElementById('price-range');
            if (priceRange) {
                priceRange.addEventListener('input', function() {
                    const priceValue = document.getElementById('price-value');
                    if (priceValue) {
                        priceValue.textContent = '€' + this.value;
                    }
                });
            }

            // Search Button
            const searchBtn = document.getElementById('search-hotels-btn');
            if (searchBtn) {
                searchBtn.addEventListener('click', fetchHotels);
            }

            // Initialize
            initMap();
            fetchHotels();
        });
    </script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
</body>

</html>

