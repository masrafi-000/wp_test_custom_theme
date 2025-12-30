<?php
/*
Template Name: Map Picker With Contact & Desc
Description: Organization info with Description/Contact and Map Picker
*/
get_header();
?>

<!-- 1. CSS Assets -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<style>
    #map {
        height: 450px;
        width: 100%;
        z-index: 1;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }

    .leaflet-container {
        font-family: inherit;
    }

    .custom-input {
        width: 100%;
        padding: 9px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        background-color: #fff;
        transition: all 0.2s;
    }

    .custom-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .custom-input.read-only {
        background-color: #f3f4f6;
        color: #6b7280;
        cursor: not-allowed;
    }

    /* Specific style for Textarea */
    textarea.custom-input {
        resize: vertical;
        min-height: 80px;
    }

    label {
        font-size: 11px;
        font-weight: 700;
        color: #4b5563;
        text-transform: uppercase;
        margin-bottom: 5px;
        display: block;
    }
</style>

<div class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-6xl grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- LEFT SIDE: Organization Info -->
        <div class="lg:col-span-4 space-y-5 border-r pr-0 lg:pr-6 border-gray-100">
            <h2 class="text-xl font-bold text-blue-700 border-b pb-2">1. Organization Info</h2>

            <!-- Field: Org Name -->
            <div>
                <label>Organization Name</label>
                <input type="text" id="org-name" class="custom-input" placeholder="Ex: Super Tech Ltd">
            </div>

            <!-- Field: Owner Name -->
            <div>
                <label>Owner Name</label>
                <input type="text" id="owner-name" class="custom-input" placeholder="Owner Name">
            </div>

            <!-- NEW Field: Contact Number -->
            <div>
                <label>Contact Number</label>
                <input type="text" id="org-contact" class="custom-input" placeholder="+880 1700 000000">
            </div>

            <!-- NEW Field: Description (Textarea) -->
            <div>
                <label>Description</label>
                <textarea id="org-desc" class="custom-input" rows="3" placeholder="Write a short description about the organization..."></textarea>
            </div>

            <div class="bg-blue-50 p-4 rounded border border-blue-100 mt-4">
                <p class="text-xs text-blue-800 font-bold mb-1">TIP:</p>
                <p class="text-xs text-gray-600">Select a Country first, then drag the marker to the exact street location.</p>
            </div>
        </div>

        <!-- RIGHT SIDE: Map & Address -->
        <div class="lg:col-span-8 space-y-5">
            <div class="flex justify-between items-end border-b pb-2">
                <h2 class="text-xl font-bold text-blue-700">2. Location Details</h2>
                <span id="status-msg" class="text-xs font-bold text-gray-400">Map Ready</span>
            </div>

            <!-- Map -->
            <div class="relative w-full shadow-sm">
                <div id="map"></div>
            </div>

            <!-- ADDRESS FIELDS -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-gray-50 p-5 rounded-xl border border-gray-200">

                <!-- Country Select -->
                <div class="col-span-1 md:col-span-1">
                    <label for="addr-country" class="text-blue-600">Select Country</label>
                    <select id="addr-country" class="custom-input font-semibold text-blue-900 bg-blue-50 border-blue-200">
                        <option value="BD">Bangladesh</option>
                        <option value="US">United States</option>
                        <option value="GB">United Kingdom</option>
                        <option value="CA">Canada</option>
                        <option value="AU">Australia</option>
                        <option value="IN">India</option>
                        <option value="PK">Pakistan</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="AE">UAE (Dubai)</option>
                        <option value="SG">Singapore</option>
                        <option value="MY">Malaysia</option>
                        <option value="JP">Japan</option>
                    </select>
                </div>

                <div class="col-span-1 md:col-span-1">
                    <label>State / Division</label>
                    <input type="text" id="addr-state" class="custom-input" placeholder="State">
                </div>

                <div class="col-span-1 md:col-span-1">
                    <label>City / Area</label>
                    <input type="text" id="addr-city" class="custom-input" placeholder="City">
                </div>

                <div class="col-span-1 md:col-span-1">
                    <label>Zipcode</label>
                    <input type="text" id="addr-zip" class="custom-input" placeholder="Zip">
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label>Road / Street</label>
                    <input type="text" id="addr-road" class="custom-input" placeholder="Road No / Name">
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label>House / Building</label>
                    <input type="text" id="addr-house" class="custom-input" placeholder="House No / Name">
                </div>

                <!-- Read Only Coords -->
                <div class="col-span-1">
                    <label>Latitude</label>
                    <input type="text" id="val-lat" class="custom-input read-only" readonly>
                </div>
                <div class="col-span-1">
                    <label>Longitude</label>
                    <input type="text" id="val-lng" class="custom-input read-only" readonly>
                </div>
            </div>

            <!-- Submit -->
            <button id="save-btn" type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-md transition transform active:scale-95 text-lg">
                SAVE
            </button>
        </div>
    </div>
</div>

<!-- Scripts -->
<?php wp_enqueue_script('jquery'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    jQuery(document).ready(function($) {

        // --- 1. CONFIGURATION ---
        const AJAX_URL = "<?php echo admin_url('admin-ajax.php'); ?>";
        let timer;

        const COUNTRY_COORDS = {
            'BD': {
                lat: 23.6850,
                lng: 90.3563,
                zoom: 7
            },
            'US': {
                lat: 37.0902,
                lng: -95.7129,
                zoom: 4
            },
            'GB': {
                lat: 55.3781,
                lng: -3.4360,
                zoom: 6
            },
            'CA': {
                lat: 56.1304,
                lng: -106.3468,
                zoom: 4
            },
            'AU': {
                lat: -25.2744,
                lng: 133.7751,
                zoom: 4
            },
            'IN': {
                lat: 20.5937,
                lng: 78.9629,
                zoom: 5
            },
            'PK': {
                lat: 30.3753,
                lng: 69.3451,
                zoom: 6
            },
            'SA': {
                lat: 23.8859,
                lng: 45.0792,
                zoom: 6
            },
            'AE': {
                lat: 23.4241,
                lng: 53.8478,
                zoom: 7
            },
            'SG': {
                lat: 1.3521,
                lng: 103.8198,
                zoom: 11
            },
            'MY': {
                lat: 4.2105,
                lng: 101.9758,
                zoom: 6
            },
            'JP': {
                lat: 36.2048,
                lng: 138.2529,
                zoom: 5
            },
        };

        const START_LAT = 23.8103;
        const START_LNG = 90.4125;

        // --- 2. LEAFLET SETUP ---
        delete L.Icon.Default.prototype._getIconUrl;
        L.Icon.Default.mergeOptions({
            iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
            iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
        });

        if ($('#map').length === 0) return;

        const map = L.map('map').setView([START_LAT, START_LNG], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const marker = L.marker([START_LAT, START_LNG], {
            draggable: true
        }).addTo(map);

        // --- 3. COUNTRY CHANGE LOGIC ---
        $('#addr-country').on('change', function() {
            const countryCode = $(this).val();

            if (COUNTRY_COORDS[countryCode]) {
                const data = COUNTRY_COORDS[countryCode];
                map.flyTo([data.lat, data.lng], data.zoom, {
                    duration: 1.5
                });
                marker.setLatLng([data.lat, data.lng]);
                $('#val-lat').val(data.lat.toFixed(6));
                $('#val-lng').val(data.lng.toFixed(6));
                triggerGeocode(data.lat, data.lng);
            }
        });

        // --- 4. GEOCODING FUNCTION ---
        function fetchAddress(lat, lng) {
            $('#status-msg').text('Fetching details...').addClass('text-orange-500').removeClass('text-green-600');

            $('#val-lat').val(lat.toFixed(6));
            $('#val-lng').val(lng.toFixed(6));

            $.ajax({
                url: AJAX_URL,
                method: 'GET',
                dataType: 'json',
                data: {
                    action: 'get_osm_address',
                    lat: lat,
                    lon: lng
                },
                success: function(data) {
                    $('#status-msg').text('Address Found').addClass('text-green-600').removeClass('text-orange-500');

                    const addr = data.address || {};

                    $('#addr-house').val(addr.house_number || addr.building || '');
                    $('#addr-road').val(addr.road || addr.street || '');
                    $('#addr-city').val(addr.city || addr.town || addr.suburb || '');
                    $('#addr-state').val(addr.state || addr.division || '');
                    $('#addr-zip').val(addr.postcode || '');

                    const detectedCountryCode = addr.country_code ? addr.country_code.toUpperCase() : '';
                    if (detectedCountryCode && $(`#addr-country option[value='${detectedCountryCode}']`).length > 0) {
                        $('#addr-country').val(detectedCountryCode);
                    }

                    marker.bindPopup(`<b>${addr.road || 'Location'}</b><br>${addr.city || ''}`).openPopup();
                },
                error: function() {
                    $('#status-msg').text('Error fetching data').addClass('text-red-500');
                }
            });
        }

        function triggerGeocode(lat, lng) {
            clearTimeout(timer);
            timer = setTimeout(() => fetchAddress(lat, lng), 1000);
        }

        // --- 5. MAP EVENTS ---
        marker.on('dragend', function() {
            const pos = marker.getLatLng();
            triggerGeocode(pos.lat, pos.lng);
        });

        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;
            marker.setLatLng([lat, lng]);
            triggerGeocode(lat, lng);
        });

        triggerGeocode(START_LAT, START_LNG);

        // --- 6. SAVE BUTTON ---
        $('#save-btn').on('click', function() {

            // Updated Data Structure with Description and Contact
            const finalData = {
                organization: {
                    name: $('#org-name').val(),
                    owner_name: $('#owner-name').val(),
                    contact_number: $('#org-contact').val(), // New Field
                    description: $('#org-desc').val() // New Field
                },
                address: {
                    country: $('#addr-country option:selected').text(),
                    country_code: $('#addr-country').val(),
                    state: $('#addr-state').val(),
                    city: $('#addr-city').val(),
                    zip: $('#addr-zip').val(),
                    road: $('#addr-road').val(),
                    house: $('#addr-house').val(),
                    latitude: $('#val-lat').val(),
                    longitude: $('#val-lng').val()
                }
            };

            // Basic Validation
            if (!finalData.organization.name) {
                alert('Please enter Organization Name');
                $('#org-name').focus();
                return;
            }

            console.clear();
            console.log("%c ✅ DATA SUBMITTED ", "background: #10B981; color: white; padding: 6px; font-weight: bold; border-radius: 4px;");
            console.log(JSON.stringify(finalData, null, 4));

            alert('Data logged to Console! (F12)');
        });

    });
</script>

<?php get_footer(); ?>