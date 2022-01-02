<?php get_header(); ?>
<main id="content">
    <article class="single">
        <div class="row">
            <div class="content-wrapper">
                <h1><?= get_the_title() ?></h1>
                <div class="content-wrapper-inner">
                    <div class="col col-12 col-lg-4 col-md-6"> <?= get_the_post_thumbnail() ?></div>
                    <div class="col col-12 col-lg-8 col-md-6">
                        <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                        <?php the_content() ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<?php get_footer();
