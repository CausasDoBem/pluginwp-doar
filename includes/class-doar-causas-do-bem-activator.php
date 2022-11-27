<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    CausasDoBem
 * @subpackage DoarCausasDoBem/includes
 * @author     Carlos Delfino <consultoria@carlosdelfino.eti.br>
 */
class DoarCausasDoBem_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Unregister the post type, so the rules are no longer in memory.
		DoarCausasDoBem::getInstance()->pluginprefix_setup_post_type();

		global $wpdb;
		$wpdb->query( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}causas_do_bem(
			ID bigint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			nome varchar(255),
			descricao text,
			tendereco varchar(255),
			bairro varchar(255),
			cidade varchar(255),
			cep int,
			id_responsavel bigint
		);
		" );
		$wpdb->flush(); 
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}causas_do_bem_tipo_doacoes(
			id bigint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			id_causa_do_bem bigint NOT NULL,
			titulo varchar(255),
			valor float(5,2)
			);
		");
		$wpdb->flush(); 

		// Clear the permalinks after the post type has been registered.
		flush_rewrite_rules(); 
	}

	public static function deactivate(){
		// Unregister the post type, so the rules are no longer in memory.
		unregister_post_type( 'causas_do_bem' );
		// Clear the permalinks to remove our post type's rules from the database.
		flush_rewrite_rules();
	}

}
