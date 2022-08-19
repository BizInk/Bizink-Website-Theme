<?php while (have_posts()) : the_post(); ?>
  <article class="article">
    <header>
      <h2 class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <?php if ( get_the_post_thumbnail() ): ?>
      <figure class="article_figure article_figure-float">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('thumbnail_image'); ?>
        </a>
      </figure>
    <?php endif; ?>
    <div class="article_text">
      <?php the_excerpt(); ?>
    </div>
  </article>
<?php endwhile; ?>
