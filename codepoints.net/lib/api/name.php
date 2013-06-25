<?php

require_once __DIR__.'/../tools.php';

if (isset($_SERVER['HTTP_ACCEPT']) &&
    strpos($_SERVER['HTTP_ACCEPT'], 'application/json') === false) {
    /* for non-JSON requests return plain text */
    $api->_mime = 'text/plain';
}

if (maybeCodepoint($data) === false) {
    $api->throwError(API_BAD_REQUEST, _('No codepoint.'));
}

$cp = Codepoint::getCP(hexdec($data), $api->_db);
return $cp->getName();

#EOF