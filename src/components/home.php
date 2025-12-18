<?php

/**
 * Hero template
 * 
 * @package TestT3
 */

?>


<main class="w-full">
    <!-- Section 1: Featured Courses -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Courses</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore our most popular courses and start your learning journey today</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                    <div class="h-48 bg-linear-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-3 py-1 rounded-full">Development</span>
                            <span class="text-yellow-500 font-semibold">★ 4.8</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Complete Web Development Bootcamp</h3>
                        <p class="text-gray-600 mb-4">Master HTML, CSS, JavaScript, React, and Node.js in one comprehensive course</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-600">$49.99</span>
                            <span class="text-sm text-gray-500">8,234 students</span>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                    <div class="h-48 bg-linear-to-br from-blue-500 to-cyan-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Design</span>
                            <span class="text-yellow-500 font-semibold">★ 4.9</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">UI/UX Design Masterclass</h3>
                        <p class="text-gray-600 mb-4">Learn modern design principles, Figma, and create stunning user interfaces</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-600">$39.99</span>
                            <span class="text-sm text-gray-500">6,521 students</span>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                    <div class="h-48 bg-linear-to-br from-green-500 to-emerald-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Data Science</span>
                            <span class="text-yellow-500 font-semibold">★ 4.7</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Data Science & Machine Learning</h3>
                        <p class="text-gray-600 mb-4">Python, statistics, ML algorithms, and real-world data analysis projects</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-600">$59.99</span>
                            <span class="text-sm text-gray-500">5,892 students</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Learning Paths -->
    <section class="py-16 px-4 bg-white/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Popular Learning Paths</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Structured learning paths to help you achieve your career goals</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Path 1 -->
                <div class="bg-linear-to-br from-purple-600 to-blue-600 rounded-xl p-8 text-white">
                    <div class="flex items-center mb-4">
                        <div class="bg-white/20 p-3 rounded-lg mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Full Stack Developer</h3>
                            <p class="text-white/80">6 months • 12 courses</p>
                        </div>
                    </div>
                    <p class="text-white/90 mb-6">Become a professional full-stack developer with expertise in modern web technologies, databases, and deployment.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Frontend & Backend Development
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Database Management
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Cloud Deployment & DevOps
                        </li>
                    </ul>
                    <button class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 w-full">Start Learning Path</button>
                </div>

                <!-- Path 2 -->
                <div class="bg-linear-to-br from-pink-600 to-orange-600 rounded-xl p-8 text-white">
                    <div class="flex items-center mb-4">
                        <div class="bg-white/20 p-3 rounded-lg mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">UX/UI Designer</h3>
                            <p class="text-white/80">4 months • 8 courses</p>
                        </div>
                    </div>
                    <p class="text-white/90 mb-6">Master the art of creating beautiful, user-centered designs and become a sought-after designer.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            User Research & Testing
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Figma & Design Tools
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Portfolio Development
                        </li>
                    </ul>
                    <button class="bg-white text-pink-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 w-full">Start Learning Path</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Success Statistics -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Success Story</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Join thousands of students who have transformed their careers with LearnHub</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="text-5xl font-bold text-purple-600 mb-2">50K+</div>
                    <div class="text-gray-600 font-medium">Active Students</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="text-5xl font-bold text-blue-600 mb-2">500+</div>
                    <div class="text-gray-600 font-medium">Expert Instructors</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="text-5xl font-bold text-pink-600 mb-2">1,200+</div>
                    <div class="text-gray-600 font-medium">Quality Courses</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="text-5xl font-bold text-green-600 mb-2">95%</div>
                    <div class="text-gray-600 font-medium">Success Rate</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Why Choose LearnHub -->
    <section class="py-16 px-4 bg-white/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose LearnHub?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">We provide everything you need to succeed in your learning journey</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-purple-500 to-pink-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Expert-Led Courses</h3>
                    <p class="text-gray-600">Learn from industry professionals with years of real-world experience in their fields.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-blue-500 to-cyan-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Flexible Learning</h3>
                    <p class="text-gray-600">Study at your own pace with lifetime access to course materials and resources.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-green-500 to-emerald-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Certificates</h3>
                    <p class="text-gray-600">Earn recognized certificates upon completion to boost your professional profile.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-orange-500 to-red-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Community Support</h3>
                    <p class="text-gray-600">Join a vibrant community of learners and get help whenever you need it.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-indigo-500 to-purple-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Hands-On Projects</h3>
                    <p class="text-gray-600">Build real-world projects and create an impressive portfolio to showcase your skills.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="bg-linear-to-br from-teal-500 to-green-500 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Affordable Pricing</h3>
                    <p class="text-gray-600">High-quality education at prices that won't break the bank. Invest in yourself today.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Top Instructors -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Learn From The Best</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Our instructors are industry leaders committed to your success</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Instructor 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-linear-to-br from-purple-500 to-pink-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold">
                        SJ
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Sarah Johnson</h3>
                    <p class="text-purple-600 font-medium mb-2">Web Development Expert</p>
                    <div class="flex items-center justify-center text-yellow-500 mb-2">
                        <span class="mr-1">★</span>
                        <span class="font-semibold text-gray-900">4.9</span>
                        <span class="text-gray-500 text-sm ml-1">(12.5K reviews)</span>
                    </div>
                    <p class="text-sm text-gray-600">25 Courses • 45K Students</p>
                </div>

                <!-- Instructor 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-linear-to-br from-blue-500 to-cyan-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold">
                        MC
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Michael Chen</h3>
                    <p class="text-blue-600 font-medium mb-2">Data Science Lead</p>
                    <div class="flex items-center justify-center text-yellow-500 mb-2">
                        <span class="mr-1">★</span>
                        <span class="font-semibold text-gray-900">4.8</span>
                        <span class="text-gray-500 text-sm ml-1">(8.2K reviews)</span>
                    </div>
                    <p class="text-sm text-gray-600">18 Courses • 32K Students</p>
                </div>

                <!-- Instructor 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-linear-to-br from-green-500 to-emerald-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold">
                        EP
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Emily Parker</h3>
                    <p class="text-green-600 font-medium mb-2">UX/UI Design Master</p>
                    <div class="flex items-center justify-center text-yellow-500 mb-2">
                        <span class="mr-1">★</span>
                        <span class="font-semibold text-gray-900">4.9</span>
                        <span class="text-gray-500 text-sm ml-1">(10.1K reviews)</span>
                    </div>
                    <p class="text-sm text-gray-600">22 Courses • 38K Students</p>
                </div>

                <!-- Instructor 4 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-linear-to-br from-orange-500 to-red-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold">
                        DP
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">David Park</h3>
                    <p class="text-orange-600 font-medium mb-2">Mobile Dev Specialist</p>
                    <div class="flex items-center justify-center text-yellow-500 mb-2">
                        <span class="mr-1">★</span>
                        <span class="font-semibold text-gray-900">4.7</span>
                        <span class="text-gray-500 text-sm ml-1">(6.8K reviews)</span>
                    </div>
                    <p class="text-sm text-gray-600">15 Courses • 28K Students</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Call to Action -->
    <section class="py-16 px-4 bg-linear-to-br from-purple-600 to-blue-600 mb-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Start Your Learning Journey Today</h2>
            <p class="text-xl mb-8 text-white/90">Join thousands of students already learning on LearnHub. Transform your career with our expert-led courses.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="signup.html" class="bg-white text-purple-600 px-8 py-4 rounded-lg font-bold text-lg hover:shadow-2xl w-full sm:w-auto">Get Started Free</a>
                <a href="courses.html" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white/10 w-full sm:w-auto">Browse Courses</a>
            </div>
            <p class="mt-6 text-white/80">No credit card required • Cancel anytime • 30-day money-back guarantee</p>
        </div>
    </section>
</main>