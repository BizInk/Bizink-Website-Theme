<?php
$categories = get_the_category();
$separator = ', ';
$catOutput = '';
if($categories){
  foreach($categories as $category) {
    $catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . 
      esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' .
      $category->cat_name.'</a>'.$separator;
  }
  $catOutput = trim($catOutput, $separator);
}

$author = '<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '" rel="author" class="fn">' . get_the_author() . '</a>';
$time = '<time class="updated" datetime="' . get_the_time('c') . '">' . get_the_date() . '</time>';


?>

<p class="byline">
  <?php _e(sprintf( 'Posted by %s on %s in %s', $author, $time, $catOutput ), 'bizink'); ?>
  | <a href="<?php comments_link(); ?>">
      <?php comments_number(__('0 comments', 'bizink'), __('1 comment', 'bizink'), __('% comments', 'bizink')); ?>
    </a>
</p>
