<?php get_header(); ?>
<main id="content">
  <article class="single-case-study container">
    <h1><?= get_the_title() ?></h1>
    <?= get_the_post_thumbnail() ?>
    <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <?php the_content() ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </article>
</main>
<?php get_footer();
