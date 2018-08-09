<?php
$kontakt_form_title = get_field("kontakt_form_title",9);
$telefon = get_field("telefon",9);
$email = get_field("email",9);
$address = get_field("address",9);
$directions_link = get_field("directions_link",9);

?>

<div class="whiteContainer">
        <div class="container-fluid">
            <?php if($kontakt_form_title): ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">                                  
                    <h2 class="sectionTitle"><?php echO $kontakt_form_title; ?></h2>                
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5">   
                    <div class="formDetails">
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
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7">   
                    <div class="contactForm">
                        <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form"]'); ?>
                    </div>
                </div>
            </div>            
        </div>
    </div>



