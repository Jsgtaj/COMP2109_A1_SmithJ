<!-- Main html -->
<?php
  /**
    * Template Name: Homepage Layout
    * Template Post Type: page
  **/
  get_header();
?>
<main>
<section class="masthead">
  <hr class="rule">
  <h1><?php the_field('masthead_title');?></h1>
  <h2><?php the_field('masthead_subtitle');?></h2>
</section>
<section class="row_one">
  <div id="featured-images">
    <img src="<?php the_field('row_one_image_one');?>" alt="image-one">
    <img src="<?php the_field('row_one_image_two');?>" alt="image-two">
    <img src="<?php the_field('row_one_image_three');?>" alt="image-three">
  </div>
</section>
<section class="row_two">
<!-- Dynamic list of posts -->
  <?php
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => '8',
    );
    $arr_posts = new WP_QUERY($args);
    if($arr_posts->have_posts()) :
      while($arr_posts->have_posts()) :
        $arr_posts->the_post();
  ?>
  <article id="post-<?php the_ID()?>" <?php post_class();?>>
  <?php
      if (has_post_thumbnail()) :
      the_post_thumbnail();
      endif;
  ?>
  <header class="entry-header">
    <h3><?php the_title(); ?></h3>
  </header>
      <div>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>">Read More</a>
      </div>
  </article>
  <?php
    endwhile;
  endif;
?>
</section>
</main>
<?php
  get_footer();
?>
<!-- Inline CSS for ACF -->
<style>
  h1,h2,h3,h4,h5,h6{
    font-family: "Inter", Arial, Helvetica, sans-serif !important;
  }
  .masthead h1, .masthead h2{
    text-align: center;
  }
  #featured-images{
    display: flex;
    justify-content: center;
  }
  #featured-images > img{
    margin-top: 1rem;
    width: 30vw;
    height: auto;
  }
  .rule{
    height: 3px;
    margin-top: 1rem;
    margin-bottom: 1rem;
    background-color: var(--global--color-primary);
    width: 80vw;
  }
  .row_two{
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .row_two article{
    border-radius: 0.1rem;
    padding: 1rem;
    margin-top: var(--global--spacing-vertical);
    max-width: 80vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background-color: #01000122;
  } 
  .row_two article > header{
   padding-bottom: calc(0.5 * var(--global--spacing-vertical)) !important;
  }
  .row_two article img{
   margin-top: var(--global--spacing-vertical);
  }
</style>