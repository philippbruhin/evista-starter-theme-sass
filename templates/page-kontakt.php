<?php
    /**
    * Template Name: Kontakt Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();
add_action('wp_footer','hook_googlemaps');

$telefon = get_field("telefon",$post->ID);
$email = get_field("email",$post->ID);
$address = get_field("address",$post->ID);
$directions_link = get_field("directions_link",$post->ID);
$google_map = get_field("google_map",$post->ID);
?>

<main>
    

    <div class="kontaktSection">
        <div class="kontaktLeft">
            <div class="kontaktContainer">                
                <div class="formDetails">
                    <h1 class="sectionTitle"><?php the_title(); ?></h1>
                    <?php if($telefon): 
                    $string = preg_replace('/\s+/', '', $telefon);
                    ?>
                    <strong>TELEFON </strong>
                    <a href="tel:<?php echo $string; ?>"><?php echo $telefon; ?></a><br />
                    <?php endif; ?>
                    <?php if($email): ?>
                    <strong>E-MAIL </strong>
                    <a href="mailto:<?php echo(encode_email($email)); ?>"><?php echo(encode_email($email)); ?></a><br />
                    <?php endif; ?>
                    <?php if($address): ?>
                    <strong>ADRESSE </strong>
                    <address><?php echo $address; ?></address>
                    <?php endif; ?>
                    <?php if($directions_link): ?>
                    <a href="<?php echo $directions_link; ?>" class="directions">Anfahrt &#10230;</a>
                    <?php endif; ?>                    
                </div>  
                <div class="contactForm">
                    <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form"]'); ?>
                </div>                
            </div>
        </div>
        <div class="kontaktRight">
        

            <div id="maps" style="width:100%;"></div>
        </div>
    </div> 
</main>

<?php get_footer(); ?>