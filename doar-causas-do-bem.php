<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://causasdobem.com
 * @since             1.0.0
 * @package           Causas_Do_Bem
 *
 * @wordpress-plugin
 * Plugin Name:       Doar Causas do Bem
 * Plugin URI:        http://causasdobem.com/plugin-doar-causas-do-bem
 * Description:       Este plugin permite o cadastro de instituições e os links de doação no PagSeguro, Listando quando os forem ativados de forma aleatória em página onde é requisitado através de palavras chave.
 * Version:           1.0.0
 * Author:            Carlos Delfino
 * Author URI:        http://carlosdelfino.eti.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       doar-causas-do-bem
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DOAR_CAUSAS_DO_BEM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_doar_causas_do_bem() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-doar-causas-do-bem-activator.php';
	DoarCausasDoBem_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_doar_causas_do_bem() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-doar-causas-do-bem-activator.php';
	DoarCausasDoBem_Activator::deactivate();
}

register_activation_hook( __FILE__, 'activate_doar_causas_do_bem' );
register_deactivation_hook( __FILE__, 'deactivate_doar_causas_do_bem' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-doar-causas-do-bem.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_doar_causas_do_bem() {

	$plugin = DoarCausasDoBem::getInstance();
	$plugin->run();

}
run_doar_causas_do_bem();
