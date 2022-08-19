<article class="article">
  <header>
    <h2 class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </header>
  <?php if ( get_the_post_thumbnail() ): ?>
    <figure class="article_figure">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('content_panel_image'); ?>
      </a>
    </figure>
  <?php endif; ?>
  <div class="article_summary">
    <?php the_excerpt(); ?>
  </div>
</article>
