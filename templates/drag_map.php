<?php
/*
Template Name: Map Data Collector
Description: Map picker where users can manually edit auto-detected address fields
*/
get_header();
?>

<!-- 1. CSS Assets -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<style>
    #map { height: 400px; width: 100%; z-index: 1; border-radius: 8px; }
    .leaflet-container { font-family: inherit; }
    
    /* Input Styling */
    .custom-input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        color: #1f2937;
        background-color: #fff;
        transition: all 0.2s;
    }
    .custom-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    /* Read-only inputs (Lat/Lng) look different */
    .custom-input.read-only {
        background-color: #f3f4f6;
        color: #6b7280;
        cursor: not-allowed;
    }
    label { 
        font-size: 11px; 
        font-weight: 700; 
        color: #4b5563; 
        text-transform: uppercase; 
        margin-bottom: 4px; 
        display: block; 
    }
</style>

<div class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-5xl grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- LEFT COLUMN: Organization Info (4 Columns) -->
        <div class="lg:col-span-4 space-y-5 border-r pr-0 lg:pr-6 border-gray-100">
            <h2 class="text-xl font-bold text-gray-800 border-b pb-2 text-blue-600">1. Organization Info</h2>
            
            <div>
                <label for="org-name">Organization / Shop Name</label>
                <input type="text" id="org-name" class="custom-input" placeholder="Ex: Bhai Bhai Store">
            </div>

            <div>
                <label for="org-category">Category</label>
                <select id="org-category" class="custom-input">
                    <option value="">Select Category</option>
                    <option value="Retail">Retail Store</option>
                    <option value="Corporate">Corporate Office</option>
                    <option value="Warehouse">Warehouse</option>
                    <option value="Restaurant">Restaurant</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label for="owner-name">Owner Name</label>
                <input type="text" id="owner-name" class="custom-input" placeholder="Ex: Rahim Uddin">
            </div>

            <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200 mt-6">
                <p class="text-xs text-yellow-800 font-bold mb-1">NOTE:</p>
                <p class="text-xs text-gray-700">Please drag the map marker first to auto-fill the address. If the address is incomplete, you can <b>edit the fields manually</b>.</p>
            </div>
        </div>

        <!-- RIGHT COLUMN: Map & Editable Address (8 Columns) -->
        <div class="lg:col-span-8 space-y-5">
            <div class="flex justify-between items-end border-b pb-2">
                <h2 class="text-xl font-bold text-gray-800 text-blue-600">2. Location & Address</h2>
                <span id="status-msg" class="text-xs font-bold text-gray-400">Map Ready</span>
            </div>

            <!-- Map -->
            <div class="relative w-full shadow-sm">
                <div id="map"></div>
            </div>

            <!-- EDITABLE ADDRESS FIELDS Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-gray-50 p-4 rounded-xl border border-gray-200">
                
                <!-- House No (Editable) -->
                <div class="col-span-1">
                    <label for="addr-house">House / Holding</label>
                    <input type="text" id="addr-house" class="custom-input" placeholder="Ex: 12/A">
                </div>

                <!-- Road No (Editable) -->
                <div class="col-span-1">
                    <label for="addr-road">Road / Street</label>
                    <input type="text" id="addr-road" class="custom-input" placeholder="Ex: Road 5">
                </div>

                <!-- City (Editable) -->
                <div class="col-span-1">
                    <label for="addr-city">City / Area</label>
                    <input type="text" id="addr-city" class="custom-input" placeholder="City">
                </div>

                <!-- Zipcode (Editable) -->
                <div class="col-span-1">
                    <label for="addr-zip">Zipcode</label>
                    <input type="text" id="addr-zip" class="custom-input" placeholder="Postcode">
                </div>

                <!-- State (Editable) -->
                <div class="col-span-1">
                    <label for="addr-state">State / Division</label>
                    <input type="text" id="addr-state" class="custom-input" placeholder="State">
                </div>

                <!-- Country (Editable) -->
                <div class="col-span-1">
                    <label for="addr-country">Country</label>
                    <input type="text" id="addr-country" class="custom-input" placeholder="Country">
                </div>

                <!-- Latitude (Read Only) -->
                <div class="col-span-1">
                    <label>Latitude</label>
                    <input type="text" id="val-lat" class="custom-input read-only" readonly>
                </div>

                <!-- Longitude (Read Only) -->
                <div class="col-span-1">
                    <label>Longitude</label>
                    <input type="text" id="val-lng" class="custom-input read-only" readonly>
                </div>
            </div>

            <!-- Submit Button -->
            <button id="save-btn" type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-md transform transition active:scale-95 text-base mt-2">
                SAVE & CONSOLE LOG JSON
            </button>
        </div>

    </div>
</div>

<!-- Scripts -->
<?php wp_enqueue_script('jquery'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
jQuery(document).ready(function($) {

    // --- CONFIG ---
    // Ensure you have the Proxy function in functions.php
    const AJAX_URL = "<?php echo admin_url('admin-ajax.php'); ?>";
    const DEFAULT_LAT = 23.8103;
    const DEFAULT_LNG = 90.4125;
    let timer;

    // --- LEAFLET ICON FIX ---
    delete L.Icon.Default.prototype._getIconUrl;
    L.Icon.Default.mergeOptions({
        iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    });

    if ($('#map').length === 0) return;

    // --- INIT MAP ---
    const map = L.map('map').setView([DEFAULT_LAT, DEFAULT_LNG], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19, attribution: '© OpenStreetMap'
    }).addTo(map);

    const marker = L.marker([DEFAULT_LAT, DEFAULT_LNG], { draggable: true }).addTo(map);

    // --- FETCH ADDRESS FUNCTION ---
    function fetchAddress(lat, lng) {
        $('#status-msg').text('Auto-detecting address...').addClass('text-orange-500').removeClass('text-green-600');
        
        // Update Coordinates immediately (Read-only fields)
        $('#val-lat').val(lat.toFixed(6));
        $('#val-lng').val(lng.toFixed(6));

        $.ajax({
            url: AJAX_URL,
            method: 'GET',
            dataType: 'json',
            data: {
                action: 'get_osm_address', // Matches functions.php proxy
                lat: lat,
                lon: lng
            },
            success: function(data) {
                $('#status-msg').text('Address Detected (You can edit below)').addClass('text-green-600').removeClass('text-orange-500');

                const addr = data.address || {};

                // --- POPULATE INPUT FIELDS ---
                // We use .val() so users can see and edit the data
                $('#addr-house').val(addr.house_number || addr.building || '');
                $('#addr-road').val(addr.road || addr.street || addr.pedestrian || '');
                $('#addr-city').val(addr.city || addr.town || addr.village || addr.suburb || '');
                $('#addr-state').val(addr.state || addr.division || '');
                $('#addr-zip').val(addr.postcode || '');
                $('#addr-country').val(addr.country || 'Bangladesh');

                marker.bindPopup(`<b>${addr.road || 'Location'}</b><br>${addr.suburb || addr.city || ''}`).openPopup();
            },
            error: function() {
                $('#status-msg').text('Detection failed. Please enter manually.').addClass('text-red-500');
            }
        });
    }

    // --- DEBOUNCE LOGIC ---
    function triggerGeocode(lat, lng) {
        clearTimeout(timer);
        timer = setTimeout(() => fetchAddress(lat, lng), 1000);
    }

    // --- EVENTS ---
    marker.on('dragend', function() {
        const pos = marker.getLatLng();
        triggerGeocode(pos.lat, pos.lng);
    });

    map.on('click', function(e) {
        const { lat, lng } = e.latlng;
        marker.setLatLng([lat, lng]);
        triggerGeocode(lat, lng);
    });

    // Initial Load
    triggerGeocode(DEFAULT_LAT, DEFAULT_LNG);

    // ============================================================
    //  SAVE BUTTON: GENERATE JSON FROM INPUTS
    // ============================================================
    $('#save-btn').on('click', function() {
        
        // We read data directly from the input fields
        // This captures whatever the user has manually typed/corrected
        
        const finalData = {
            organization_details: {
                name:       $('#org-name').val(),
                category:   $('#org-category').val(),
                owner_name: $('#owner-name').val()
            },
            location_data: {
                latitude:   $('#val-lat').val(),
                longitude:  $('#val-lng').val(),
                // Taking values from editable inputs
                house_no:   $('#addr-house').val(),
                road_no:    $('#addr-road').val(),
                city:       $('#addr-city').val(),
                state:      $('#addr-state').val(),
                zipcode:    $('#addr-zip').val(),
                country:    $('#addr-country').val()
            }
        };

        // Validation Example
        if(!finalData.organization_details.name) {
            alert('Please enter the Organization Name.');
            $('#org-name').focus();
            return;
        }

        // --- CONSOLE LOG ---
        console.clear();
        console.log("%c ✅ DATA READY FOR SUBMISSION ", "background: #059669; color: white; font-size: 14px; padding: 6px; border-radius: 4px;");
        console.log(JSON.stringify(finalData, null, 4));

        alert('Data logged to Console! Check Developer Tools (F12).');
    });

});
</script>

<?php get_footer(); ?>