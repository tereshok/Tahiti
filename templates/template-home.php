<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	
	<!-- BEGIN of main content -->
<section id="discover" class="discover-tahiti__section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
                <div class="cell">
                    <div class="discover__title">
                        <?php if(get_field('discover_tahiti_title')) : ?>
                            <h3><?php the_field('discover_tahiti_title') ?></h3>
                        <?php endif; ?>
                        <?php if(get_field('discover_tahiti_subtitle')) : ?>
                            <p><?php the_field('discover_tahiti_subtitle') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x discover-card">
                <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                    );

                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post(); ?>
                            <div class="cell large-3 medium-6 small-12 discover__post">
                                <?php if(get_the_post_thumbnail()) : ?>
                                <?php echo get_the_post_thumbnail(get_the_id(), 'full', ['alt' => get_the_title()]); ?>
                                <?php endif; ?>
                                <div class="discover__post_content">
                                    <h5><?php the_title() ?></h5>
                                    <p><?php the_excerpt() ?></p>
                                </div>
                                <?php $btn_bg_price = ( get_field('price_link_color') ? get_field('price_link_color') : 'btn-default') ?>
                                <a href="<?php the_permalink() ?>" class="<?php echo $btn_bg_price ?>">
                                    <p>
                                        <span>
                                            <?php if(get_field('price_pretext')) : ?>
                                                <?php the_field('price_pretext') ?>
                                            <?php endif; ?>
                                        </span>
                                        <?php if(get_field('price_text')) : ?>
                                            <?php the_field('price_text') ?>
                                        <?php endif; ?>
                                    </p>
                                    <img class="discover-arrow" src="<?php echo get_template_directory_uri()?>/assets/images/arrow.svg" alt="arrow">
                                </a>
                            </div>
                        <?php }
                    }
                wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x discover-select">
            <div class="cell discover-select__block">
                <?php if(get_field('discover_tahiti_select_title')) : ?>
                    <p class="discover-select__title"><?php the_field('discover_tahiti_select_title') ?></p>
                <?php endif; ?>
                <div class="discover-select__content">
                    <select id="my-select">
                        <option><?php _e('Select an island', 'Tahiti') ?></option>
                        <?php
                        $args = array(
                            'posts_per_page' => -1,
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post(); ?>
                                <option value="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </option>
                            <?php }
                        }
                        wp_reset_postdata(); ?>
                    </select>
                    <?php $btn_bg_discover = ( get_field('discover_tahiti_button_color') ? get_field('discover_tahiti_button_color') : 'btn-default') ?>
                    <a href="" class="my-button <?php echo $btn_bg_discover?>">
                        <?php if(get_field('discover_tahiti_button_text')) : ?>
                            <?php the_field('discover_tahiti_button_text') ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $image = get_field('experience_tahiti_background'); ?>
<section id="experience" class="experience-tahiti-section" <?php bg($image); ?>>
<div class="experience-tahiti-bg">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <div class="experience-section__title">
                    <?php if(get_field('experience_tahiti_title')) : ?>
                        <h3><?php the_field('experience_tahiti_title') ?></h3>
                    <?php endif; ?>
                    <?php if(get_field('experience_tahiti_subtitle')) : ?>
                        <p><?php the_field('experience_tahiti_subtitle') ?></p>
                    <?php endif; ?>
                </div>
                <div class="experience-section__content">
                    <?php if(get_field('experience_tahiti_text')) : ?>
                        <p><?php the_field('experience_tahiti_text') ?></p>
                    <?php endif; ?>
                    <?php
                        $link_experience = get_field('experience_tahiti_button_link');
                        if( $link_experience ):
                        $link_experience_url = $link_experience['url'];
                        $link_experience_title = $link_experience['title'];
                    ?>
                    <?php $btn_bg_experience = ( get_field('experience_tahiti_button_color') ? get_field('experience_tahiti_button_color') : 'btn-default') ?>
                    <a class="<?php echo $btn_bg_experience ?>" href="<?php echo esc_url( $link_experience_url ); ?>">
                        <?php echo esc_html( $link_experience_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section id="travel-guides" class="why-tahiti-section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell why-tahiti-section__title">
                <?php if(get_field('why_tahiti_title')) : ?>
                    <h3><?php the_field('why_tahiti_title') ?></h3>
                <?php endif; ?>
            </div>
            <?php if( have_rows('why_tahiti_content') ): ?>
               <?php while( have_rows('why_tahiti_content') ) : the_row(); ?>
                    <div class="cell large-4  medium-4 small-12 why-tahiti-section__content">
                        <p><?php the_sub_field('why_tahiti_content_text'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $image = get_field('book_section_background'); ?>
<section id="about" class="book-section" <?php bg($image); ?>>
    <div class="grid-container">
        <div class="grid-x grid-margin-x large-margin-collapse">
            <div class="cell book-section__content">
                <?php if(get_field('book_section_title')) : ?>
                    <h3><?php the_field('book_section_title') ?></h3>
                <?php endif; ?>
                <?php if(get_field('book_section_content')) : ?>
                    <p><?php the_field('book_section_content') ?></p>
                <?php endif; ?>

                <?php
                $link_book = get_field('book_section_button_link');
                if( $link_book):
                    $link_book_url = $link_book['url'];
                    $link_book_title = $link_book['title'];
                    ?>
                <?php $btn_bg_book = ( get_field('book_section_button_color') ? get_field('book_section_button_color') : 'btn-default') ?>
                    <a class="<?php echo $btn_bg_book ?>" href="<?php echo esc_url( $link_book_url ); ?>"><?php echo esc_html( $link_book_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

	<!-- END of main content -->

<?php get_footer(); ?>