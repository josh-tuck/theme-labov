<?php get_header() ?>

<div class="news-header small">

</div>

<div id="post">
  <div class="wrap clearfix">

    <div class="left">
      <?php if ( have_posts() ) : ?>

        <div class="single-post">

      	<?php while ( have_posts() ) : the_post(); ?>

        <!-- Begin Post Content  -->
        <?php 
		        $image = get_field('news_hero_image');
		        if( !empty($image) ): ?>
		        
		        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img__post" />
		      
		      <?php endif; ?>
        <h1><?php the_title() ?></h1>
        <hr>
        <div class="meta">
          <?php the_time('F j, Y') ?> <span>//</span>
          <?php
          $categories = get_the_category();
          $category_names = array();
          foreach ($categories as $category)
          {
              $category_names[] = $category->cat_name;
          }
          echo implode(', ', $category_names);
          ?>
        </div>
        <div class="content">
	        

          <?php the_content() ?>

        </div>
        <!-- // End Post Content  -->
        
        <div class="postCTA">
          <a href="#mainFtr" class="btn">Talk With Us</a>

          <?php
            // vars
            $field = get_field_object('vert_link');
            $value = $field['value'];
            $label = $field['choices'][ $value ];
          ?>
          <a href="<?php echo $value; ?>" class="btn btn--alt" data-attr="<?php echo $label; ?>"><?php echo $label; ?></a>

        </div> <!-- END .postCTA -->
        
        <div class="postTags">
          <?php the_tags( '<h6 class="hdln hdln--tag">More articles about:</h6>', $sep, $after ); ?>
        </div> <!-- END .postTags -->

      	<?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="right">
      <label for="s">Search</label>
      <form method="get" action="<?php echo site_url("") ?>">
        <input type="text" name="s" value="">
      </form>

      <h2>Categories</h2>
      <?php wp_list_categories(array('title_li' => '')) ?>
    </div>

  <div class="pagination clearfix">
    <span class="prev"><?php previous_posts_link('NEWER &raquo;'); ?></span>
    <span class="next"><?php next_posts_link('&laquo; OLDER'); ?></span>
  </div>

  </div>
</div>

<?php get_footer() ?>
