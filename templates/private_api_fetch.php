<?php

/**
 * Template Name: Private API Fetch
 * Description: Responsive hotel search with API integration
 */




get_header();
?>


<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">


        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">WordPress API Integration</h1>
            <p class="text-gray-600">কোনো functions.php ছাড়াই সরাসরি ডাটা লোড করা</p>

            <button id="fetchBtn" class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">
                সব পোস্ট লোড করুন (AJAX)
            </button>
        </div>


        <div id="loader" class="hidden flex  justify-center items-center py-10">
            <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-b-4 border-blue-500"></div>
        </div>


        <div id="postContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const button = document.getElementById('fetchBtn');
        const container = document.getElementById('postContainer');
        const loader = document.getElementById('loader');


        button.addEventListener('click', function() {


            button.classList.toggle('hidden');
            loader.classList.remove('hidden');


            fetch('https://jsonplaceholder.typicode.com/posts')
                .then(response => response.json())
                .then(data => {

                    let htmlContent = '';


                    data.map(post => {
                        htmlContent += `
                            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border border-gray-200">
                                <span class="text-xs font-bold text-blue-500 bg-blue-100 px-2 py-1 rounded">Post ID: ${post.id}</span>
                                <h3 class="text-xl font-bold text-gray-800 mt-3 mb-2 capitalize">${post.title}</h3>
                                <p class="text-gray-600 text-sm">${post.body}</p>
                            </div>
                        `;
                    });


                    container.innerHTML = htmlContent;


                    loader.classList.add('hidden');


                })
                .catch(error => {
                    console.error('Error:', error);
                    container.innerHTML = '<p class="text-red-500 text-center col-span-3">ডাটা লোড করতে সমস্যা হয়েছে!</p>';
                    loader.classList.add('hidden');
                    button.classList.remove('hidden');
                });
        });

    });
</script>



<?php get_footer();   ?>