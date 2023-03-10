<?php
/**
 * Install plugin tables.
 *
 * @package WordPressZeroSpam
 */

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Installs the plugin tables.
 */
function wpzerospam_install() {
	global $wpdb;

	$wordpress_zero_spam  = new WPZeroSpam();
	$charset_collate      = $wpdb->get_charset_collate();
	$installed_db_version = get_option( 'wpzerospam_db_version' );

	if ( WORDPRESS_ZERO_SPAM_DB_VERSION !== $installed_db_version ) {
		$log_table       = wpzerospam_tables( 'log' );
		$blocked_table   = wpzerospam_tables( 'blocked' );
		$blacklist_table = wpzerospam_tables( 'blacklist' );

		$sql = 'CREATE TABLE ' . $wordpress_zero_spam->tables['log'] . " (
      log_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
      log_type VARCHAR(255) NOT NULL,
      user_ip VARCHAR(39) NOT NULL,
      date_recorded DATETIME NOT NULL,
      page_url VARCHAR(255) NULL DEFAULT NULL,
      submission_data LONGTEXT NULL DEFAULT NULL,
			country VARCHAR(2) NULL DEFAULT NULL,
			country_name VARCHAR(255) NULL DEFAULT NULL,
			region VARCHAR(255) NULL DEFAULT NULL,
			region_name VARCHAR(255) NULL DEFAULT NULL,
      city VARCHAR(255) NULL DEFAULT NULL,
      latitude VARCHAR(255) NULL DEFAULT NULL,
      longitude VARCHAR(255) NULL DEFAULT NULL,
      PRIMARY KEY (`log_id`)) $charset_collate;";

		$sql .= 'CREATE TABLE ' . $wordpress_zero_spam->tables['blocked'] . " (
      blocked_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
      blocked_type ENUM('permanent','temporary') NOT NULL DEFAULT 'temporary',
      user_ip VARCHAR(39) NOT NULL,
      date_added DATETIME NOT NULL,
      start_block DATETIME NULL DEFAULT NULL,
      end_block DATETIME NULL DEFAULT NULL,
      reason VARCHAR(255) NULL DEFAULT NULL,
      attempts BIGINT UNSIGNED NOT NULL,
      PRIMARY KEY (`blocked_id`)) $charset_collate;";

		$sql .= 'CREATE TABLE ' . $wordpress_zero_spam->tables['blacklist'] . " (
      blacklist_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
      user_ip VARCHAR(39) NOT NULL,
      last_updated DATETIME NOT NULL,
      blacklist_service VARCHAR(255) NULL DEFAULT NULL,
      attempts BIGINT UNSIGNED NOT NULL,
      blacklist_data LONGTEXT NULL DEFAULT NULL,
      PRIMARY KEY (`blacklist_id`)) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );

		if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $blocked_table ) ) === $blocked_table ) {
			$wpdb->query( "DELETE t1 FROM $blocked_table AS t1 JOIN $blocked_table AS t2 ON t2.blocked_id = t1.blocked_id WHERE t1.blocked_id < t2.blocked_id AND t1.user_ip = t2.user_ip" );
		}

		if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $blacklist_table ) ) === $blacklist_table ) {
			$wpdb->query( "DELETE t1 FROM $blacklist_table AS t1 JOIN $blacklist_table AS t2 ON t2.blacklist_id = t1.blacklist_id WHERE t1.blacklist_id < t2.blacklist_id AND t1.user_ip = t2.user_ip" );
		}

		update_option( 'wpzerospam_db_version', WORDPRESS_ZERO_SPAM_DB_VERSION );
	}
}
register_activation_hook( WORDPRESS_ZERO_SPAM, 'wpzerospam_install' );

/**
 * Check to ensure the database tables have been installed
 */
function wpzerospam_db_check() {
	if ( WORDPRESS_ZERO_SPAM_DB_VERSION !== get_site_option( 'wpzerospam_db_version' ) ) {
		wpzerospam_install();
	}
}
add_action( 'plugins_loaded', 'wpzerospam_db_check' );
