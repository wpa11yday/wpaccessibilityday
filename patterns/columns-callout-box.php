<?php
/**
 * Title: Columns with Callout Box
 * Slug: wp-accessibility-day/columns-callout-box
 * Categories: columns
 *
 * @package wp-accessibility-day
 */

?>

<!-- wp:columns -->
<div class="wp-block-columns">
    <!-- wp:column -->
    <div class="wp-block-column">
        <!-- wp:paragraph -->
        <p>There are also broad groups of people who do not identify as disabled but who also benefit from accessible features on the web. Accessible websites are easier for translation tools to accurately translate into another language. They have good color contrast which makes them easier to read for all people, especially on a mobile phone outside in the sun. And, they frequently have less JavaScript and animations that can slow download times and hurt search engine optimization.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"backgroundColor":"light-blue"} -->
    <div class="wp-block-column has-light-blue-background-color has-background">
        <!-- wp:cover {"url":"<?php echo get_template_directory_uri(); ?>/assets/figure.svg","id":3833,"dimRatio":0,"className":"callout-box-background"} -->
        <div class="wp-block-cover callout-box-background">
            <span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
            <img class="wp-block-cover__image-background wp-image-3833" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/figure.svg" data-object-fit="cover"/>
            <div class="wp-block-cover__inner-container">
                <!-- wp:paragraph {"textColor":"black","fontSize":"x-large","style":{"typography":{"lineHeight":"1.3"}}} -->
                <p class="has-black-color has-text-color has-link-color has-x-large-font-size" style="line-height:1.3"><strong>Accessible websites benefit everyone.</strong></p>
                <!-- /wp:paragraph -->
            </div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->