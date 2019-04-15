<?php
function response($status, $body){
    # Formats a API response
    return json_encode(array(
        "status" => $status,
        "message" => $body
    ));
}

function error($status, $body){
    # Formats a API error response
    return response($status, array("error" => $body));
}
?>