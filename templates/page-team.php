<?php
    /**
    * Template Name: Team Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();
$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-image-retina', false ); 
$team = get_field("team_members",$post->ID); 
?>

<main>
    <div class="mainImage" <?php if($mainImg): ?>style="background-image:url(<?php echO $mainImg[0]; ?>);"<?php endif; ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">     
                    <div class="mainHead">
                        <h1>Team</h1>        
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
                        <li><a href="<?php echo get_permalink(7); ?>">Unternehmen</a></li>
                        <li><a href="<?php echo get_permalink(96); ?>" class="active"><?php echo get_the_title(96); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if($team): ?>
        <div class="container-fluid">
            <div class="row">
                <?php foreach($team as $item): 
                        $mainImg = wp_get_attachment_image_src( $item['image'], 'team-image-retina', false ); 
                        $mainImgMobile = wp_get_attachment_image_src( $item['image'], 'team-image-mobile', false ); 
                    ?>
                <div class="col-xs-6 col-sm-4 col-md-3"> 
                    <div class="teamMember">
                        <img src="<?php echo $mainImgMobile[0]; ?>" srcset="<?php echo $mainImgMobile[0]; ?> 700w, <?php echo $mainImg[0]; ?> 900w" alt="<?php echo $item['name']; ?>'" />
                        <em><?php echo $item['name']; ?> </em>
                        <strong><?php echo $item['title']; ?></strong>
                    </div>
                </div>
                <?php endforeach; ?>                                                  
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>