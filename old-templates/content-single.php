<?php while (have_posts()) : the_post(); ?>
  <article class="article">
    <header>
      <h1 class="article_title article_title-large"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <?php if ( get_the_post_thumbnail() ): ?>
      <figure class="article_figure">
        <a href="<?php echo get_thumb_url(); ?>">
          <?php the_post_thumbnail('thumbnail_image-single'); ?>
        </a>
      </figure>
    <?php endif; ?>
    <div class="article_text">
      <?php the_content(); ?>
    </div>
    <footer class="article_footer">
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
