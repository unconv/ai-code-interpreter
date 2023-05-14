<?php
if( ! isset( $argv[1] ) ) {
    die( "Usage: " . $argv[0] . " FILENAME [INPUT_DATA]\n" );
}

$settings = require( __DIR__ . "/settings.php" );

include( __DIR__ . "/src/chatgpt.php" );
include( __DIR__ . "/src/parse_code.php" );

$filename = $argv[1];

if( ! file_exists( $filename ) ) {
    die( $filename . " does not exist!\n" );
}

$input = $argv[2] ?? "";

echo parse_code( $filename, $input, $settings['api_key'] ) . "\n";
