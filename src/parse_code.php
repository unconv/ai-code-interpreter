<?php
function parse_code( string $filename, string $input, string $api_key ) {
    $message = file_get_contents( __DIR__ . "/../prompt.txt" );
    $message = str_replace( [
        "{input}",
        "{code}",
    ], [
        $input,
        file_get_contents( $filename ),
    ], $message );
    $response = send_chatgpt_message( $message, $api_key );

    $parts = explode( "\n\n", $response, 2 );

    $response_code = substr( $parts[0], 9, 3 );
    http_response_code( $response_code );

    $headers = explode( "\n", $parts[0] );
    unset( $headers[0] );

    foreach( $headers as $header ) {
        header( $header );
    }

    return $parts[1];
}
