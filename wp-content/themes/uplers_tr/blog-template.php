<?php 
/**
 * Template Name: Blog Template
 * 
*/
get_header();
?>
<?php 
    //Retriving the ACF Fields Data
    $page_title = get_field('page_title');
    $page_description = get_field('page_description');
?>

<section class="herobar">
    <div class="container">
        <h1 class="hero-title"><?php echo $page_title; ?></h1>
        <p class="hero-desc"><?php echo $page_description; ?></p>
    </div>
</section>

<?php
    //Retriving the data from Posts feed
    $args = array(
        'post_type' => 'post', //default posts
        'posts_per_page' => -1, //Getting all posts without limitation
    );

    //Storing the feed data into variable
    $posts = new WP_Query($args);
?>

<section class="postcover">
    <div class="container post-group">
        <?php if ($posts->have_posts()) : ?>
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="item-post">
                    <div class="feat-img" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
                        <?php
                            //Getting category data
                            $all_cats = get_the_category();
                            if (!empty($all_cats)) :
                                //Getting the first category data
                                $first_cat = $all_cats[0];
                                $first_cat_name = $first_cat->name;
                                $first_cat_link = get_category_link($first_cat->term_id);
                                //Displaying the first category on frontend
                                echo '<div class="category_badge"><a href="' . esc_url($first_cat_link) . '">' . esc_html($first_cat_name) . '</a></div>';
                            endif;
                        ?>
                    </div>
                    <div class="post-meta">
                        <div class="pm-date">
                            <?php echo get_the_date(); ?>
                        </div>
                        <?php if(get_field('reading_time')): ?>
                            <div class="pm-read">
                                <?php echo get_field('reading_time').' Minutes Read'; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-excerpt">
                        <?php echo get_excerpt(80, 'the_content'); ?>
                    </div>
                    <div class="post-tags">
                        <?php
                            $post_tags = get_the_tags();
                            
                            if($post_tags):
                                echo "<ul>";
                                    foreach ($post_tags as $tag) {
                                        echo "<li><a href='" . get_tag_link($tag->term_id) . "'>" . $tag->name . "</a></li>";
                                }
                            endif;
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>