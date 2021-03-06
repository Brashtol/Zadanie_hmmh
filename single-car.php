<?php get_header();

$car_mechanics = get_field('car_mechanics');
?>
<main id="content">
  <article class="single-car container">
    <?= wp_get_attachment_image(get_field('img'), 'fullsize'); ?>
    <h1><?= get_the_title() ?></h1>
    <h2 style="font-size: 24px"><?= __('Specyfikacja', 'zadanie_hmmh') ?></h2>
    <p><?= get_field("brand").", ".get_field('model').", ".get_field('year_of_production') ?></p>
    <h2 style="font-size: 24px"><?= __('Mechanicy/Mechanikowie', 'zadanie_hmmh') ?></h2>
    <ul>
      <?php foreach($car_mechanics as $mechanic): ?>
        <li><?= $mechanic['user_firstname']." ".$mechanic['user_firstname']." - ".$mechanic['user_email'] ?></li>
      <?php endforeach; ?>
    </ul>
    <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <?php the_content() ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </article>
</main>
<?php get_footer();
