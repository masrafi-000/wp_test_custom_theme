<?php
/*
Template Name: Fully Dynamic Blog
*/
get_header();

// অ্যাডমিন প্যানেল থেকে সেকশন ডাটা নিয়ে আসা
$sections = get_post_meta(get_the_ID(), '_learnhub_sections', true);
?>

<!-- Header Section (Static or Customize via Customizer) -->
<div class="bg-linear-to-r from-purple-600 to-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php the_title(); ?></h1>
        <p class="text-xl text-purple-100">Dynamic Content Powered by WordPress Meta</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <?php
    if (!empty($sections) && is_array($sections)):
        foreach ($sections as $section):
    ?>
            <!-- Dynamic Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
                    <i class="<?php echo esc_attr($section['icon']); ?> mr-3 text-purple-600"></i>
                    <?php echo esc_html($section['title']); ?>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <?php
                    if (!empty($section['cards']) && is_array($section['cards'])):
                        foreach ($section['cards'] as $card):
                    ?>
                            <!-- Dynamic Card -->
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition hover:-translate-y-2">
                                <img src="<?php echo esc_url($card['image'] ? $card['image'] : 'placeholder.jpg'); ?>" alt="Blog" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo esc_html($card['title']); ?></h3>
                                    <p class="text-gray-600 text-sm mb-4">
                                        <?php echo esc_html($card['desc']); ?>
                                    </p>
                                    <button onclick="toggleContent(this)" class="text-purple-600 font-bold hover:text-purple-800">
                                        Read More &rarr;
                                    </button>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>

                </div>
            </div>
    <?php
        endforeach;
    else:
        echo "<p class='text-center text-gray-500'>অ্যাডমিন প্যানেল থেকে সেকশন যোগ করুন।</p>";
    endif;
    ?>

</div>

<script>
    function toggleContent(btn) {
        alert("Full Content: " + btn.previousElementSibling.innerText);
    }
</script>

<?php get_footer(); ?>