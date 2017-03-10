<?php
/**
 * Storage loader.
 *
 * @package APIAPIStorageWordPressUsermeta
 * @since 1.0.0
 */

if ( ! function_exists( 'apiapi_register_storage_wordpress_usermeta' ) ) {

	/**
	 * Registers the storage using WordPress user metadata.
	 *
	 * It is stored in a global if the API-API has not yet been loaded.
	 *
	 * @since 1.0.0
	 */
	function apiapi_register_storage_wordpress_usermeta() {
		if ( function_exists( 'apiapi_manager' ) ) {
			apiapi_manager()->storages()->register( 'wordpress-usermeta', 'APIAPI\Storage_WordPress_Usermeta\Storage_WordPress_Usermeta' );
		} else {
			if ( ! isset( $GLOBALS['_apiapi_storages_loader'] ) ) {
				$GLOBALS['_apiapi_storages_loader'] = array();
			}

			$GLOBALS['_apiapi_storages_loader']['wordpress-usermeta'] = 'APIAPI\Storage_WordPress_Usermeta\Storage_WordPress_Usermeta';
		}
	}

	apiapi_register_storage_wordpress_usermeta();

}
