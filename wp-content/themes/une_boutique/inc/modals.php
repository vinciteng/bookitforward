<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
<div id="login_modal" class="reveal-modal small">
	<div class="modal-header">
		<h3><?php _e( 'Have an account? Please <strong>sign in</strong>', 'une_boutique' ); ?></h3>
	</div>
	<div class="modal-content">
		<form method="post" id="login-form" class="login active cleafix">
			<?php do_action( 'woocommerce_login_form_start' ); ?>
			<div class="row collapse">
				<div class="small-2 fixed-size columns">
					<span class="prefix"><i aria-hidden="true" class="ub-icon-user"></i></span>
				</div>
				<div class="small-10 columns">
					<input type="text" class="input-text" name="username" id="username-modal" placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?>" autofocus required />
				</div>
			</div>
			<div class="row collapse">
				<div class="small-2 fixed-size columns">
					<span class="prefix"><i aria-hidden="true" class="ub-icon-key2"></i></span>
				</div>
				<div class="small-10 fixed-size columns">
					<input class="input-text" type="password" name="password" id="password-modal" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" required />
				</div>
			</div>
			<div class="clear"></div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button round alignleft" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" /> 
				<label for="rememberme_modal" class="inline alignright no-margin-bottom no-padding-bottom">
					<input name="rememberme" type="checkbox" id="rememberme_modal" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label>
			</p>
			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</form>
		<span class="clear"></span>
	</div>
	<div class="modal-footer clearfix">
		<div class="alignright not_memeber"><?php _e('Not a member yet?','une_boutique'); ?> <a href="#" data-reveal-id="register_modal"><strong><?php _e('Create an account','une_boutique'); ?></strong></a></div>
		<div class="alignleft">
			<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
		</div>
	</div>
</div>

<!-- Register Modal -->

<div id="register_modal" class="reveal-modal small">
	<div class="modal-header">
		<h3><?php _e('Not a member yet?','une_boutique'); ?> <strong><?php _e('Create an account','une_boutique'); ?></strong></h3>
	</div>
	<div class="modal-content">
		<form method="post" class="register clearfix">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( get_option( 'woocommerce_registration_generate_username' ) === 'no' ) : ?>

			<div class="row collapse">
				<div class="small-2 fixed-size columns">
					<span class="prefix"><i aria-hidden="true" class="ub-icon-user"></i></span>
				</div>
				<div class="small-10 columns">
					<input required placeholder="<?php _e( 'Username', 'woocommerce' ); ?> *" type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) esc_attr_e( $_POST['username'] ); ?>" />
				</div>
			</div>

			<?php endif; ?>

			<div class="row collapse form-row form-row-wide">
				<div class="small-2 fixed-size columns">
						<span class="prefix"><i aria-hidden="true" class="ub-icon-paperplane"></i></span>
				</div>
				<div class="small-10 columns">
					<input required placeholder="<?php _e( 'Email address', 'woocommerce' ); ?> *" type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) esc_attr_e( $_POST['email'] ); ?>" />
				</div>
			</div>

			<div class="row collapse form-row form-row-first">
				<div class="small-2 fixed-size columns">
					<span class="prefix"><i aria-hidden="true" class="ub-icon-key2"></i></span>
				</div>
				<div class="small-10 fixed-size columns">
					<input required placeholder="<?php _e( 'Password', 'woocommerce' ); ?> *" type="password" class="input-text" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) esc_attr_e( $_POST['password'] ); ?>" />
				</div>
			</div>

			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
				<input type="submit" class="button round no-margin-bottom" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
		<span class="clear"></span>
	</div>
	<div class="modal-footer clearfix">
		<div class="alignright not_memeber"><?php _e('have an account? Please','une_boutique'); ?> <a href="#" data-reveal-id="login_modal"><strong><?php _e('sign in','une_boutique'); ?></strong></a></div>
		<div class="alignleft">
			<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){"use strict";$('#login_modal').foundation('reveal',{opened:function(){$('html').addClass('reveal-open');},closed: function(){$('html').removeClass('reveal-open');},animationSpeed:280,});$('#register_modal').foundation('reveal',{opened:function(){$('html').addClass('reveal-open');},closed: function(){$('html').removeClass('reveal-open');},animationSpeed:280,});});
</script>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>