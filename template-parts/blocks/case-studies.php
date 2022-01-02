<?php

$case_studies = get_field('case_studies');
?>
<?php if($case_studies): ?>
<div class="case-studies">
  <?php foreach($case_studies as $case_study):
      setup_postdata($post); ?>
      <div class="case-study">
      </div>
  <?php endforeach; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
