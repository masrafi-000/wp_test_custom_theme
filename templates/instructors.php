<?php

/*
Template Name: Instructors
*/
get_header();
?>



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold  mb-4">Meet Our Expert Instructors</h2>
        <p class="text-xl  max-w-2xl mx-auto">Learn from industry professionals with years of real-world experience.</p>
    </div>

    <!-- Instructors Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Instructor Card 1 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-purple-600">SA</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Sarah Anderson</h3>
                <p class="text-purple-600 font-medium mb-3">Full Stack Developer</p>
                <p class="text-gray-600 mb-4">10+ years experience in web development. Former lead developer at tech startups.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        25,432 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.9
                    </div>
                </div>
                <button class="w-full bg-purple-600 text-white py-2 rounded-lg font-medium hover:bg-purple-700 transition-colors">View Courses</button>
            </div>
        </div>

        <!-- Instructor Card 2 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-pink-400 to-orange-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-pink-600">MC</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Michael Chen</h3>
                <p class="text-pink-600 font-medium mb-3">UI/UX Designer</p>
                <p class="text-gray-600 mb-4">Award-winning designer with 8 years at leading design agencies and tech companies.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        18,765 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.8
                    </div>
                </div>
                <button class="w-full bg-pink-600 text-white py-2 rounded-lg font-medium hover:bg-pink-700 transition-colors">View Courses</button>
            </div>
        </div>

        <!-- Instructor Card 3 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-green-400 to-teal-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-green-600">EP</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Emily Parker</h3>
                <p class="text-green-600 font-medium mb-3">Digital Marketing Expert</p>
                <p class="text-gray-600 mb-4">Marketing strategist who has helped 100+ businesses grow their online presence.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        22,198 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.7
                    </div>
                </div>
                <button class="w-full bg-green-600 text-white py-2 rounded-lg font-medium hover:bg-green-700 transition-colors">View Courses</button>
            </div>
        </div>

        <!-- Instructor Card 4 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-indigo-400 to-blue-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-indigo-600">DM</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">David Martinez</h3>
                <p class="text-indigo-600 font-medium mb-3">Data Science Specialist</p>
                <p class="text-gray-600 mb-4">PhD in Computer Science. 12 years teaching machine learning and data analysis.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        30,543 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.9
                    </div>
                </div>
                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors">View Courses</button>
            </div>
        </div>

        <!-- Instructor Card 5 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-red-400 to-pink-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-red-600">JW</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Jessica Williams</h3>
                <p class="text-red-600 font-medium mb-3">Content Marketing Pro</p>
                <p class="text-gray-600 mb-4">Built content strategies for Fortune 500 companies and successful startups.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        14,876 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.6
                    </div>
                </div>
                <button class="w-full bg-red-600 text-white py-2 rounded-lg font-medium hover:bg-red-700 transition-colors">View Courses</button>
            </div>
        </div>

        <!-- Instructor Card 6 -->
        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-shadow">
            <div class="h-64 bg-linear-to-br from-yellow-400 to-orange-500 flex items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center">
                    <span class="text-5xl font-bold text-yellow-600">RT</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Robert Taylor</h3>
                <p class="text-yellow-600 font-medium mb-3">Graphic Design Master</p>
                <p class="text-gray-600 mb-4">20+ years creating stunning visuals for brands worldwide. Published author.</p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-gray-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        19,234 students
                    </div>
                    <div class="flex items-center text-yellow-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        4.8
                    </div>
                </div>
                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg font-medium hover:bg-yellow-700 transition-colors">View Courses</button>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>