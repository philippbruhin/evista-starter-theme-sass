<?php
    /**
    * Template Name: About Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();
$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image-retina', false ); 
$intro_text = get_field("intro_text",$post->ID); 
$intro_image = get_field("intro_image",$post->ID); 
$introBig = wp_get_attachment_image_src( $intro_image, 'feature-image-retina', false ); 
$introSmall = wp_get_attachment_image_src( $intro_image, 'feature-image-mobile', false ); 
?>



<main>
    <div class="mainImage" <?php if($mainImg): ?>style="background-image:url(<?php echO $mainImg[0]; ?>);"<?php endif; ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <div class="mainHead">
                        <h1>Über Üns</h1>        
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <div class="teamSection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <ul class="navigation">
                        <li><a href="<?php echo get_permalink(7); ?>" class="active">Unternehmen</a></li>
                        <li><a href="<?php echo get_permalink(96); ?>"><?php echo get_the_title(96); ?></a></li>
                    </ul>
                    <div class="cms-content">
                        <?php if($intro_text): ?>
                        <?php echo $intro_text; ?>
                        <?php endif; ?>
                        <?php if($intro_image): ?>
                        <img class="aligncenter" src="<?php echO $introSmall[0]; ?>" srcset="<?php echo $introSmall[0]; ?> 700w, <?php echo $introBig[0]; ?> 900w" alt="" />
                        <?php endif; ?>
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