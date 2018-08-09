<?php
    /**
    * Template Name: Service Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();
$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-full', false ); 
$currentID = $post->ID;
$gallery = get_field("gallery", $post->ID); 

?>

<main>
    




    <div class="mainImage" <?php if($mainImg): ?>style="background-image:url(<?php echO $mainImg[0]; ?>);"<?php endif; ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <div class="mainHead">
                        <h1><?php the_title(); ?></h1>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grayContainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">  
                <?php
                    $args = [
                        'post_type'             => 'page',                                                
                        'orderby'               => 'menu_order',
                        'post_status'           => 'publish',
                        'order'                 => 'ASC',
                        'meta_key'              => '_wp_page_template',
                        'meta_value'            => 'templates/page-service.php'
                                           
                    ];
                    $query = new WP_Query( $args );
                    
                    if ( $query->have_posts() ):                      
                    ?>
                    <span class="serviceToggle">Dienstleistungen <i class="fa fa-chevron-right"></i></span>                     
                    <ul class="serviceNav">
                        <?php while ( $query->have_posts() ): $query->the_post(); 
                        $icon = wp_get_attachment_image_src( get_field("service_icon",$post->ID), 'full', false ); 
                        ?>
                        <li><a href="<?php echo get_permalink(); ?>"<?php if($currentID == $post->ID): echo ' class="active"'; endif; ?>><span><img src="<?php echo $icon[0]; ?>" alt="<?php the_title(); ?>" /></span><?php the_title(); ?></a></li>
                        <?php endwhile; wp_reset_query(); ?>
                        
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <?php if(!$gallery): ?>
                <div class="col-xs-12 col-sm-12 col-md-12">   
                <?php else: ?>
                <div class="col-xs-12 col-sm-5 col-md-5">   
                <?php endif; ?>
                    <div class="serviceContent cms-content">
                        <h1><?php the_title(); ?></h1>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>  
                    </div>
                </div>
                <?php if($gallery): ?>
                <div class="col-xs-12 col-sm-7 col-md-7">   
                    <div class="serviceGallery">            
                        <?php foreach( $gallery as $image ): ?>
                        <div style="background-image:url(<?php echo $image['sizes']['gallery-mobile']; ?>);"><span class="workTitle"><?php echo $image['caption']; ?>&nbsp;</span></div>                    
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php get_sidebar('form'); ?>

 
</main>

<?php get_footer(); ?>