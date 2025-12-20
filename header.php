<?php

/**
 * Header tmeplate.
 * 
 * @package TestT3
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="">
    <header class="w-full drop-shadow-2xl p-6">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <a href="<?php echo home_url() ?>" class="text-2xl font-bold text-gray-900 cursor-pointer">LearnHub</a>
                        <div class="hidden md:flex space-x-6">
                            <a href="<?php echo home_url('/cources') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Courses</a>
                            <a href="<?php echo home_url('/instructors') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Instructors</a>
                            <a href="<?php echo home_url('/about') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">About</a>
                            <a href="<?php echo home_url('/contact') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Contact</a>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="<?php echo home_url('/login'); ?>" class="text-gray-700 hover:text-blue-600 border border-gray-200  px-6 py-2 rounded-lg transition-colors">Sign In</a>
                        <a href="<?php echo home_url('/signup'); ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">Sign Up</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Links -->
                <!-- <div class="absolute  inset-0 backdrop-blur-sm transition-opacity duration-500 z-50"> -->

                <div id="mobile-menu" class="hidden   flex-col space-y-4 mt-4 md:hidden">
                    <a href="<?php echo home_url('/cources') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Courses</a>
                    <a href="<?php echo home_url('/instructors') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Instructors</a>
                    <a href="<?php echo home_url('/about') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">About</a>
                    <a href="<?php echo home_url('/contact') ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Contact</a>
                    <a href="<?php echo home_url('/login'); ?>" class="text-gray-700 border border-gray-200 px-6 py-2 rounded-lg hover:text-blue-600 transition-colors">Sign In</a>
                    <a href="<?php echo home_url('/signup'); ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">Sign Up</a>
                </div>
                <!-- </div> -->

            </div>
        </nav>
    </header>