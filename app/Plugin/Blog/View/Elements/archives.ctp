<?php
if (empty($archives)) {
  return;
}
//pr($archives);
?>
<section id="archives">
  <header>
    <h3><?php echo __('Archives'); ?></h3>
  </header>
  <nav>
    <?php echo $this->Blog->nav($archives); ?>
  </nav>
</section>
