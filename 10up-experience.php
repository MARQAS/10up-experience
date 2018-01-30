<?php
/**
 * 10up Experience MU plugin
 */

namespace tenup;

/**
 * Let's setup our 10up menu in the toolbar
 *
 * @param object $wp_admin_bar
 */
function add_about_menu( $wp_admin_bar ) {
	if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) {
		$wp_admin_bar->add_menu( array(
			'id' => '10up',
			'title' => '<span class="ab-icon tenup-icon"></span>',
			'href' => admin_url( 'admin.php?page=10up-about' ),
			'meta' => array(
				'title' => '10up',
			),
		) );

		$wp_admin_bar->add_menu( array(
			'id' => '10up-about',
			'parent' => '10up',
			'title' => esc_html__( 'About 10up', 'tenup' ),
			'href' => esc_url( admin_url( 'admin.php?page=10up-about' ) ),
			'meta' => array(
				'title' => esc_html__( 'About 10up', 'tenup' ),
			),
		) );

		$wp_admin_bar->add_menu( array(
			'id' => '10up-team',
			'parent' => '10up',
			'title' => esc_html__( 'Team', 'tenup' ),
			'href' => esc_url( admin_url( 'admin.php?page=10up-team' ) ),
			'meta' => array(
				'title' => esc_html__( 'Team', 'tenup' ),
			),
		) );

		if ( defined( 'TENUP_SUPPORT' ) && 3 === TENUP_SUPPORT ) {
			$wp_admin_bar->add_menu( array(
				'id' => '10up-support',
				'parent' => '10up',
				'title' => esc_html__( 'Support', 'tenup' ),
				'href' => esc_url( admin_url( 'admin.php?page=10up-support' ) ),
				'meta' => array(
					'title' => esc_html__( 'Support', 'tenup' ),
				),
			) );
		}
	}

}
add_action( 'admin_bar_menu', 'tenup\add_about_menu', 11 );

/**
 * Setup scripts for customized admin experience
 */
function admin_enqueue_scripts() {
	global $pagenow;

	wp_enqueue_style( '10up-admin', content_url( 'mu-plugins/10up-experience/assets/css/admin.css' ) );

	if ( 'admin.php' === $pagenow && ! empty( $_GET['page'] ) && ( '10up-about' === $_GET['page'] || '10up-team' === $_GET['page'] || '10up-support' === $_GET['page'] ) ) {
		wp_enqueue_style( '10up-about', content_url( 'mu-plugins/10up-experience/assets/css/tenup-pages.css' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'tenup\admin_enqueue_scripts' );

function enqueue_scripts() {
	wp_enqueue_style( '10up-admin', content_url( 'mu-plugins/10up-experience/assets/css/admin.css' ) );
}
add_action( 'wp_enqueue_scripts', 'tenup\enqueue_scripts' );

/**
 * Output about screens
 */
function main_screen() {
	?>
	<div class="wrap about-wrap">

		<h1><?php esc_html_e( 'Welcome to 10up', 'tenup' ); ?></h1>

		<div class="about-text"><?php esc_html_e( 'We make web publishing easy. Maybe even fun.', 'tenup' ); ?></div>

		<a class="tenup-badge" href="http://10up.com" target="_blank"><span aria-label="<?php esc_html_e( 'Link to 10up.com', 'tenup' ); ?>">10up.com</span></a>

		<h2 class="nav-tab-wrapper">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=10up-about' ) ); ?>" class="nav-tab <?php if ( '10up-about' === $_GET['page'] ) : ?>nav-tab-active<?php endif; ?>"><?php esc_html_e( 'About Us', 'tenup' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=10up-team' ) ); ?>" class="nav-tab <?php if ( '10up-team' === $_GET['page'] ) : ?>nav-tab-active<?php endif; ?>"><?php esc_html_e( 'Our Team', 'tenup' ); ?></a>
			<?php if ( defined( 'TENUP_SUPPORT' ) && 3 === TENUP_SUPPORT ) : ?>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=10up-support' ) ); ?>" class="nav-tab <?php if ( '10up-support' === $_GET['page'] ) : ?>nav-tab-active<?php endif; ?>"><?php esc_html_e( 'Support', 'tenup' ); ?></a>
			<?php endif; ?>
		</h2>

		<div class="section-wrapper">
			<?php if ( '10up-about' === $_GET['page'] ) : ?>
				<?php about_screen(); ?>
			<?php elseif ( '10up-support' === $_GET['page'] ) : ?>
				<div class="section section-support">
					<?php get_template_part( 'tenup', 'support' ); ?>
				</div>
			<?php else : ?>
				<?php team_screen(); ?>
			<?php endif; ?>
		</div>
		<hr>
	</div>
<?php
}

/**
 * Output HTML for about screen
 */
function about_screen() {
	?>
	<div class="section section-about">
		<h2><?php esc_html_e( "We make web publishing and content management easy – maybe even fun.", 'tenup' ); ?></h2>

		<p><?php esc_html_e( "We make content management simple with our premiere web design &amp; development consulting services, by contributing to open platforms like WordPress, and by providing tools and products that make web publishing a cinch.", 'tenup' ); ?></p>

		<p><?php esc_html_e( "We’re a group of people built to solve problems; made to create; wired to delight. From beautiful pixels to beautiful code, we constantly improve the things around us, applying our passions to our clients’ projects and goals. Sometimes instead of resting, always instead of just getting it done.", 'tenup' ); ?></p>

		<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/10up-image-1.jpg' ) ); ?>" alt="">

		<h3><?php esc_html_e( "Building Without Boundaries", 'tenup' ); ?></h3>
		<p><?php esc_html_e( "The best talent isn’t found in a single zip code, and an international clientele requires a global perspective. From New York City to Salt Spring Island, our distributed model empowers us to bring in the best strategists, designers, and engineers, wherever they may be found. As of September 2014, 10up has over 80 full time staff; veterans of commercial agencies, universities, start ups, non profits, and international technology brands, our team has an uncommon breadth.", 'tenup' ); ?></p>

		<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/10up-image-2.jpg' ) ); ?>" alt="">

		<h3><?php esc_html_e( "Full Service Reach", 'tenup' ); ?></h3>

		<p><strong><?php esc_html_e( "Strategy:", 'tenup' ); ?></strong> <?php esc_html_e( "Should I build an app or a responsive website? Am I maximizing my ad revenue? Why don’t my visitors click “sign up”? How many 10uppers does it take to screw in a website? We don’t just build: we figure out the plan.", 'tenup' ); ?></p>

		<p><strong><?php esc_html_e( "Design:", 'tenup' ); ?></strong> <?php esc_html_e( "Inspiring design brings the functional and the beautiful; a delightful blend of art and engineering. We focus on the audience whimsy and relationship between brand and consumer, delivering design that works.", 'tenup' ); ?></p>

		<p><strong><?php esc_html_e( "Engineering:", 'tenup' ); ?></strong> <?php esc_html_e( "Please. Look under the hood. Our team of sought after international speakers provides expert code review for enterprise platforms like WordPress.com VIP. Because the best website you have is the one that’s up.", 'tenup' ); ?></p>

		<p class="center"><a href="<?php echo esc_url( admin_url( 'admin.php?page=10up-team' ) ); ?>" class="button button-large button-primary"><?php esc_html_e( "Learn more about 10up", 'tenup' ); ?></a></p>
	</div>
	<?php
}

/**
 * Output HTML for team screen
 */
function team_screen() {
	?>
	<div class="section section-team">

		<h2><?php esc_html_e( "Meet our executives", 'tenup' ); ?></h2>

		<div class="section-team-leadership">
			<a href="http://10up.com/about/#employee-jake-goldman" class="employee-link" target="_blank">
				<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/team/jake.jpg' ) ); ?>" alt="">
				<span>Jake&nbsp;Goldman<em><?php esc_html_e( "President &amp; Founder", 'tenup' ); ?></em></span>
			</a>

			<a href="http://10up.com/about/#employee-john-eckman" class="employee-link" target="_blank">
				<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/team/john.jpg' ) ); ?>" alt="">
				<span>John&nbsp;Eckman<em><?php esc_html_e( "Chief Executive Officer", 'tenup' ); ?></em></span>
			</a>

			<a href="http://10up.com/about/#employee-jess-jurick" class="employee-link" target="_blank">
				<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/team/jess.jpg' ) ); ?>" alt="">
				<span>Jess&nbsp;Jurick<em><?php esc_html_e( "Vice President, Consulting Services", 'tenup' ); ?></em></span>
			</a>

			<a href="http://10up.com/about/#employee-vasken-hauri" class="employee-link" target="_blank">
				<img src="<?php echo esc_url( content_url( 'mu-plugins/10up-experience/assets/img/team/vasken.jpg' ) ); ?>" alt="">
				<span>Vasken&nbsp;Hauri<em><?php esc_html_e( "Vice President, Engineering", 'tenup' ); ?></em></span>
			</a>
		</div>

		<p><?php esc_html_e( "Influencing communities around the world, our team leads meetups, speaks at local events, and visits clients wherever they may be. A modest studio in Portland, Oregon hosts speakers, out of town guests, and the occasional workshop.", 'tenup' ); ?></p>

		<p><?php esc_html_e( "Independence from traditional “brick and mortar” offices, freedom from commutes, and flexible schedules across nearly a dozen time zones means our team works when and where they’re most inspired, available when our clients need them.", 'tenup' ); ?></p>

		<a href="http://10up.com/about/" class="section-team-header" target="_blank">
			<h2><?php esc_html_e( "Meet the rest of our team", 'tenup' ); ?></h2>
		</a>
	</div>
	<?php
}

/**
 * Register admin pages with output callbacks
 */
function register_admin_pages() {
	add_submenu_page( null, esc_html__( 'About 10up', 'tenup' ), esc_html__( 'About 10up', 'tenup' ), 'edit_posts', '10up-about', 'tenup\main_screen' );
	add_submenu_page( null, esc_html__( 'Team 10up', 'tenup' ), esc_html__( 'Team 10up', 'tenup' ), 'edit_posts', '10up-team', 'tenup\main_screen' );

	if ( defined( 'TENUP_SUPPORT' ) && 3 === TENUP_SUPPORT ) {
		add_submenu_page( null, esc_html__( 'Support', 'tenup' ), esc_html__( 'Support', 'tenup' ), 'edit_posts', '10up-support', 'tenup\main_screen' );
	}
}
add_action( 'admin_menu', 'tenup\register_admin_pages' );

/**
 * Start plugin customizations
 */
function plugin_customizations() {

	/**
	 * Stream
	 */
	if ( is_plugin_active( 'stream/stream.php' ) ) {

		add_action( 'admin_init', function() {
			remove_menu_page( 'wp_stream' );
		}, 11 );
	}
}
add_action( 'admin_init', 'tenup\plugin_customizations' );

/**
 * Add 10up suggested tab to plugins install screen
 *
 * @param array $tabs
 * @return mixed
 */
function tenup_plugin_install_link( $tabs ) {
	$new_tabs = array(
		'tenup' => esc_html__( '10up Suggested', 'tenup' ),
	);

	foreach ( $tabs as $key => $value ) {
		$new_tabs[$key] = $value;
	}

	return $new_tabs;
}
add_action( 'install_plugins_tabs', 'tenup\tenup_plugin_install_link' );

/**
 * Filter the arguments passed to plugins_api() for 10up suggested page
 *
 * @param array $args
 * @return array
 */
function filter_install_plugin_args( $args ) {
	$args = array(
		'page' => 1,
		'per_page' => 60,
		'fields' => array(
			'last_updated' => true,
			'active_installs' => true,
			'icons' => true
		),
		'locale' => get_user_locale(),
		'user' => '10up',
	);

	return $args;
}
add_filter( 'install_plugins_table_api_args_tenup', 'tenup\filter_install_plugin_args' );

/**
 * Setup 10up suggested plugin display table
 */
add_action( 'install_plugins_tenup', 'display_plugins_table' );

/**
 * Warn user when installing non-10up suggested plugins
 */
function plugin_install_warning() {
	?>
	<div class="tenup-plugin-install-warning updated">
		<p>
			<?php printf( __( "Some plugins may affect display, performance, and reliability. Please consider <a href='%s'>10up Suggestions</a> and consult your site team.", 'tenup' ), esc_url( network_admin_url( 'plugin-install.php?tab=tenup' ) ) ); ?>
		</p>
	</div>
	<?php
}
add_action( 'install_plugins_pre_featured', 'tenup\plugin_install_warning' );
add_action( 'install_plugins_pre_popular', 'tenup\plugin_install_warning' );
add_action( 'install_plugins_pre_favorites', 'tenup\plugin_install_warning' );
add_action( 'install_plugins_pre_beta', 'tenup\plugin_install_warning' );
add_action( 'install_plugins_pre_search', 'tenup\plugin_install_warning' );
add_action( 'install_plugins_pre_dashboard', 'tenup\plugin_install_warning' );

/**
 * Filter admin footer text "Thank you for creating..."
 *
 * @return string
 */
function filter_admin_footer_text() {
	$new_text = sprintf( __( 'Thank you for creating with <a href="https://wordpress.org">WordPress</a> and <a href="http://10up.com">10up</a>.', 'tenup' ) );
	return $new_text;
}
add_filter( 'admin_footer_text', 'tenup\filter_admin_footer_text' );

/**
 * Disable plugin/theme editor
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Return a 403 status and corresponding error for unauthed REST API access.
 * @param  WP_Error|null|bool $auth WP_Error if authentication error, null if authentication
 *                                  method wasn't used, true if authentication succeeded.
 * @return WP_Error|null|bool
 */
function restrict_rest_api( $auth ) {
	$restrict = get_option( 'tenup_restrict_rest_api', true );

	if ( filter_var( $restrict, FILTER_VALIDATE_BOOLEAN ) && ! is_user_logged_in() ) {
		return new \WP_Error( 'rest_api_restricted', __( 'Authentication Required', 'tenup' ), array( "status" => 403 ) );
	}

	return $auth;
}
add_filter( 'rest_authentication_errors', __NAMESPACE__ . '\restrict_rest_api' );

/**
 * Register restrict REST API setting.
 *
 * @return void
 */
function restrict_rest_api_setting() {
	// If the restriction has been lifted on the code level, don't display a UI option
	if ( ! has_filter( 'rest_authentication_errors', __NAMESPACE__ . '\restrict_rest_api' ) ) {
		return false;
	}

	$settings_args = array(
		'type' => 'boolean',
		'sanitize_callback' => __NAMESPACE__ . '\sanitize_checkbox_bool',
	);

	register_setting( 'reading', 'tenup_restrict_rest_api',  $settings_args );
	add_settings_field( 'tenup_restrict_rest_api', __( 'REST API Access', 'tenup' ), __NAMESPACE__ . '\restrict_rest_api_ui', 'reading' );
}
add_action( 'admin_init', __NAMESPACE__ . '\restrict_rest_api_setting' );

/**
 * Display UI for restrict REST API setting.
 *
 * @return void
 */
function restrict_rest_api_ui() {
	$restrict = get_option( 'tenup_restrict_rest_api', true );
?>
<fieldset>
	<legend class="screen-reader-text"><?php _e( 'REST API Access', 'tenup' ); ?></legend>
	<p><label for="restrict-rest-api-y"><input id="restrict-rest-api-y" name="tenup_restrict_rest_api" type="radio" value="1"<?php checked( $restrict ); ?> /> <?php _e( 'Restrict REST API access to authenticated users', 'tenup' ); ?></label></p>
	<p><label for="restrict-rest-api-n"><input id="restrict-rest-api-n" name="tenup_restrict_rest_api" type="radio" value="0"<?php checked( $restrict, false ); ?> /> <?php _e( 'Allow public access to the REST API', 'tenup' ); ?></label></p>
</fieldset>
<?php
}

/**
 * Sanitize a checkbox boolean setting.
 *
 * @param  string $value
 * @return string
 */
function sanitize_checkbox_bool( $value ) {
	if ( ! empty( $value ) ) {
		return true;
	}

	return false;
}
