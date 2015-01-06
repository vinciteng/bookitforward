<?php
	/*
	 * This file will generate 404 error page.
	 */	
get_header(); ?>

                <section id="content-holder" class="container-fluid">
                <section class="container">
                  <div class="row-fluid">
                    <section class="span12 wrapper error-page">';
                      <h1 class="heading-404"> <?php echo __('404','cp_front_end'); ?> </h1>
                      <h3 class="sub-heading-404"> <?php echo __('We are sorry! But the page you were looking for does not exist.','cp_front_end'); ?> </h3>
                    </section>
                  </div>
                  </section>
                </section>

<!--content-separator-->
<?php get_footer();?>
