<?php
	namespace Contracts;

interface ResponseFactory {

    /**
     * Builds the response.
     *
     * @param  string  $body
     * @param  array   $headers
     * @param  integer $statusCode
     * @return \Frlnc\Slack\Contracts\Http\Response
     */
    public function build($body, array $headers, $statusCode);

}