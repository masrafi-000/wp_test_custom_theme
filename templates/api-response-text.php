<?php
/*
Template Name: API State Management Demo
*/
get_header(); 
?>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-gray-50 min-h-screen py-10 font-sans">
    <div class="max-w-4xl mx-auto px-4">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Advanced State Management</h1>
            <p class="text-gray-500">React Query logic using Vanilla JS</p>
        </div>

        <!-- ২. মিউটেশন সেকশন (Data Create/POST) -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8 border-l-4 border-green-500">
            <h3 class="text-lg font-bold mb-4">Create New Post (Mutation)</h3>
            <form id="mutation-form" class="space-y-4">
                <input type="text" id="post-title" placeholder="Post Title" class="w-full border p-2 rounded focus:ring-2 focus:ring-green-200 outline-none" required>
                <textarea id="post-body" placeholder="Post Details..." class="w-full border p-2 rounded focus:ring-2 focus:ring-green-200 outline-none" required></textarea>
                <button type="submit" id="submit-btn" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition flex items-center gap-2">
                    <span>Publish Post</span>
                    <!-- মিউটেশন লোডার -->
                    <svg id="mutation-loader" class="hidden animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                </button>
            </form>
        </div>

        <!-- ১. ডাটা ফেচ সেকশন (Query List) -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4 border-b pb-4">
                <h2 class="text-xl font-semibold text-gray-700">All Posts</h2>
                <div class="flex items-center gap-3">
                    <span id="status-indicator" class="text-xs font-bold px-2 py-1 rounded bg-gray-200 text-gray-600">IDLE</span>
                    <button id="refetch-btn" class="text-blue-600 hover:underline text-sm font-medium">
                        Refetch Data
                    </button>
                </div>
            </div>

            <!-- UI Container (স্টেট অনুযায়ী কন্টেন্ট বদলাবে) -->
            <div id="ui-container" class="min-h-[200px] relative">
                
                <!-- State: Loading -->
                <div id="view-loading" class="hidden absolute inset-0 flex flex-col justify-center items-center bg-white z-10">
                    <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-600"></div>
                    <p class="text-blue-600 mt-2 text-sm">Fetching data...</p>
                </div>

                <!-- State: Error -->
                <div id="view-error" class="hidden flex flex-col items-center justify-center h-40 text-red-500 bg-red-50 rounded-lg border border-red-100">
                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <p id="error-msg" class="font-medium">Error loading data</p>
                </div>

                <!-- State: Success (Data List) -->
                <div id="view-success" class="grid grid-cols-1 gap-4">
                    <!-- JS দিয়ে আইটেম এখানে আসবে -->
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
/**
 * Simple State Management System (jQuery Version)
 */
const app = {
    // 1. Initial State (Same as before)
    state: {
        status: 'idle',
        data: [],
        error: null,
        isMutating: false
    },

    // 2. DOM Elements (jQuery Selectors)
    // $ চিহ্ন দিয়ে ভেরিয়েবল নাম শুরু করা হয় যাতে বোঝা যায় এগুলি jQuery অবজেক্ট
    elements: {
        container: $('#ui-container'),
        viewLoading: $('#view-loading'),
        viewError: $('#view-error'),
        viewSuccess: $('#view-success'),
        errorMsg: $('#error-msg'),
        statusBadge: $('#status-indicator'),
        refetchBtn: $('#refetch-btn'),
        form: $('#mutation-form'),
        submitBtn: $('#submit-btn'),
        mutationLoader: $('#mutation-loader')
    },

    // 3. Initialize
    init() {
        this.fetchPosts();

        // Event Listeners (jQuery Style)
        this.elements.refetchBtn.on('click', () => this.fetchPosts());
        this.elements.form.on('submit', (e) => this.handleMutation(e));
    },

    // 4. State Update & Render
    setState(newState) {
        this.state = { ...this.state, ...newState };
        this.render();
    },

    render() {
        const { status, error, data, isMutating } = this.state;
        const el = this.elements;

        // স্ট্যাটাস ব্যাজ আপডেট (.text(), .removeClass(), .addClass())
        el.statusBadge.text(status.toUpperCase());
        
        // সব ক্লাস রিমুভ করে নতুন ক্লাস দেওয়া
        el.statusBadge.removeClass('bg-green-100 text-green-700 bg-red-100 text-red-700 bg-blue-100 text-blue-700');
        if (status === 'success') el.statusBadge.addClass('bg-green-100 text-green-700');
        else if (status === 'error') el.statusBadge.addClass('bg-red-100 text-red-700');
        else el.statusBadge.addClass('bg-blue-100 text-blue-700');

        // View কন্ট্রোল (.toggleClass() দিয়ে hide/show)
        // jQuery তে সরাসরি .hide() বা .show() ও ব্যবহার করা যায়, কিন্তু এখানে আমরা Tailwind এর 'hidden' ক্লাস টগল করছি
        el.viewLoading.toggleClass('hidden', status !== 'loading');
        el.viewError.toggleClass('hidden', status !== 'error');
        el.viewSuccess.toggleClass('hidden', status !== 'success');

        if (status === 'error') {
            el.errorMsg.text(error);
        }

        // ডাটা রেন্ডার (.html())
        if (status === 'success' && data) {
            const htmlContent = data.map(post => `
                <div class="border p-4 rounded hover:bg-gray-50 transition">
                    <h4 class="font-bold text-gray-800 capitalize">${post.title}</h4>
                    <p class="text-gray-600 text-sm mt-1">${post.body.substring(0, 100)}...</p>
                </div>
            `).join('');
            el.viewSuccess.html(htmlContent);
        }

        // মিউটেশন (.prop() বা .attr())
        el.submitBtn.prop('disabled', isMutating);
        el.mutationLoader.toggleClass('hidden', !isMutating);
        el.submitBtn.find('span').text(isMutating ? 'Saving...' : 'Publish Post');
    },

    // 5. Query Function ($.ajax instead of fetch)
    fetchPosts() {
        this.setState({ status: 'loading', error: null });

        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                setTimeout(() => {
                    this.setState({ status: 'success', data: data });
                }, 2000);
            },
            error: (xhr, status, err) => {
                this.setState({ status: 'error', error: 'Failed to fetch data' });
            }
        });
    },

    // 6. Mutation Function
    handleMutation(e) {
        e.preventDefault();
        
        // jQuery .val()
        const title = $('#post-title').val();
        const body = $('#post-body').val();

        this.setState({ isMutating: true });

        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            method: 'POST',
            contentType: 'application/json; charset=UTF-8',
            data: JSON.stringify({ title, body }),
            success: (newPost) => {
                const currentData = this.state.data;
                const updatedData = [newPost, ...currentData];
                
                this.setState({ 
                    isMutating: false, 
                    data: updatedData,
                    status: 'success'
                });

                // ফর্ম রিসেট
                $('#mutation-form')[0].reset(); // jQuery অবজেক্ট থেকে DOM এলিমেন্ট নিয়ে রিসেট
                alert('Post Created Successfully! (ID: ' + newPost.id + ')');
            },
            error: () => {
                this.setState({ isMutating: false });
                alert('Error creating post');
            }
        });
    }
};

// অ্যাপ চালু করা (jQuery Ready)
$(document).ready(() => {
    app.init();
});
</script>

<?php get_footer(); ?>