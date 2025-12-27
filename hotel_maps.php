<?php
/**
 * Template Name: Hotel Search with Map
 * Description: A custom template for hotel search with interactive map
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Handle AJAX request if this is an AJAX call
if (isset($_POST['hotel_search_action']) && $_POST['hotel_search_action'] === 'fetch_hotels') {
    
    // API Configuration
    $api_key = '1e8234c861f59b71091515efa946ed32';
    $secret = '4c2cf69797';
    $endpoint = 'https://api.test.hotelbeds.com/hotel-api/1.0/hotels';
    
    // Generate X-Signature
    $timestamp = time();
    $signature_string = $api_key . $secret . $timestamp;
    $signature = hash('sha256', $signature_string);
    
    // Get parameters
    $checkin = sanitize_text_field($_POST['checkin'] ?? '2025-12-28');
    $checkout = sanitize_text_field($_POST['checkout'] ?? '2025-12-30');
    $destination = sanitize_text_field($_POST['destination'] ?? 'MAD');
    
    // Request body
    $request_body = [
        'stay' => [
            'checkIn' => $checkin,
            'checkOut' => $checkout
        ],
        'occupancies' => [[
            'rooms' => 1,
            'adults' => 2,
            'children' => 0
        ]],
        'destination' => [
            'code' => $destination
        ]
    ];
    
    // Make API call
    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Api-key: ' . $api_key,
            'X-Signature: ' . $signature
        ],
        CURLOPT_POSTFIELDS => json_encode($request_body),
        CURLOPT_TIMEOUT => 30
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Return JSON response
    header('Content-Type: application/json');
    if ($http_code === 200) {
        echo $response;
    } else {
        echo json_encode(['error' => 'API request failed', 'code' => $http_code]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:wght@600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #1a73e8;
            --secondary-color: #34a853;
            --accent-color: #fbbc04;
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --border-color: #dadce0;
            --bg-hover: #f8f9fa;
            --success-green: #0f9d58;
            --rating-yellow: #f9ab00;
            --shadow-sm: 0 1px 2px 0 rgba(60,64,67,.3), 0 1px 3px 1px rgba(60,64,67,.15);
            --shadow-md: 0 1px 3px 0 rgba(60,64,67,.3), 0 4px 8px 3px rgba(60,64,67,.15);
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text-primary);
            overflow: hidden;
        }

        /* Header */
        .hotel-search-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .site-logo {
            font-family: 'Fraunces', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .search-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-input {
            width: 300px;
            padding: 10px 16px;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .date-input {
            padding: 10px 16px;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
        }

        .search-btn {
            padding: 10px 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .search-btn:hover {
            background: #1557b0;
            box-shadow: var(--shadow-md);
        }

        .search-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Main Container */
        .hotel-search-container {
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            bottom: 50px;
            display: flex;
        }

        /* Filters Sidebar */
        .filters-sidebar {
            width: 280px;
            background: white;
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            padding: 20px;
        }

        .filter-section {
            margin-bottom: 24px;
        }

        .filter-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-primary);
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            cursor: pointer;
        }

        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .filter-option label {
            font-size: 14px;
            cursor: pointer;
            flex: 1;
        }

        .price-slider {
            width: 100%;
            margin-top: 12px;
        }

        /* Hotel Listings */
        .hotels-list {
            flex: 1;
            overflow-y: auto;
            background: #f8f9fa;
            padding: 24px;
            max-width: 700px;
        }

        .hotels-list::-webkit-scrollbar {
            width: 8px;
        }

        .hotels-list::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .hotels-list::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .loading-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            gap: 16px;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--border-color);
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .hotel-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 16px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s;
            cursor: pointer;
            animation: fadeInUp 0.5s ease-out;
        }

        .hotel-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hotel-card-inner {
            display: flex;
            padding: 16px;
            gap: 16px;
        }

        .hotel-image-placeholder {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .hotel-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .hotel-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .hotel-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
        }

        .category-badge {
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .hotel-location {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .hotel-features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: auto;
        }

        .feature-tag {
            padding: 4px 10px;
            background: var(--bg-hover);
            border-radius: 12px;
            font-size: 12px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .promotion-tag {
            padding: 4px 10px;
            background: #e8f5e9;
            color: var(--success-green);
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .hotel-pricing {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .discount-badge {
            background: var(--success-green);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .price-amount {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }

        .price-currency {
            font-size: 16px;
            font-weight: 600;
        }

        .price-note {
            font-size: 11px;
            color: var(--text-secondary);
        }

        /* Map Container */
        .map-container {
            flex: 1;
            position: relative;
        }

        #hotel-map {
            width: 100%;
            height: 100%;
        }

        /* Custom Marker */
        .price-marker {
            background: white;
            border: 2px solid var(--primary-color);
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 700;
            font-size: 14px;
            color: var(--primary-color);
            box-shadow: var(--shadow-md);
            white-space: nowrap;
            cursor: pointer;
            transition: all 0.2s;
        }

        .price-marker:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        /* Footer */
        .hotel-search-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: white;
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            font-size: 14px;
            color: var(--text-secondary);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .filters-sidebar {
                display: none;
            }
            .hotels-list {
                max-width: none;
            }
        }

        @media (max-width: 768px) {
            .hotel-card-inner {
                flex-direction: column;
            }
            .hotel-image-placeholder {
                width: 100%;
                height: 200px;
            }
            .search-form {
                display: none;
            }
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('hotel-search-page'); ?>>

    <!-- Header -->
    <header class="hotel-search-header">
        <div class="header-left">
            <a href="<?php echo home_url(); ?>" class="site-logo">
                🏨 HotelFinder
            </a>
            
            <div class="search-form">
                <input type="text" class="search-input" id="destination-input" placeholder="Where?" value="MAD">
                <input type="date" class="date-input" id="checkin-date" value="2025-12-28">
                <input type="date" class="date-input" id="checkout-date" value="2025-12-30">
                <button class="search-btn" id="search-hotels-btn">
                    <span>🔍</span> Search
                </button>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="hotel-search-container">
        <!-- Filters Sidebar -->
        <aside class="filters-sidebar">
            <div class="filter-section">
                <div class="filter-title">🎯 Filters</div>
            </div>

            <div class="filter-section">
                <div class="filter-title">Price Range</div>
                <input type="range" class="price-slider" min="0" max="500" value="500" id="price-range">
                <div style="display: flex; justify-content: space-between; font-size: 12px; color: var(--text-secondary); margin-top: 8px;">
                    <span>€0</span>
                    <span id="price-value">€500</span>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-title">⭐ Star Rating</div>
                <div class="filter-option">
                    <input type="checkbox" id="star-5" value="5">
                    <label for="star-5">5 Stars</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="star-4" value="4">
                    <label for="star-4">4 Stars</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="star-3" value="3">
                    <label for="star-3">3 Stars</label>
                </div>
            </div>
        </aside>

        <!-- Hotel Listings -->
        <div class="hotels-list" id="hotels-list">
            <div class="loading-state">
                <div class="spinner"></div>
                <p>Loading hotels...</p>
            </div>
        </div>

        <!-- Map Container -->
        <div class="map-container">
            <div id="hotel-map"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="hotel-search-footer">
        <div>© <?php echo date('Y'); ?> HotelFinder. Powered by Hotelbeds API</div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        // Wait for DOM to be fully loaded
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
                } catch(e) {
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

                    const marker = L.marker([lat, lng], { icon: markerIcon }).addTo(map);
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

    <?php wp_footer(); ?>
</body>
</html>