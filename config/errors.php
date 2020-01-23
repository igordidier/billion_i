<?php  if (count($error_array) > 0) : ?>
  <div class="error">
    <?php foreach ($error_array as $error_array) : ?>
      <p><?php echo $error_array ?></p>
    <?php endforeach ?>
  </div>
<?php  endif ?>
