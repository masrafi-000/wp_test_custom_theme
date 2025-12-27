<?php

/**
 * Template Name: Private API Fetch
 * Description: Responsive hotel search with API integration
 */




get_header();
?>


<div class="container mx-auto p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Hotel List</h2>
        <button id="load-hotels-btn" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-6 rounded shadow transition duration-300">
            Load Hotels
        </button>
    </div>


    <div id="hotel-loader" class="hidden text-center py-10">
        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
        <p class="mt-2 text-gray-500">Loading data...</p>
    </div>


    <div id="hotels-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadBtn = document.getElementById('load-hotels-btn');
        const container = document.getElementById('hotels-container');
        const loader = document.getElementById('hotel-loader');

        if (loadBtn) {
            loadBtn.addEventListener('click', function() {

                loader.classList.remove('hidden');
                loadBtn.classList.add('hidden');
                container.innerHTML = '';

                const formData = new FormData();
                formData.append('action', 'fetch_hotels');
                formData.append('security', myApiSettings.nonce);

                fetch(myApiSettings.ajax_url, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(res => {
                        if (res.success) {


                            const hotelData = res.data.hotels || res.data;

                            if (Array.isArray(hotelData)) {
                                let html = '';

                                hotelData.forEach(hotel => {

                                    const imagePath = (hotel.images && hotel.images.length > 0) ?
                                        'http://photos.hotelbeds.com/giata/' + hotel.images[0].path :
                                        'https://via.placeholder.com/400x250?text=No+Image';

                                    html += `
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                                <div class="relative h-48 w-full">
                                    <img src="${imagePath}" alt="${hotel.name.content}" class="absolute inset-0 w-full h-full object-cover">
                                    <span class="absolute top-2 right-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded">
                                        ${hotel.category.description.content || 'Hotel'}
                                    </span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 truncate">${hotel.name.content}</h3>
                                    <p class="text-sm text-gray-600 mb-4 flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                        ${hotel.city.content}, ${hotel.country.content}
                                    </p>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="text-sm text-gray-500">Code: ${hotel.code}</div>
                                        <button class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">View Details &rarr;</button>
                                    </div>
                                </div>
                            </div>
                            `;
                                });
                                container.innerHTML = html;
                            } else {
                                container.innerHTML = `<p class="text-center text-red-500 col-span-3">কোনো হোটেল পাওয়া যায়নি।</p>`;
                            }
                        } else {
                            container.innerHTML = `<div class="bg-red-100 text-red-700 p-4 rounded col-span-3">এরর: ${res.data}</div>`;
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        container.innerHTML = `<div class="bg-red-100 text-red-700 p-4 rounded col-span-3">সার্ভার এরর। কনসোল চেক করুন।</div>`;
                    })
                    .finally(() => {
                        loader.classList.add('hidden');
                        loadBtn.classList.remove('hidden');
                    });
            });
        }
    });
</script>

<?php get_footer();   ?>