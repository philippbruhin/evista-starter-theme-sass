<?php 
$copyright = get_field("copyright",9); 
$telefon = get_field("telefon",9); 
$email = get_field("email",9); 
$address = get_field("address",9); 
?>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/logo2.svg" alt="" /> 
                <a class="footerNav" href="<?php echo get_permalink(3); ?>"><?php echo get_the_title(3); ?></a>
                <?php if($address): ?>
                <address><?php echo $address; ?></address>
                <?php endif; ?>
                <?php if($telefon): 
                    $string = preg_replace('/\s+/', '', $telefon);
                    ?>
                <a href="tel:<?php echo $string; ?>"><?php echo $telefon; ?></a>
                <?php endif; ?>
                <?php if($email): ?>
                <a href="mailto:<?php echo(encode_email($email)); ?>"><?php echo(encode_email($email)); ?></a>
                <?php endif; ?>

                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> <?php echo $copyright; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

	<?php wp_footer(); ?>

</body>

</html>
