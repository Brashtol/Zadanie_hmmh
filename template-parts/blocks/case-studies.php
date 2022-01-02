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
    <button data-filter="all"><?= __('All', 'zadanie_hmmh') ?></button>
    <?php foreach($categories as $category): ?>
      <button data-filter="<?= $category->term_id ?>"><?= $category->name ?></button>
    <?php endforeach; ?>
  </div>
  <div class="case-studies__inner container">
    <div class="row">
      <?php foreach($case_studies as $case_study):
        $category = wp_get_post_categories($case_study, ['fields' => 'id=>name']);
        // var_dump($category);
        ?>
        <div class="case-study col-lg-6" data-category="<?= array_keys($category)[0] ?>" data-sort="value">
          <?= get_the_post_thumbnail($case_study, 'large') ?>
          <p class="case-study__categories"><?= array_pop($category) ?></p>
          <h2 class="case-study__heading"><?= get_the_title($case_study) ?></h2>
          <?php if(+get_field('is_external_url')): ?>
            <a href="<?= get_field('is_external_url') ?>"><?= __('View case study website', 'zadanie_hmmh') ?></a>
          <?php else: ?>
            <a href="<?= get_permalink($case_study) ?>"><?= __('See case study details', 'zadanie_hmmh') ?></a>
          <?php endif; ?>
        </div>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
