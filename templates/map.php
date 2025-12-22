<?php

/*
Template Name: Map
*/
get_header();
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col items-center gap-6  ">

    <div class="w-full flex justify-center">
        <form
            id="map_form"
            class="w-full max-w-3xl grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-white rounded-xl shadow">
            <!-- Name -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    name="name"
                    placeholder="John Doe"
                    required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="john@email.com"
                    required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Phone -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">Phone</label>
                <input
                    type="text"
                    name="phone"
                    placeholder="+1 555 123 4567"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Country -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">Country</label>
                <input
                    type="text"
                    name="country"
                    value="United States"
                    class="px-4 py-2 border rounded-md bg-gray-100 focus:outline-none" />
            </div>

            <!-- State -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">State</label>
                <input
                    type="text"
                    name="state"
                    placeholder="CA"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- City -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">City</label>
                <input
                    type="text"
                    name="city"
                    placeholder="San Francisco"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- ZIP -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">ZIP Code</label>
                <input
                    type="text"
                    name="zip"
                    placeholder="94105"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Road -->
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">Road</label>
                <input
                    type="text"
                    name="road"
                    placeholder="Market Street"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- House -->
            <div class="flex flex-col gap-1 md:col-span-2">
                <label class="text-sm font-medium text-gray-700">House / Apartment</label>
                <input
                    type="text"
                    name="house"
                    placeholder="Apt 4B"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Submit -->
            <div class="md:col-span-2">
                <button
                    type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div id="leaflet_map" class="w-full h-125 border-2 rounded-md border-red-400"></div>
</section>


<?php get_footer(); ?>