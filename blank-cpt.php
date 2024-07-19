<?php
/**
 * Plugin Name: blank-cpt
 * Author: psycho
 * Author URI: https://github.com/priyam023
 * Description: creates specific custom post types along with their meta boxes as per user requirement
 * Version: 1.0.0
 */


if(!defined('ABSPATH')){
   header("Location: /");
   die("Can't Access");
}

function blank_cpt_activation(){
   global $wpdb, $table_prefix;
   $wp_emp = $table_prefix.'emp';

   $q = "CREATE TABLE IF NOT EXISTS `$wp_emp` (`ID` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(50) NOT NULL, `email` VARCHAR(100) NOT NULL, `status` BOOLEAN NOT NULL, PRIMARY KEY (`ID`)) ENGINE = MyISAM;";
   $wpdb->query($q);

   $q = "INSERT INTO `wp_emp` (`name`, `email`, `status`) VALUES ('psycho', 'psycho@test.com', '1')";
   $wpdb->query($q);
}

 register_activation_hook(__FILE__,'blank_cpt_activation');

 function blank_cpt_deactivation(){
   global $wpdb, $table_prefix;
   $q = "DELETE FROM `wp_emp`";
   $wpdb->query($q);
 }

 register_deactivation_hook(__FILE__, 'blank_cpt_deactivation');