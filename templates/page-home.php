<?php
    /**
    * Template Name: Home Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();

$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image-retina', false ); 
$main_title = get_field("main_title",$post->ID); 
$main_image = get_field("main_image",$post->ID); 
$companyImg = wp_get_attachment_image_src( $main_image, 'square-retina', false ); 
$partners = get_field("partners",$post->ID); 
$works = get_field("works",$post->ID); 
?>
<main>
    <div class="homeHero" <?php if($mainImg): ?>style="background-image:url(<?php echo $mainImg[0]; ?>);"<?php endif; ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <?php if($main_title): ?>
                    <h1><?php echo $main_title; ?></h1>        
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">          
                    <div class="homeCTA">
                        <div class="ctaLeft" <?php if($mainImg): ?>style="background-image:url(<?php echo $companyImg[0]; ?>);"<?php endif; ?>>
                            <span><?php wp_title(); ?></span>
                        </div>
                        <div class="ctaRight">
                            <div class="ctaBox">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>  
                            </div>
                            <a href="<?php echo get_permalink(7); ?>" class="smallLink"><?php echo get_the_title(7); ?> &#10230;</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

            
    <div class="serviceCTA">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">           
                    <h2 class="sectionTitle">Dienstleistungen</h2>
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
                    <ul>
                        <?php while ( $query->have_posts() ): $query->the_post(); 
                        $icon = wp_get_attachment_image_src( get_field("service_icon",$post->ID), 'full', false ); 
                        ?>
                        <li><a href="<?php echo get_permalink(); ?>"><span><img src="<?php echo $icon[0]; ?>" alt="" /></span><?php the_title(); ?></a></li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                    <?php endif; ?>
                    <div class="buttonGroup">
                        <a href="<?php echo get_permalink(11); ?>" class="button full">Offerte anfordern &#10230;</a>
                        <a href="<?php echo get_permalink(16); ?>" class="button line">Mehr erfahren &#10230;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>         
    <?php if($partners): ?>
    <div class="whiteContainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">                                  
                    <h2 class="sectionTitle">Partner</h2>
                    <ul class="partnerList">
                        <?php foreach($partners as $item): 
                            $mainImg = wp_get_attachment_image_src( $item['logo'], 'feature-image-retina', false ); 
                            ?>
                        <li><span class="partnerItem" style="background-image:url(<?php echo $mainImg[0]; ?>);"><?php echo $item['partner_name']; ?></span></li>                        
                        <?php endforeach; ?>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($works): ?>
    <div class="image-gallery works">        
        <?php foreach($works as $item): 
            $mainImg = wp_get_attachment_image_src( $item['image'], 'feature-image-retina', false ); 
            $mainImgMobile = wp_get_attachment_image_src( $item['image'], 'feature-image-mobile', false ); 
            ?>
        <div>
            <img src="images/works1.jpg" alt="" />
            <img src="<?php echo $mainImgMobile[0]; ?>" srcset="<?php echo $mainImgMobile[0]; ?> 700w, <?php echo $mainImg[0]; ?> 900w" alt="Keller Works" />
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>