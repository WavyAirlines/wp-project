<?php
  get_header();

  // Get the shop page ID if WooCommerce is active, else set it to false
  $shop_page_id = class_exists('WooCommerce') ? wc_get_page_id('shop') : false;

  // Get the featured image URL of the shop page if it exists, else set it to an empty array
  $shopFeaturedImg = $shop_page_id && has_post_thumbnail($shop_page_id) ? wp_get_attachment_image_src(get_post_thumbnail_id($shop_page_id), 'full') : array();

?>
<section class="shop-masthead">
  <div class="mastheadDiv" style="background-image: url('<?php echo isset($shopFeaturedImg[0]) ? $shopFeaturedImg[0] : ''; ?>');">
    <h1 class="masthead-text">Shop Page!</h1>
  </div>
</section>
<section class="shop-body">
  <?php
    // Output WooCommerce shop loop if WooCommerce is active
    echo do_action('woocommerce_before_shop_loop') . do_shortcode('[products columns="4"]') . do_action('woocommerce_after_shop_loop');
  ?>
</section>
<?php
  get_footer();
?>
