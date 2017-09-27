<?php
  $facebook = get_field('facebook', 'option');
  $twitter = get_field('twitter', 'option');
  $linkedin = get_field('linkedin', 'option');
  $instagram = get_field('instagram', 'option'); 
  $googleplus = get_field('google_plus', 'option');
?>
<div class="social">
  <?php if($facebook): ?>
    <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-official"></i></a>
  <?php endif; if($twitter): ?>
    <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
  <?php endif; if($linkedin): ?>
    <a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
  <?php endif; if($instagram): ?>
    <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
  <?php endif; if($googleplus): ?>
    <a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a>
  <?php endif; ?>
</div>
