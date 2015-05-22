<?php //namespace Frlnc\Slack\Http;
    namespace Http;
//include 'SlackResponse.php';


class SlackResponseFactory implements \Contracts\ResponseFactory {

    /**
     * {@inheritdoc}
     */
    public function build($body, array $headers, $statusCode)
    {
        return new SlackResponse($body, $headers, $statusCode);
    }

}
