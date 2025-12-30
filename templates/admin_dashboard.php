<?php
/*
Template Name: Admin Map Dashboard
Description: View all submitted locations on map and table (Static Data Demo)
*/
get_header();
?>

<!-- 1. CSS Assets (Tailwind + Leaflet) -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<!-- DataTables CSS (For beautiful table) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
    /* Admin Dashboard Layout Fixes */
    body { background-color: #f3f4f6; }
    #admin-map { height: 500px; width: 100%; z-index: 1; border-radius: 12px; }
    
    .dashboard-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid #e5e7eb;
    }
    
    /* Table Styling */
    .dataTables_wrapper .dataTables_length select, 
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 5px;
    }
    table.dataTable thead th {
        background-color: #f9fafb;
        color: #374151;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
    }
</style>

<div class="min-h-screen p-6">
    
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Organization Submissions</h1>
            <p class="text-sm text-gray-500">View all registered store locations via Map View.</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200">
            <span class="text-gray-500 text-xs font-bold uppercase">Total Records</span>
            <div class="text-2xl font-bold text-blue-600" id="total-count">0</div>
        </div>
    </div>

    <!-- MAP SECTION -->
    <div class="dashboard-card p-2 mb-8">
        <div id="admin-map"></div>
    </div>

    <!-- TABLE SECTION -->
    <div class="dashboard-card p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Submission List</h2>
        
        <div class="overflow-x-auto">
            <table id="submissionsTable" class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Org Name</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Contact / Owner</th>
                        <th class="p-3">Location / Address</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-600">
                    <!-- Data will be injected here by jQuery -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- 2. SCRIPTS -->
<?php wp_enqueue_script('jquery'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
jQuery(document).ready(function($) {

    // --- 1. STATIC MOCK DATA (Simulating Database) ---
    const submissions = [
        {
            id: 101,
            organization: { name: "Super Tech BD", category: "Corporate", owner: "Tanvir Hasan", contact: "+8801711000000" },
            address: { 
                latitude: 23.8103, longitude: 90.4125, 
                road: "Road 5", house: "House 12", city: "Dhaka", area: "Bashundhara R/A" 
            }
        },
        {
            id: 102,
            organization: { name: "Chittagong Spicy Hub", category: "Restaurant", owner: "Karim Uddin", contact: "+8801811222333" },
            address: { 
                latitude: 22.3569, longitude: 91.7832, 
                road: "CDA Avenue", house: "Shop 45", city: "Chittagong", area: "GEC Circle" 
            }
        },
        {
            id: 103,
            organization: { name: "Sylhet Tea Mart", category: "Retail", owner: "Monir Khan", contact: "+8801911444555" },
            address: { 
                latitude: 24.8949, longitude: 91.8687, 
                road: "Zindabazar Rd", house: "Complex A", city: "Sylhet", area: "Zindabazar" 
            }
        },
        {
            id: 104,
            organization: { name: "Silicon Valley CA", category: "IT", owner: "John Doe", contact: "+1 555-0199" },
            address: { 
                latitude: 37.3382, longitude: -121.8863, 
                road: "Market St", house: "Bldg 5", city: "San Jose", area: "California, USA" 
            }
        },
        {
            id: 105,
            organization: { name: "Rajshahi Silk House", category: "Retail", owner: "Sultana Begum", contact: "+8801700000000" },
            address: { 
                latitude: 24.3636, longitude: 88.6241, 
                road: "Station Rd", house: "Silk Tower", city: "Rajshahi", area: "Shaheb Bazar" 
            }
        },
        {
            id: 106,
            organization: { name: "Uttara Fashion", category: "Retail", owner: "Ahsan Habib", contact: "+8801600000000" },
            address: { 
                latitude: 23.8759, longitude: 90.3795, 
                road: "Road 7", house: "Sector 4", city: "Dhaka", area: "Uttara" 
            }
        }
    ];

    // --- 2. UPDATE STATS ---
    $('#total-count').text(submissions.length);

    // --- 3. INIT MAP ---
    // Fix Icons
    delete L.Icon.Default.prototype._getIconUrl;
    L.Icon.Default.mergeOptions({
        iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    });

    // Start Map centered on Bangladesh
    const map = L.map('admin-map').setView([23.6850, 90.3563], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19, attribution: '© OpenStreetMap'
    }).addTo(map);

    // Object to store markers by ID so we can trigger them from the table
    const markersById = {};

    // --- 4. LOOP DATA & RENDER ---
    const tableBody = $('#submissionsTable tbody');

    submissions.forEach(function(item) {
        
        // A. Add Marker to Map
        const marker = L.marker([item.address.latitude, item.address.longitude]).addTo(map);
        
        const popupContent = `
            <div class="text-sm">
                <h3 class="font-bold text-blue-600 text-base">${item.organization.name}</h3>
                <span class="bg-gray-200 text-xs px-2 py-0.5 rounded">${item.organization.category}</span>
                <p class="mt-2 text-gray-700">
                    <b>Owner:</b> ${item.organization.owner}<br>
                    <b>Phone:</b> ${item.organization.contact}<br>
                    <hr class="my-1">
                    <b>Address:</b> ${item.address.house}, ${item.address.road}, ${item.address.area}, ${item.address.city}
                </p>
            </div>
        `;
        
        marker.bindPopup(popupContent);
        markersById[item.id] = marker; // Save reference

        // B. Add Row to Table
        const addressText = `${item.address.house}, ${item.address.road},<br> ${item.address.area}, ${item.address.city}`;
        
        const row = `
            <tr class="hover:bg-blue-50 transition border-b border-gray-100">
                <td class="p-3 font-mono text-xs font-bold text-gray-500">#${item.id}</td>
                <td class="p-3 font-semibold text-gray-800">${item.organization.name}</td>
                <td class="p-3"><span class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-bold">${item.organization.category}</span></td>
                <td class="p-3 text-xs">
                    <div class="font-bold text-gray-700">${item.organization.owner}</div>
                    <div class="text-gray-500">${item.organization.contact}</div>
                </td>
                <td class="p-3 text-xs text-gray-600">${addressText}</td>
                <td class="p-3 text-center">
                    <button class="view-map-btn bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700 shadow transition" 
                            data-id="${item.id}" 
                            data-lat="${item.address.latitude}" 
                            data-lng="${item.address.longitude}">
                        View on Map
                    </button>
                </td>
            </tr>
        `;
        tableBody.append(row);
    });

    // --- 5. INITIALIZE DATATABLE (Pagination & Search) ---
    $('#submissionsTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 20],
        order: [[0, 'desc']] // Sort by ID desc
    });

    // --- 6. INTERACTION: Table Button Click ---
    $(document).on('click', '.view-map-btn', function() {
        const id = $(this).data('id');
        const lat = $(this).data('lat');
        const lng = $(this).data('lng');

        // 1. Smooth fly to location
        map.flyTo([lat, lng], 16, {
            duration: 1.5
        });

        // 2. Open the popup for that marker
        if (markersById[id]) {
            // Slight delay to allow map to move first
            setTimeout(() => {
                markersById[id].openPopup();
            }, 1000);
        }

        // 3. Scroll to map (optional UX improvement)
        $('html, body').animate({
            scrollTop: $("#admin-map").offset().top - 100
        }, 500);
    });

});
</script>

<?php get_footer(); ?>