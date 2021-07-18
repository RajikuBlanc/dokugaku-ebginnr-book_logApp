<?php
$a =1;

if ($a<2) {
    echo $a . 'は2よりも小さい' . PHP_EOL;
} else {
    $a . 'は2以上' . PHP_EOL;
}
?>




<div>
  <figure>
    <?php
        $args = array(
          'width' => 300,
          'height'=>203
        );
        echo get_avatar($author, 400, 'mystery', 'ユーザー画像', $args);
      ?>
  </figure>

  <div>
    <!-- SNSリスト -->
    <p><?php echo get_the_author();?></p>
    <ul>
      <!-- Twitter -->
      <?php
        if (get_the_author_meta('author_twitter')) {?>
      <li>
        <a href="<?php echo the_author_meta('author_twitter')?>">
          <p>Twitter</p>
        </a>
      </li>
      <?php } ?>
      <!-- FaceBook -->
      <?php
        if (get_the_author_meta('author_facebook')) {?>
      <li>
        <a href="<?php echo the_author_meta('author_facebook')?>">
          <p>FaceBook</p>
        </a>
      </li>
      <?php } ?>
      <!-- Inatagram -->
      <?php
        if (get_the_author_meta('author_instagram')) {?>
      <li>
        <a href="<?php echo the_author_meta('author_instagram')?>">
          <p>Instagram</p>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>
<!-- テキスト -->
<p><?php the_author_meta('description'); ?></p>