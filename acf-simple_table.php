<?php
/*
Plugin Name: Advanced Custom Fields: Simple Table
Plugin URI: http://github.com/tyler-king/acf-simple_table
Description: Creates rows and columns of text inputs and converts it into an array.
Version: 1.0.0
Author: Tyler King
Author URI: http://heisenbug.ca/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('acf/register_fields', 'register_fields_simple_table');

function register_fields_simple_table()
{
    include_once 'acf-simple_table-v4.php';
}
