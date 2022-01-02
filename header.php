<?php
/**
 * The header for our theme.
 */

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="author" content="Konrad Traczyk">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
      var ajaxurl = '<?= admin_url('admin-ajax.php'); ?>';
    </script>
    <?php wp_head(); ?>
</head>
<body <?= body_class() ?>>
  <header>
    <div class="container">
      <div class="menu-section">
        <?php
  				if(has_nav_menu("primary")) {
  					wp_nav_menu(array(
  						'menu_class' => "",
  						'container_class' => "menu-secondary",
  						'container' => "nav",
  						'container_id' => "menu",
  						'theme_location' => "primary",
  						'items_wrap' => '<ul id="%1$s" class="%2$s" tabindex="-1">%3$s</ul>',
  					));
  				}
        ?>
        <div class="mobile-button-wrapper">
          <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
  </header>
