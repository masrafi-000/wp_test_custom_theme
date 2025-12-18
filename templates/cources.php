<?php

/*
Template Name: Cources
*/
get_header();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold  mb-4">Explore Our Courses</h2>
        <p class="text-xl  max-w-2xl mx-auto">Discover world-class courses taught by industry experts. Start learning today.</p>
    </div>

    <!-- Search and Filter -->
    <div class="mb-12 max-w-3xl mx-auto">
        <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-white/20">
            <input type="text" id="searchCourse" placeholder="Search courses..." class="w-full px-4 py-3 rounded-lg bg-white/90 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-400">
            <div class="mt-4 flex flex-wrap gap-2">
                <button class="px-4 py-2 bg-white/20  rounded-lg hover:bg-white/30 transition-colors">All</button>
                <button class="px-4 py-2 bg-white/20  rounded-lg hover:bg-white/30 transition-colors">Development</button>
                <button class="px-4 py-2 bg-white/20  rounded-lg hover:bg-white/30 transition-colors">Design</button>
                <button class="px-4 py-2 bg-white/20  rounded-lg hover:bg-white/30 transition-colors">Business</button>
                <button class="px-4 py-2 bg-white/20  rounded-lg hover:bg-white/30 transition-colors">Marketing</button>
            </div>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Course Card 1 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-blue-500 to-purple-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-purple-600 bg-purple-100 px-3 py-1 rounded-full">Development</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.8
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Web Development Bootcamp</h3>
                <p class="text-gray-600 mb-4">Master HTML, CSS, JavaScript, React, Node.js and more in this comprehensive course.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        12,543 students
                    </div>
                    <span class="text-2xl font-bold text-purple-600">$49.99</span>
                </div>
            </div>
        </div>

        <!-- Course Card 2 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-pink-500 to-orange-500"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-pink-600 bg-pink-100 px-3 py-1 rounded-full">Design</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.9
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">UI/UX Design Masterclass</h3>
                <p class="text-gray-600 mb-4">Learn user interface and user experience design from industry professionals.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        8,234 students
                    </div>
                    <span class="text-2xl font-bold text-pink-600">$39.99</span>
                </div>
            </div>
        </div>

        <!-- Course Card 3 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-green-500 to-teal-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full">Business</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.7
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Marketing Strategy</h3>
                <p class="text-gray-600 mb-4">Master SEO, social media marketing, and digital advertising strategies.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        10,876 students
                    </div>
                    <span class="text-2xl font-bold text-green-600">$44.99</span>
                </div>
            </div>
        </div>

        <!-- Course Card 4 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-indigo-500 to-blue-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full">Development</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.9
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Python for Data Science</h3>
                <p class="text-gray-600 mb-4">Learn Python programming and data analysis with NumPy, Pandas, and Matplotlib.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        15,432 students
                    </div>
                    <span class="text-2xl font-bold text-indigo-600">$54.99</span>
                </div>
            </div>
        </div>

        <!-- Course Card 5 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-red-500 to-pink-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-red-600 bg-red-100 px-3 py-1 rounded-full">Marketing</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.6
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Content Marketing Essentials</h3>
                <p class="text-gray-600 mb-4">Create compelling content that drives engagement and conversions.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        6,789 students
                    </div>
                    <span class="text-2xl font-bold text-red-600">$34.99</span>
                </div>
            </div>
        </div>

        <!-- Course Card 6 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow cursor-pointer">
            <div class="h-48 bg-linear-to-br from-yellow-500 to-orange-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-yellow-600 bg-yellow-100 px-3 py-1 rounded-full">Design</span>
                    <span class="text-yellow-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.8
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Graphic Design Fundamentals</h3>
                <p class="text-gray-600 mb-4">Master typography, color theory, and composition in visual design.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        9,234 students
                    </div>
                    <span class="text-2xl font-bold text-yellow-600">$42.99</span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>>