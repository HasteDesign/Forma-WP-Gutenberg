<?php
/**
 * Forma Block Static
 *
 * @package           FormaBlockStatic
 * @author            Forma Haste
 * @copyright         2021 Forma Haste
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Forma Block Static
 * Plugin URI:        https://forma.hastedesign.com.br
 * Description:       A simple static Gutenberg block.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Forma Haste
 * Author URI:        https://forma.hastedesign.com.br
 * Text Domain:       forma-block-static
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Nesta função iremos registrar os scripts e estilos, para
 * então registrarmos o bloco, passando o slug dos estilos e scripts
 * como paraâmetros.
 */
function forma_block_static_register_block() {
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	// Registra o script
	wp_register_script(
		'forma-block-static',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	// Registra o editor.css
	wp_register_style(
		'forma-block-static-editor-css',
		plugins_url( 'src/editor.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'src/editor.css' )
	);

	// Registra o style.css
	wp_register_style(
		'forma-block-static-style-css',
		plugins_url( 'src/style.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'src/style.css' )
	);

	// Registra os recursos do bloco
	register_block_type(
		'forma/block-static',
		[
			'editor_script' => 'forma-block-static',
			'editor_style'  => 'forma-block-static-editor-css',
			'style'         => 'forma-block-static-style-css',
		]
	);
}
add_action( 'init', 'forma_block_static_register_block' );
