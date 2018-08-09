<?php get_header();
$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image-retina', false ); 

?>



<main>
    <div class="mainImage" <?php if($mainImg): ?>style="background-image:url(<?php echO $mainImg[0]; ?>);"<?php endif; ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <div class="mainHead">
                        <h1>404 Not found</h1>        
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <div class="aboutSection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">   
                    <div class="cms-content">

                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php get_footer(); ?>
