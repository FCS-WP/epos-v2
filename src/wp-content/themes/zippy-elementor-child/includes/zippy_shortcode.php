<?php

/**
 * Buttons Categories 
 */
add_shortcode('buttons_categories', 'butons_categories_callback');

function butons_categories_callback()
{

?>

    <div class="wrapper-button-categories">
        <div class="wrapper-button">
            <?php
            wp_list_categories(array(
                // 'show_option_all' => 'All Blog',
                'class' => 'post-category flex',
                'show_count' => true,
                'title_li' => ''
            ));
            ?>
        </div>
    </div>

<?php

}

function hotspot_business_map_shortcode()
{
    $background_journey_map = get_field('background_journey_map');
    $hotspot_group = get_field('hotspot_group');

    ob_start();
?>
    <div class="business-container">
        <div class="business-map">
            <img src="<?php echo $background_journey_map['url']; ?>" alt="<?php echo $background_journey_map['alt']; ?>" class="background-image">
            <?php if ($background_journey_map): ?>
                <div class="nav-button-container">
                    <button class="nav-button prev"><img src="/wp-content/uploads/2025/02/left-arrow.png"></button>
                    <button class="nav-button next"><img src="/wp-content/uploads/2025/02/right-arrow.png"></button>
                </div>
            <?php endif; ?>

            <div class="hotspot-container">

                <?php foreach ($hotspot_group as $hotspot) : ?>
                    <?php if ($hotspot['image_hotspot']): ?>
                        <div class="hotspot-wrapper <?php echo $hotspot['class_name_hotspot']; ?>" style="top: <?php echo $hotspot['position_hotspot']['top']; ?>%; left: <?php echo $hotspot['position_hotspot']['left']; ?>%;z-index: <?php echo $hotspot['position_hotspot']['z-index']; ?>;">
                            <img class="hotspot-icon <?php echo $hotspot['class_name_hotspot']; ?>" src="<?php echo $hotspot['image_hotspot']['url']; ?>" data-target="<?php echo $hotspot['class_name_hotspot']; ?>">
                            <?php if ($hotspot['content_hotspot']['title']): ?>
                                <div class="info-box" id="<?php echo $hotspot['class_name_hotspot']; ?>">
                                    <?php if ($hotspot['content_hotspot']['title']): ?>
                                        <div class="info-title"><?php echo $hotspot['content_hotspot']['title']; ?></div>
                                    <?php endif; ?>
                                    <?php if ($hotspot['content_hotspot']['content']): ?>
                                        <div class="info-content">
                                            <ul>
                                                <?php foreach ($hotspot['content_hotspot']['content'] as $content) : ?>
                                                    <li><?php echo $content['title_content']; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <!-- End hotspot-container -->

            <!-- Mobile info-box -->
            <div class="mobile-info-box">
                <div class="info-box-content"></div>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('business_map', 'hotspot_business_map_shortcode');
