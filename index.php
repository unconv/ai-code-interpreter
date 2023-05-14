<?php
$settings = require( __DIR__ . "/settings.php" );

include( __DIR__ . "/src/chatgpt.php" );
include( __DIR__ . "/src/parse_code.php" );

if( ! isset( $_GET['page'] ) ) {
    die( "page parameter missing" );
}

$filename = __DIR__ . "/pages/" . $_GET['page'];

if( ! file_exists( $filename ) ) {
    die( $filename . " does not exist!" );
}

$input  = $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'];
$input .= "\n\n" . http_build_query( $_POST );

echo parse_code( $filename, $input, $settings['api_key'] );
