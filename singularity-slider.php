<?php
/*
 * Plugin Name:       Slingularity Slider
 * Plugin URI:        https://tyronhayman.me
 * Description:       A premium slider at the best price, FREE! The goal of this slide is to bring some premium slider features to small buisinesses and indiviuals on lower budgets.
 * Version:           1.0
 * Requires at least: 6.4.2
 * Requires PHP:      7.2
 * Author:            Tyron Hayman
 * Author URI:        https://tyronhayman.me
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       pretty-analytics
 * Domain Path:       /languages
 * 
 * 506707217362-9rr2vilo9pk3d0tg77nmsd1pr5ubvgrj.apps.googleusercontent.com
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'PRAN' ) ) {

    define( 'PRAN_PATH', plugin_dir_path( __FILE__ ) );
    define( 'PRAN_URL', plugin_dir_url( __FILE__ ) );
    define( 'PRAN_SUFFIX', "PRAM" );

	#[AllowDynamicProperties]
	class Prtty {

        public $version = '1.0.0';

        public function __construct() {
			// Do nothing.
		}

        public function initialize() {
            add_action( 'admin_head', array( $this, 'pram_head_links' ));
            add_action( 'admin_menu', array( $this, 'add_admin_page' ));
        }

        public function register_scripts() {
			
            // Register scripts.
            wp_register_script( 'pran-js', PRAN_URL . 'assets/js/main.js', array( 'jquery' ), $this->version );
    
            // Register styles.
            wp_register_style( 'pran-styles', PRAN_URL . 'assets/css/main.css', array(), $this->version );
    
            wp_enqueue_style('pran-styles');
            wp_enqueue_script('pran-js');
    
        }

        public function pram_head_links() {
            ?>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,1000;1,9..40,300;1,9..40,1000&display=swap" rel="stylesheet">
            <?php

        }

        public function add_admin_page() {

            add_menu_page( 'Pretty Analytics', 'PA', 'manage_options', 'pretty-analytics', array( $this, 'pran_admin_page' ), PRAN_URL . 'assets/images/menu-icon.svg');
            add_submenu_page( 'pretty-analytics', 'Settings', 'Settings', 'manage_options', 'settings', 'prettyAnalyticsSettings');

            add_action( 'wp_enqueue_scripts', $this->register_scripts());
            
        }

        public function pran_admin_page() {

            $current_user = wp_get_current_user();
            $pageTitle = __( 'Pretty Analytics', 'text-domain' );
            $currentTime = date("H");

            ?>
            <div class="prettyAnalyticsWrap">
                <div class="<?php echo PRAN_SUFFIX; ?>-header">
                    <div class="<?php echo PRAN_SUFFIX; ?>-headerCol">
                        <h3 class="welcomeTime">Good <span>Afternoon</span> <?php echo $current_user->user_firstname; ?></h3>
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="<?php echo PRAN_SUFFIX; ?>-headerCol">
                        <ul class="<?php echo PRAN_SUFFIX; ?>-nav">
                            <li><a href="#settings" class="active">Dashboard</a></li>
                            <li><a href="#settings">Settings</a></li>
                            <li><a href="#settings">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }

        public function prettyAnalyticsSettings() {

            $current_user = wp_get_current_user();
            $pageTitle = __( 'Pretty Analytics', 'text-domain' );
            $currentTime = date("H");

            ?>
            <div class="prettyAnalyticsWrap">
                <div class="<?php echo PRAN_SUFFIX; ?>-header">
                    <div class="<?php echo PRAN_SUFFIX; ?>-headerCol">
                        <h3 class="welcomeTime">Good <span>Afternoon</span> <?php echo $current_user->user_firstname; ?></h3>
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="<?php echo PRAN_SUFFIX; ?>-headerCol">
                        <ul class="<?php echo PRAN_SUFFIX; ?>-nav">
                            <li><a href="#settings" class="active">Dashboard</a></li>
                            <li><a href="#settings">Settings</a></li>
                            <li><a href="#settings">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }

    }

    function pran() {
		global $prtty;

		// Instantiate only once.
		if ( ! isset( $prtty ) ) {
			$prtty = new Prtty();
			$prtty->initialize();
		}
		return $prtty;
	}

	// Instantiate.
	pran();

}
?>