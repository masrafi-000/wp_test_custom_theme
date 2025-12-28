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

<script>
/**
 * Simple State Management System (Like a mini React Query)
 */
const app = {
    // 1. Initial State
    state: {
        status: 'idle', // 'idle' | 'loading' | 'error' | 'success'
        data: [],
        error: null,
        isMutating: false
    },

    // 2. DOM Elements
    elements: {
        container: document.getElementById('ui-container'),
        viewLoading: document.getElementById('view-loading'),
        viewError: document.getElementById('view-error'),
        viewSuccess: document.getElementById('view-success'),
        errorMsg: document.getElementById('error-msg'),
        statusBadge: document.getElementById('status-indicator'),
        refetchBtn: document.getElementById('refetch-btn'),
        form: document.getElementById('mutation-form'),
        submitBtn: document.getElementById('submit-btn'),
        mutationLoader: document.getElementById('mutation-loader')
    },

    // 3. Initialize
    init() {
        // প্রথম লোডেই ডাটা ফেচ করা (React এর useEffect এর মতো)
        this.fetchPosts();

        // ইভেন্ট লিসেনার সেট করা
        this.elements.refetchBtn.addEventListener('click', () => this.fetchPosts());
        this.elements.form.addEventListener('submit', (e) => this.handleMutation(e));
    },

    // 4. State Update & Render Function (React এর setState + render)
    setState(newState) {
        this.state = { ...this.state, ...newState };
        this.render();
    },

    render() {
        const { status, error, data, isMutating } = this.state;
        const el = this.elements;

        // স্ট্যাটাস ব্যাজ আপডেট
        el.statusBadge.innerText = status.toUpperCase();
        el.statusBadge.className = `text-xs font-bold px-2 py-1 rounded ${
            status === 'success' ? 'bg-green-100 text-green-700' :
            status === 'error' ? 'bg-red-100 text-red-700' :
            'bg-blue-100 text-blue-700'
        }`;

        // View কন্ট্রোল (Loading/Error/Success)
        el.viewLoading.classList.toggle('hidden', status !== 'loading');
        el.viewError.classList.toggle('hidden', status !== 'error');
        el.viewSuccess.classList.toggle('hidden', status !== 'success');

        // এরর মেসেজ সেট করা
        if (status === 'error') {
            el.errorMsg.innerText = error;
        }

        // ডাটা লিস্ট রেন্ডার করা (Success হলে)
        if (status === 'success' && data) {
            el.viewSuccess.innerHTML = data.map(post => `
                <div class="border p-4 rounded hover:bg-gray-50 transition">
                    <h4 class="font-bold text-gray-800 capitalize">${post.title}</h4>
                    <p class="text-gray-600 text-sm mt-1">${post.body.substring(0, 100)}...</p>
                </div>
            `).join('');
        }

        // মিউটেশন (বাটন ডিজেবল ও লোডার)
        el.submitBtn.disabled = isMutating;
        el.mutationLoader.classList.toggle('hidden', !isMutating);
        el.submitBtn.querySelector('span').innerText = isMutating ? 'Saving...' : 'Publish Post';
    },

    // 5. Query Function (Data Fetching)
    fetchPosts() {
        // লোডিং স্টেট সেট করা
        this.setState({ status: 'loading', error: null });

        fetch('https://jsonplaceholder.typicode.com/posts')
            .then(res => {
                if (!res.ok) throw new Error('Failed to fetch data');
                return res.json();
            })
            .then(data => {
                // সাকসেস স্টেট সেট করা
                // (অল্প ডিলে দিচ্ছি যাতে লোডার বোঝা যায়)
                setTimeout(() => {
                    this.setState({ status: 'success', data: data });
                }, 500); 
            })
            .catch(err => {
                // এরর স্টেট সেট করা
                this.setState({ status: 'error', error: err.message });
            });
    },

    // 6. Mutation Function (Data Posting)
    handleMutation(e) {
        e.preventDefault();
        
        const title = document.getElementById('post-title').value;
        const body = document.getElementById('post-body').value;

        // মিউটেশন শুরু
        this.setState({ isMutating: true });

        fetch('https://jsonplaceholder.typicode.com/posts', {
            method: 'POST',
            body: JSON.stringify({ title, body}),
            headers: { 'Content-type': 'application/json; charset=UTF-8' },
        })
        .then(res => res.json())
        .then(newPost => {
            // Optimistic Update এর মতো নতুন ডাটা লিস্টের শুরুতে যোগ করা
            const currentData = this.state.data;
            const updatedData = [newPost, ...currentData];
            
            this.setState({ 
                isMutating: false, 
                data: updatedData,
                status: 'success' // নিশ্চিত করা যে আমরা সাকসেস ভিউতে আছি
            });

            // ফর্ম রিসেট
            e.target.reset();
            alert('Post Created Successfully! (ID: ' + newPost.id + ')');
        })
        .catch(err => {
            this.setState({ isMutating: false });
            alert('Error creating post');
        });
    }
};

// অ্যাপ চালু করা
document.addEventListener('DOMContentLoaded', () => {
    app.init();
});
</script>

<?php get_footer(); ?>