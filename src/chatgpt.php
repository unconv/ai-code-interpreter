<?php
/**
 * Sends a message to ChatGPT API and returns the response
 * 
 * @param string $message Message to be sent to ChatGPT
 * @param string $api_key OpenAI API-key
 * 
 * @return string Response from ChatGPT
 */
function send_chatgpt_message( string $message, string $api_key ): string {
    $ch = curl_init( "https://api.openai.com/v1/chat/completions" );
    
    curl_setopt_array( $ch, [
        CURLOPT_HTTPHEADER => [
            "Content-type: application/json",
            "Authorization: Bearer $api_key"
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode( [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "user",
                    "content" => $message,
                ]
            ]
        ] ),
        CURLOPT_RETURNTRANSFER => true,
    ] );
    
    $response = curl_exec( $ch );

    $json = json_decode( $response );

    if( ! isset( $json->choices[0]->message->content ) ) {
        throw new \Exception( "Error in OpenAI Request: " . $response );
    }

    return $json->choices[0]->message->content;
}
