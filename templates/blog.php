<?php
/*
Template Name: Blog
*/
get_header();
?>

<!-- Blog Header -->
<div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">LearnHub Blog</h1>
        <p class="text-xl text-purple-100">Insights, tips, and stories from the world of online learning</p>
    </div>
</div>

<!-- Search and Filter -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <input type="text" id="searchInput" placeholder="Search blog posts..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            <select id="categoryFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                <option value="all">All Categories</option>
                <option value="web-development">Web Development</option>
                <option value="data-science">Data Science</option>
                <option value="mobile-development">Mobile Development</option>
                <option value="career-advice">Career Advice</option>
                <option value="student-success">Student Success</option>
                <option value="industry-trends">Industry Trends</option>
            </select>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">

    <!-- Section 1: Web Development -->
    <div class="mb-12" data-category="web-development">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-code mr-3 text-purple-600"></i>
            Web Development
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="web-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-purple-100 text-purple-600 text-xs px-3 py-1 rounded-full">Web Development</span>
                        <span class="text-gray-500 text-sm">5 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Mastering React Hooks in 2024</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 15, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Sarah Johnson
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        React Hooks have revolutionized the way we write React components. In this comprehensive guide, we'll explore advanced patterns...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        React Hooks have revolutionized the way we write React components. In this comprehensive guide, we'll explore advanced patterns and best practices for using hooks in modern React applications. We'll cover useState, useEffect, useContext, useReducer, and custom hooks. You'll learn how to optimize performance with useMemo and useCallback, manage complex state logic, and create reusable hook patterns. We'll also dive into common pitfalls and how to avoid them, including dependency array issues, infinite loops, and stale closures. By the end of this article, you'll have a deep understanding of React Hooks and be able to leverage them to build scalable, maintainable applications. We'll include real-world examples from production applications and discuss testing strategies for components that use hooks.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="web-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-purple-100 text-purple-600 text-xs px-3 py-1 rounded-full">Web Development</span>
                        <span class="text-gray-500 text-sm">7 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">JavaScript ES2024: New Features</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 12, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Mike Chen
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        JavaScript continues to evolve with exciting new features in ES2024. Let's explore what's new and how to use these features...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        JavaScript continues to evolve with exciting new features in ES2024. Let's explore what's new and how to use these features in your projects today. This year brings improvements to array methods with Array.prototype.toSorted() and toReversed(), new methods for immutable array operations, and enhanced Promise handling with Promise.withResolvers(). We'll examine the new decorators proposal, which provides a clean syntax for modifying classes and their members. The article covers practical examples of each feature, browser compatibility considerations, and polyfill strategies for older environments. You'll learn how these features can make your code more concise, readable, and maintainable. We'll also discuss the TC39 process and upcoming features in the pipeline that you should keep an eye on for future JavaScript versions.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="web-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-purple-100 text-purple-600 text-xs px-3 py-1 rounded-full">Web Development</span>
                        <span class="text-gray-500 text-sm">6 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Modern CSS Layouts with Grid</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 10, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Emma Davis
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        CSS Grid has transformed web layout design. Learn how to create complex, responsive layouts with minimal code...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        CSS Grid has transformed web layout design. Learn how to create complex, responsive layouts with minimal code and maximum flexibility. This comprehensive tutorial covers everything from basic grid concepts to advanced techniques like subgrid, masonry layouts, and named grid areas. We'll explore real-world layout patterns including magazine-style designs, dashboard layouts, and responsive card grids. You'll discover how to combine CSS Grid with Flexbox for optimal results, implement auto-fit and auto-fill for dynamic columns, and use grid template areas for intuitive layout definitions. The guide includes interactive examples, browser support information, and fallback strategies for older browsers. We'll also cover CSS Grid in combination with modern features like container queries and CSS custom properties for truly dynamic, maintainable layouts.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 2: Data Science -->
    <div class="mb-12" data-category="data-science">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-chart-line mr-3 text-blue-600"></i>
            Data Science
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="data-science">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">Data Science</span>
                        <span class="text-gray-500 text-sm">10 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Introduction to Machine Learning</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 8, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Dr. Alex Thompson
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Machine learning is transforming industries worldwide. This beginner-friendly guide will help you understand the fundamentals...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Machine learning is transforming industries worldwide. This beginner-friendly guide will help you understand the fundamentals of ML and get started with your first projects. We'll cover supervised learning, unsupervised learning, and reinforcement learning paradigms with practical examples. You'll learn about popular algorithms including linear regression, decision trees, random forests, support vector machines, and neural networks. The article explains how to prepare your data, split datasets for training and testing, evaluate model performance using metrics like accuracy, precision, recall, and F1 score. We'll introduce you to essential Python libraries including scikit-learn, pandas, and NumPy, and walk through building your first predictive model step-by-step. By the end, you'll understand when to apply different ML techniques and have the confidence to tackle real-world problems.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="data-science">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">Data Science</span>
                        <span class="text-gray-500 text-sm">8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Data Visualization with Python</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 5, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Lisa Wang
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Learn how to create stunning visualizations using Python's most popular libraries including Matplotlib, Seaborn, and Plotly...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Learn how to create stunning visualizations using Python's most popular libraries including Matplotlib, Seaborn, and Plotly. Data visualization is crucial for understanding patterns, communicating insights, and making data-driven decisions. This tutorial covers everything from basic plots to advanced interactive dashboards. We'll explore line plots, bar charts, scatter plots, histograms, box plots, and heatmaps with real-world datasets. You'll learn best practices for color selection, labeling, and layout to make your visualizations both beautiful and informative. The guide includes techniques for handling large datasets, creating multi-panel figures, customizing plot aesthetics, and exporting publication-quality graphics. We'll also cover interactive visualizations with Plotly that allow users to explore data dynamically, and introduce Dash for building complete data visualization web applications.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="data-science">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">Data Science</span>
                        <span class="text-gray-500 text-sm">12 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Deep Learning Fundamentals</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>January 3, 2024
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Dr. James Miller
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Dive into the world of deep learning and neural networks. Understand how these powerful models work and how to build them...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Dive into the world of deep learning and neural networks. Understand how these powerful models work and how to build them using TensorFlow and PyTorch. This comprehensive guide starts with the basics of artificial neurons and perceptrons, then progresses to multi-layer networks, backpropagation, and gradient descent optimization. We'll explore different types of neural network architectures including convolutional neural networks (CNNs) for image processing, recurrent neural networks (RNNs) for sequential data, and transformers for natural language processing. You'll learn about activation functions, loss functions, regularization techniques to prevent overfitting, and strategies for hyperparameter tuning. The article includes practical examples of building image classifiers, sentiment analyzers, and recommendation systems. We'll also discuss transfer learning, pre-trained models, and how to deploy your models to production environments.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 3: Mobile Development -->
    <div class="mb-12" data-category="mobile-development">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-mobile-alt mr-3 text-green-600"></i>
            Mobile Development
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 7 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="mobile-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">Mobile Development</span>
                        <span class="text-gray-500 text-sm">9 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Flutter vs React Native in 2024</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 28, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Carlos Rodriguez
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Choosing between Flutter and React Native? This comprehensive comparison will help you make an informed decision...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Choosing between Flutter and React Native? This comprehensive comparison will help you make an informed decision for your next mobile project. We'll analyze both frameworks across multiple dimensions including performance, developer experience, community support, and ecosystem maturity. Flutter's widget-based architecture and Dart language offer hot reload, consistent UI across platforms, and excellent performance. React Native leverages JavaScript and React, providing a familiar development experience for web developers and native module access. We'll compare build times, app size, debugging tools, and third-party library availability. The article includes real-world case studies from companies using both frameworks, performance benchmarks, and code examples showing similar features implemented in each. You'll learn about the strengths and weaknesses of each framework and get guidance on which one suits different project types and team compositions.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 8 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="mobile-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">Mobile Development</span>
                        <span class="text-gray-500 text-sm">11 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">SwiftUI: Building Modern iOS Apps</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 25, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Jennifer Lee
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        SwiftUI has revolutionized iOS development with its declarative syntax. Learn how to build beautiful apps with less code...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        SwiftUI has revolutionized iOS development with its declarative syntax. Learn how to build beautiful apps with less code and better maintainability. This in-depth guide covers SwiftUI's core concepts including views, modifiers, state management, and data flow. We'll explore property wrappers like @State, @Binding, @ObservedObject, and @EnvironmentObject to manage app state effectively. You'll learn how to create custom views and reusable components, implement navigation with NavigationView and NavigationStack, and design adaptive layouts that work across iPhone, iPad, and Mac. The tutorial includes advanced topics like animations, gestures, custom shapes and paths, and integrating UIKit components when needed. We'll build a complete app from scratch, covering networking with async/await, local data persistence with Core Data, and testing SwiftUI views. You'll also learn about the latest iOS 17 features and best practices for App Store submission.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 9 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="mobile-development">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">Mobile Development</span>
                        <span class="text-gray-500 text-sm">8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kotlin Coroutines for Android</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 22, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>David Park
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Master asynchronous programming in Android with Kotlin Coroutines. Say goodbye to callback hell and write cleaner code...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Master asynchronous programming in Android with Kotlin Coroutines. Say goodbye to callback hell and write cleaner, more maintainable asynchronous code. This practical guide explains coroutines from the ground up, starting with suspend functions and launch builders, then progressing to advanced patterns. You'll learn about coroutine scopes, contexts, and dispatchers for controlling where code executes. We'll cover structured concurrency principles, error handling with try-catch and supervisorScope, and cancellation mechanisms to prevent memory leaks. The article demonstrates real-world use cases including network requests, database operations, and UI updates. You'll discover how to combine multiple async operations with async/await, handle loading states, and implement retry logic. We'll also explore Flow for reactive programming, StateFlow and SharedFlow for state management, and integration with Jetpack Compose. Includes best practices for testing coroutines and avoiding common pitfalls.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 4: Career Advice -->
    <div class="mb-12" data-category="career-advice">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-briefcase mr-3 text-orange-600"></i>
            Career Advice
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 10 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="career-advice">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full">Career Advice</span>
                        <span class="text-gray-500 text-sm">7 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Breaking Into Tech in 2024</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 20, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Rachel Green
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Starting a career in tech can be overwhelming. This guide provides a clear roadmap for beginners looking to break into the industry...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Starting a career in tech can be overwhelming. This guide provides a clear roadmap for beginners looking to break into the industry successfully. We'll explore different career paths including frontend, backend, full-stack development, mobile development, data science, DevOps, and cybersecurity. You'll learn what skills are most in demand, which programming languages to prioritize, and how to build a portfolio that stands out. The article covers effective learning strategies, whether to pursue a bootcamp or self-study, and how to leverage online resources and communities. We'll discuss networking techniques, how to craft a compelling resume and LinkedIn profile, and tips for acing technical interviews. You'll hear success stories from career changers who made the transition, learn about common mistakes to avoid, and get advice on salary negotiations and evaluating job offers. We also cover the reality of imposter syndrome and how to overcome it.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 11 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="career-advice">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full">Career Advice</span>
                        <span class="text-gray-500 text-sm">9 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Ace Your Technical Interview</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 18, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Tom Anderson
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Technical interviews can be nerve-wracking. Learn proven strategies to prepare effectively and perform your best...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Technical interviews can be nerve-wracking. Learn proven strategies to prepare effectively and perform your best when it matters most. This comprehensive guide covers all aspects of technical interviews including coding challenges, system design, behavioral questions, and cultural fit assessments. You'll learn how to approach algorithmic problems systematically using frameworks like UEEP (Understand, Explore, Execute, Perfect), practice with LeetCode and HackerRank effectively, and recognize common problem patterns like two pointers, sliding window, and dynamic programming. We'll demystify system design interviews with examples of designing scalable systems like URL shorteners, social media feeds, and distributed caches. The article includes templates for answering behavioral questions using the STAR method, tips for thinking out loud during coding sessions, and how to handle questions you don't know. We'll also cover what to ask interviewers, follow-up best practices, and how to negotiate offers confidently.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 12 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="career-advice">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full">Career Advice</span>
                        <span class="text-gray-500 text-sm">6 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Remote Work Best Practices</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 15, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Maria Santos
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Remote work is here to stay. Discover how to stay productive, maintain work-life balance, and thrive in a remote environment...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Remote work is here to stay. Discover how to stay productive, maintain work-life balance, and thrive in a remote environment. This practical guide covers setting up an effective home office, establishing routines and boundaries, and using the right tools for collaboration. You'll learn communication strategies for distributed teams, how to combat isolation and stay connected with colleagues, and techniques for managing time zones and async work. We explore productivity systems like time blocking, the Pomodoro Technique, and deep work principles. The article addresses common remote work challenges including distractions, overworking, and Zoom fatigue, with actionable solutions. You'll discover how to stay visible and advance your career remotely, participate effectively in virtual meetings, and build relationships without face-to-face interaction. We also cover ergonomics, mental health considerations, and the pros and cons of different remote work models from fully distributed to hybrid arrangements.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 5: Student Success -->
    <div class="mb-12" data-category="student-success">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-graduation-cap mr-3 text-indigo-600"></i>
            Student Success Stories
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 13 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="student-success">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">Student Success</span>
                        <span class="text-gray-500 text-sm">5 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">From Zero to Full-Stack Developer</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 12, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Kevin Brown
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Kevin's journey from a complete beginner to landing a six-figure developer job in just 9 months...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Kevin's inspiring journey from a complete beginner to landing a six-figure developer job in just 9 months through LearnHub courses. With no prior coding experience and working a full-time retail job, Kevin dedicated evenings and weekends to learning web development. He started with HTML/CSS fundamentals, moved through JavaScript and React, then tackled Node.js and databases. Kevin shares his study routine, how he stayed motivated through difficult concepts, and the importance of building projects. He built a portfolio website, contributed to open source, and created three substantial portfolio projects including a social media app and e-commerce platform. The article details his job search strategy, how he prepared for interviews while still learning, and the moment he received his first offer. Kevin emphasizes the value of the LearnHub community, finding study partners, and not giving up when things got tough. His story proves that with dedication and the right resources, career transformation is possible.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 14 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="student-success">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">Student Success</span>
                        <span class="text-gray-500 text-sm">6 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Teacher to Data Scientist Journey</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 10, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Patricia Moore
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        How a high school teacher transitioned into data science and now works at a leading tech company...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        How Patricia, a high school math teacher for 12 years, successfully transitioned into data science and now works at a leading tech company analyzing education data. Patricia always loved mathematics and statistics but felt disconnected from modern applications. When she discovered data science, everything clicked. She enrolled in LearnHub's Data Science path while teaching full-time, learning Python, pandas, SQL, and machine learning algorithms. Patricia leveraged her educational background to understand learning algorithms and statistical concepts quickly. She shares how she balanced family life, full-time teaching, and intensive studying, typically working from 9 PM to midnight after her kids went to bed. Her first project analyzed student performance data, which became a portfolio highlight. After a year of learning and building projects, Patricia applied to data science positions and received multiple offers. She chose a EdTech company where her teaching experience was valued. Patricia discusses the importance of networking, attending data science meetups, and how her unique background became an asset rather than a hindrance.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 15 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="student-success">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">Student Success</span>
                        <span class="text-gray-500 text-sm">7 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Building a Freelance Business</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 8, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Sophia Martinez
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Sophia built a thriving freelance web development business earning $10k/month after completing LearnHub courses...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Sophia built a thriving freelance web development business earning over $10,000 per month after completing LearnHub courses, all while traveling the world. A graphic designer by trade, Sophia wanted to expand her skills to offer complete website solutions rather than just designs. She took LearnHub's Frontend and Backend courses, learning to code her designs and build full-stack applications. After three months of intense learning, she updated her portfolio to showcase interactive websites. Her first client was a local bakery needing a website - she charged $500 and delivered a beautiful, responsive site. Word spread, and more clients came through referrals. Sophia shares her pricing strategy, how she manages client expectations, and tools she uses daily including Figma, VS Code, and project management software. She discusses the challenges of freelancing including inconsistent income and difficult clients, but emphasizes the freedom and fulfillment it brings. Sophia now has recurring clients, passive income from website maintenance, and works from coffee shops around Southeast Asia.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 6: Industry Trends -->
    <div class="mb-12" data-category="industry-trends">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-chart-bar mr-3 text-red-600"></i>
            Industry Trends
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Blog Card 16 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="industry-trends">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Industry Trends</span>
                        <span class="text-gray-500 text-sm">8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">The Future of AI in 2024</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 5, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Dr. Ryan Foster
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Artificial Intelligence is evolving rapidly. Explore the latest trends and predictions for AI in 2024 and beyond...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Artificial Intelligence is evolving rapidly. Explore the latest trends and predictions for AI in 2024 and what it means for developers and businesses. This forward-looking article examines breakthrough developments in large language models, multimodal AI systems that understand text, images, and audio, and AI agents that can perform complex tasks autonomously. We analyze the impact of generative AI on creative industries, coding assistance tools revolutionizing software development, and AI in scientific research accelerating discoveries. The piece covers ethical considerations including bias mitigation, privacy concerns, and the importance of responsible AI development. You'll learn about emerging job roles in AI, skills that will be in high demand, and how traditional roles are transforming. We discuss regulatory developments, the competition between tech giants, and predictions about AGI (Artificial General Intelligence) timelines. The article includes practical advice for developers on integrating AI into applications, choosing between different AI models, and staying current in this fast-moving field.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 17 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="industry-trends">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Industry Trends</span>
                        <span class="text-gray-500 text-sm">10 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Web3 and Blockchain Demystified</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 3, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Amanda Chen
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Understanding Web3, blockchain, and cryptocurrency. A comprehensive guide to decentralized technologies...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Understanding Web3, blockchain, and cryptocurrency can be challenging. This comprehensive guide demystifies decentralized technologies and their practical applications. We start with blockchain fundamentals - how distributed ledgers work, consensus mechanisms like Proof of Work and Proof of Stake, and what makes blockchain secure and transparent. The article explores smart contracts on Ethereum and other platforms, explaining how code can automatically execute agreements without intermediaries. You'll learn about decentralized applications (dApps), decentralized finance (DeFi) protocols offering lending, trading, and yield farming, and NFTs beyond digital art. We examine real-world use cases in supply chain management, digital identity verification, and decentralized autonomous organizations (DAOs). The guide addresses common criticisms including environmental concerns, scalability challenges, and regulatory uncertainty. For developers, we cover popular Web3 development tools like Hardhat and Truffle, Solidity programming for smart contracts, and integrating wallet connections into web applications. The article concludes with career opportunities in the Web3 space and resources for continued learning.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Blog Card 18 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden blog-card" data-category="industry-trends">
                <img src="/placeholder.svg?height=200&width=400" alt="Blog" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Industry Trends</span>
                        <span class="text-gray-500 text-sm">9 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Cybersecurity in the Modern Era</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        <i class="fas fa-calendar mr-2"></i>December 1, 2023
                        <span class="mx-2">•</span>
                        <i class="fas fa-user mr-2"></i>Marcus Johnson
                    </p>
                    <div class="blog-preview text-gray-700 mb-4">
                        Cybersecurity threats are becoming more sophisticated. Learn about the latest security trends and how to protect yourself...
                    </div>
                    <div class="blog-content hidden text-gray-700 mb-4">
                        Cybersecurity threats are becoming more sophisticated every day. Learn about the latest security trends and how to protect yourself and your applications in an increasingly connected world. This essential guide covers the current threat landscape including ransomware attacks, phishing campaigns, supply chain vulnerabilities, and zero-day exploits. We examine how attackers operate, common attack vectors, and why traditional security measures are no longer sufficient. The article explores modern security practices including zero-trust architecture, multi-factor authentication, encryption best practices, and secure coding principles. You'll learn about security testing methodologies like penetration testing and vulnerability scanning, and tools for identifying security flaws before attackers do. We discuss cloud security considerations as more infrastructure moves to AWS, Azure, and GCP, including proper IAM configuration and data protection strategies. The guide covers compliance requirements like GDPR and CCPA, incident response planning, and what to do if breached. For developers, we provide a security checklist covering input validation, SQL injection prevention, XSS protection, and secure session management.
                    </div>
                    <button onclick="toggleBlog(this)" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                        <span class="toggle-text">Read More</span>
                        <i class="fas fa-chevron-down ml-2 toggle-icon"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>




<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/blog.js"></script>