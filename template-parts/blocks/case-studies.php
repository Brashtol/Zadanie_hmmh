<?php

$case_studies = get_field('case_studies');
$categories = get_terms([
  'taxonomy' => 'category',
  'hide_empty' => true,
]);

?>
<?php if($case_studies): ?>
<div class="case-studies">
  <div class="case-studies__filters">
    <button data-filter="all" class="active"><?= __('All', 'zadanie_hmmh') ?></button>
    <?php foreach($categories as $category): ?>
      <button data-filter="<?= $category->term_id ?>"><?= $category->name ?></button>
    <?php endforeach; ?>
  </div>
  <div class="case-studies__inner">
    <div class="row">
      <?php foreach($case_studies as $case_study):
        $category = wp_get_post_categories($case_study, ['fields' => 'id=>name']);
        $is_external = +get_field('is_external_url');
        $url = $is_external ? get_field('is_external_url') : get_permalink($case_study);
        $url_txt = $is_external ? 'View case study website' : 'See case study details';
        ?>
        <div class="case-study col-md-6" data-category="<?= array_keys($category)[0] ?>" data-sort="value">
          <?= get_the_post_thumbnail($case_study, 'large') ?>
          <div class="case-study__wrapper">
            <p class="case-study__categories"><?= array_pop($category) ?></p>
            <h2 class="case-study__heading"><?= get_the_title($case_study) ?></h2>
            <a class="case-study__link" href="<?= $url ?>"><?= __($url_txt, 'zadanie_hmmh') ?></a>
          </div>
        </div>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
