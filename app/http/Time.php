<html>
<head>
	<title>Slack_details</title>
	<link rel="stylesheet" type="text/css" href="style_home.css">

</head>
<body>	
<?php

include 'CurlInteractor.php';
//use Frlnc\Slack\Http\SlackResponseFactory;
//use Frlnc\Slack\Http\CurlInteractor;
include 'SlackResponseFactory.php';
include '../Core/Commander.php';
//use Frlnc\Slack\Core\Commander;

$interactor = new CurlInteractor;
$slack_response_factory=new SlackResponseFactory;
$interactor->setResponseFactory($slack_response_factory);

$commander = new Commander('xoxp-2301167873-3643569900-4777452671-3ceb58', $interactor);

/*$response = $commander->execute('chat.postMessage', [
    'channel' => '#bottesting',
    'text'    => 'Hello, World!'
]);
*/
$response = $commander->execute('rtm.start');
/*
var_dump($response);
var_dump("\n");

var_dump($response->getbody());
//$response=json_decode($response);
$type=gettype($response);
var_dump($type);

*/if($response->getbody()['ok'])
	var_dump($response->getbody());

//if ($response['ok'])
/*if($response->ok)
{
    // Command worked
    var_dump("Success");
    var_dump($response);
}
else
{
	var_dump("error") ;
	var_dump($response);
    // Command didn't work
}
*/?>
</body>

</html>