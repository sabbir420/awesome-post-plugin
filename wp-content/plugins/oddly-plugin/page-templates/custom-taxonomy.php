<?php

/* 
Template Name: Custom Taxonomy Template
*/

get_header(); ?>
<h1>Custom 2 Columns Template</h1>
<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">
 <label>
 <span class="offscreen"><?php echo _x( 'Search for:', 'label' ) ?></span>
 <input type="search" class="search-field"
 placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
 value="<?php echo get_search_query() ?>" name="s" id="s"
 title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
 </label>
 <input type="submit" id="searchsubmit" value="Search" />
</form>
<?php 
    // $option_template = get_option( 'oddly_plugin_tem' ) ?: array();
    // foreach ($option_template as $option) {
    //     $left = isset($option['left']) ? "TRUE" : "FALSE";
    //     $right = isset($option['right']) ? "TRUE" : "FALSE";
    // }
    $options_left = get_option( 'oddly_plugin_tem_left' );
    //echo $options_left;
    $options_right = get_option( 'oddly_plugin_tem_right' );
?>
<?php
    if($options_left == 1){
?>
    <h1>Custom Left 2 Columns Template</h1>
<?php } ?>
<?php
    if($options_right == 1){
?>
    <h1>Custom Right 2 Columns Template</h1>
<?php } ?>
<p>This is loading properly!</p>

<?php
get_footer();