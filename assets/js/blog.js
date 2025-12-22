// Toggle Blog Card Expand/Collapse
function toggleBlog(button) {
    const card = button.closest('.blog-card');
    const preview = card.querySelector('.blog-preview');
    const content = card.querySelector('.blog-content');
    const toggleText = button.querySelector('.toggle-text');
    const toggleIcon = button.querySelector('.toggle-icon');

    if (content.classList.contains('hidden')) {
        // Expand
        preview.classList.add('hidden');
        content.classList.remove('hidden');
        toggleText.textContent = 'Read Less';
        toggleIcon.classList.remove('fa-chevron-down');
        toggleIcon.classList.add('fa-chevron-up');

        console.log('Blog expanded:', card.querySelector('h3').textContent);
    } else {
        // Collapse
        content.classList.add('hidden');
        preview.classList.remove('hidden');
        toggleText.textContent = 'Read More';
        toggleIcon.classList.remove('fa-chevron-up');
        toggleIcon.classList.add('fa-chevron-down');

        console.log('Blog collapsed:', card.querySelector('h3').textContent);
    }
}

// Search Functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');

    function filterBlogs() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;
        const blogCards = document.querySelectorAll('.blog-card');
        
        // Find the category sections (the parent containers)
        const sections = document.querySelectorAll('div[data-category]');

        blogCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const preview = card.querySelector('.blog-preview').textContent.toLowerCase();
            const content = card.querySelector('.blog-content').textContent.toLowerCase();
            const category = card.getAttribute('data-category');

            const matchesSearch = title.includes(searchTerm) ||
                preview.includes(searchTerm) ||
                content.includes(searchTerm);
            const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Hide entire section if no cards are visible in it
        sections.forEach(section => {
            const visibleCards = section.querySelectorAll('.blog-card[style="display: block;"]');
            if (visibleCards.length === 0 && selectedCategory !== 'all') {
                section.style.display = 'none';
            } else {
                section.style.display = 'block';
            }
        });

        console.log('Filtered blogs - Search:', searchTerm, 'Category:', selectedCategory);
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterBlogs);
    }
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterBlogs);
    }

    console.log('Blog page loaded with 18 blog posts across 6 categories');
});