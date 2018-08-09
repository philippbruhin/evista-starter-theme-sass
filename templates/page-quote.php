<?php
    /**
    * Template Name: Quote Page
    *
    * @package WordPress
    * @subpackage Keller
    */

get_header();
$telefon = get_field("telefon",9);
$email = get_field("email",9);
?>

<main>
    <div class="estimation">
        <div class="estimationTop"></div>
        <div class="estimationForm">
            <h1 class="sectionTitle"><?php the_title(); ?></h1>
            <div class="estimationDetails">
                <div class="estimationInfo">
                    <?php if($telefon): 
                    $string = preg_replace('/\s+/', '', $telefon);
                    ?>
                    <strong>TELEFON </strong>
                    <a href="tel:<?php echo $string; ?>"><?php echo $telefon; ?></a><br />
                    <?php endif; ?>
                </div>
                <div class="estimationInfo">
                    <?php if($email): ?>
                    <strong>E-MAIL </strong>
                    <a href="mailto:<?php echo(encode_email($email)); ?>"><?php echo(encode_email($email)); ?></a><br />
                    <?php endif; ?>    
                </div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="168" title="Quote Form"]'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>