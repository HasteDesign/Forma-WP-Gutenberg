<?php
/**
 * Forma Block Dynamic
 *
 * @package           FormaBlockDynamic
 * @author            Forma Haste
 * @copyright         2021 Forma Haste
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Forma Block Dynamic
 * Plugin URI:        https://forma.hastedesign.com.br
 * Description:       A simple dynamic Gutenberg block.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Forma Haste
 * Author URI:        https://forma.hastedesign.com.br
 * Text Domain:       forma-block-dynamic
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Nesta função iremos registrar os scripts e estilos, para
 * então registrarmos o bloco, passando o slug dos estilos e scripts
 * como paraâmetros.
 */
function forma_block_dynamic_register_block() {
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	// Registra o script
	wp_register_script(
		'forma-block-dynamic',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	// Registra o editor.css
	wp_register_style(
		'forma-block-dynamic-editor-css',
		plugins_url( 'src/editor.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'src/editor.css' )
	);

	// Registra o style.css
	wp_register_style(
		'forma-block-dynamic-style-css',
		plugins_url( 'src/style.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'src/style.css' )
	);

	// Registra os recursos do bloco
	register_block_type(
		'forma/block-dynamic',
		[
			'editor_script' => 'forma-block-dynamic',
			'editor_style'  => 'forma-block-dynamic-editor-css',
			'style'         => 'forma-block-dynamic-style-css',
		]
	);
}
add_action( 'init', 'forma_block_dynamic_register_block' );
