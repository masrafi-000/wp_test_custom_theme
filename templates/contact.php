<?php

/*
Template Name: Contact
*/
get_header();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold  mb-4">Get In Touch</h2>
        <p class="text-xl  max-w-2xl mx-auto">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Contact Form -->
        <div class="bg-white rounded-xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h3>
            <form id="contactForm">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="John Doe">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="john@example.com">
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="How can we help?">
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 resize-none" placeholder="Tell us more about your inquiry..."></textarea>
                </div>

                <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-medium hover:bg-purple-700 transition-colors">Send Message</button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="space-y-6">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold  mb-2">Email</h4>
                        <p class="">support@learnhub.com</p>
                        <p class="">info@learnhub.com</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold  mb-2">Phone</h4>
                        <p class="">+1 (555) 123-4567</p>
                        <p class="">Mon-Fri 9am-6pm EST</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold  mb-2">Office</h4>
                        <p class="">123 Learning Street</p>
                        <p class="">San Francisco, CA 94102</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-8">
                <h4 class="text-xl font-bold mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white rounded-xl p-8 md:p-12">
        <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Frequently Asked Questions</h3>
        <div class="space-y-6 max-w-3xl mx-auto">
            <div class="border-b border-gray-200 pb-6">
                <h4 class="text-xl font-bold text-gray-800 mb-2">How do I enroll in a course?</h4>
                <p class="text-gray-600">Simply browse our course catalog, select the course you're interested in, and click the "Enroll" button. You'll need to create an account if you haven't already.</p>
            </div>
            <div class="border-b border-gray-200 pb-6">
                <h4 class="text-xl font-bold text-gray-800 mb-2">What payment methods do you accept?</h4>
                <p class="text-gray-600">We accept all major credit cards, PayPal, and various other payment methods depending on your location.</p>
            </div>
            <div class="border-b border-gray-200 pb-6">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Can I get a refund?</h4>
                <p class="text-gray-600">Yes! We offer a 30-day money-back guarantee on all courses. If you're not satisfied, contact our support team for a full refund.</p>
            </div>
            <div class="pb-6">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Do courses have deadlines?</h4>
                <p class="text-gray-600">Most of our courses are self-paced, allowing you to learn at your own speed. Some specialized programs may have specific timelines.</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>