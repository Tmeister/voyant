<?php

/**
*
*/
class PageLinesInstallTheme extends PageLinesInstall
{

	function run_installation_routine( $url = '' ){
		set_theme_mod( 'pl_installed', true );
		$settings = pl_get_global_settings();

		// Only sets defaults if they are null
		set_default_settings();
		if( is_file( trailingslashit( get_stylesheet_directory() ) . 'pl-config.json' ) ) {
			$settings_handler = new PageLinesSettings;
			$settings_handler->import_from_child();
		}
		$this->apply_page_templates();

		// Publish New Templates
		$tpl_handler = new PLCustomTemplates;
		$tpl_handler->update_objects( 'publish' );

		// Redirect
		$url = add_query_arg( 'pl-installed-theme', pl_theme_info('template'), get_site_url() );

		return $url;

	}
}