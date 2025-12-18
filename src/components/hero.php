<?php

/**
 * Hero template
 * 
 * @package TestT3
 */

?>

 <section class="bg-linear-to-br from-blue-50 via-white to-purple-50 py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
                    <div class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                        🎓 Join 50,000+ Students Worldwide
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                        Learn Without
                        <span class="text-blue-600"> Limits</span>
                    </h1>
                    
                    <p class="text-xl text-gray-600">
                        Access thousands of courses from world-class instructors. Build skills, earn certificates, and advance your career at your own pace.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-colors text-center">
                            Explore Courses
                        </a>
                        <a href="#" class="bg-white text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold border-2 border-gray-300 hover:border-blue-600 transition-colors text-center">
                            Watch Demo
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8">
                        <div>
                            <div class="text-3xl font-bold text-gray-900">10K+</div>
                            <div class="text-gray-600 text-sm">Courses</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">50K+</div>
                            <div class="text-gray-600 text-sm">Students</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">500+</div>
                            <div class="text-gray-600 text-sm">Instructors</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Hero Image/Illustration -->
                <div class="relative">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                    <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
                    
                    <!-- Main Image Container -->
                    <div class="relative bg-white rounded-2xl shadow-2xl p-8">
                        <div class="space-y-6">
                            <!-- Course Card 1 -->
                            <div class="flex items-center space-x-4 bg-linear-to-r from-blue-50 to-blue-100 p-4 rounded-xl">
                                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Web Development</h3>
                                    <p class="text-sm text-gray-600">120 Courses Available</p>
                                </div>
                                <div class="text-blue-600 font-bold">→</div>
                            </div>
                            
                            <!-- Course Card 2 -->
                            <div class="flex items-center space-x-4 bg-linear-to-r from-purple-50 to-purple-100 p-4 rounded-xl">
                                <div class="w-16 h-16 bg-purple-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Data Science</h3>
                                    <p class="text-sm text-gray-600">85 Courses Available</p>
                                </div>
                                <div class="text-purple-600 font-bold">→</div>
                            </div>
                            
                            <!-- Course Card 3 -->
                            <div class="flex items-center space-x-4 bg-linaer-to-r from-green-50 to-green-100 p-4 rounded-xl">
                                <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">UI/UX Design</h3>
                                    <p class="text-sm text-gray-600">95 Courses Available</p>
                                </div>
                                <div class="text-green-600 font-bold">→</div>
                            </div>
                            
                            <!-- Student Achievement Badge -->
                            <div class="absolute -bottom-6 -left-6 bg-white rounded-xl shadow-lg p-4 border-2 border-yellow-400">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">4.8/5.0</div>
                                        <div class="text-xs text-gray-600">Student Rating</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-gray-600 mb-8">Trusted by leading companies worldwide</p>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center opacity-50">
                <div class="text-center text-2xl font-bold text-gray-400">Google</div>
                <div class="text-center text-2xl font-bold text-gray-400">Microsoft</div>
                <div class="text-center text-2xl font-bold text-gray-400">Amazon</div>
                <div class="text-center text-2xl font-bold text-gray-400">Apple</div>
                <div class="text-center text-2xl font-bold text-gray-400">Meta</div>
            </div>
        </div>
    </section>
