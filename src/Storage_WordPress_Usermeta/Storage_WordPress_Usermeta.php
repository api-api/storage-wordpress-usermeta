<?php
/**
 * Storage_WordPress_Usermeta class
 *
 * @package APIAPI\Storage_WordPress_Usermeta
 * @since 1.0.0
 */

namespace APIAPI\Storage_WordPress_Usermeta;

use APIAPI\Core\Storages\Array_Storage;

if ( ! class_exists( 'APIAPI\Storage_WordPress_Usermeta\Storage_WordPress_Usermeta' ) ) {

	/**
	 * Storage implementation using WordPress user metadata.
	 *
	 * @since 1.0.0
	 */
	class Storage_WordPress_Usermeta extends Array_Storage {
		/**
		 * Gets the array values are stored in.
		 *
		 * @since 1.0.0
		 *
		 * @param string $basename The basename under which to store.
		 * @return array Array with stored data.
		 */
		protected function get_array( $basename ) {
			$data = get_user_meta( get_current_user_id(), $basename, true );
			if ( empty( $data ) ) {
				return array();
			}

			return $data;
		}

		/**
		 * Updates the array values are stored in.
		 *
		 * @since 1.0.0
		 *
		 * @param string $basename The basename under which to store.
		 * @param array  $data     Array with updated data.
		 */
		protected function update_array( $basename, array $data ) {
			update_user_meta( get_current_user_id(), $basename, $data );
		}

		/**
		 * Deletes the array values are stored in.
		 *
		 * @since 1.0.0
		 *
		 * @param string $basename The basename under which to store.
		 */
		protected function delete_array( $basename ) {
			delete_user_meta( get_current_user_id(), $basename );
		}
	}

}
