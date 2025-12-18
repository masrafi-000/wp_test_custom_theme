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
                    <div class="flex items-center space-x-4">
                        <a href="<?php echo home_url('/login'); ?>" class="text-gray-700 hover:text-blue-600 transition-colors">Sign In</a>
                        <a href="<?php echo home_url('/signup'); ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>