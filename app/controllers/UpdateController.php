<?php
	
	namespace Controllers ;

	use Http\CurlInteractor;

	use Http\SlackResponseFactory;

	use Core\Commander;

	use Models\UpdateData;

	class UpdateController
	{

		protected $twig ;
		public $interactor;
		public $slack_response_factory;
		public $commander;

		public function __construct()
		{
			
			
			$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;

			

			
		}



		public function get()
		{
			require __DIR__."/../../configs/credentials.php" ;

			$interactor=new CurlInteractor;
			$slack_response_factory=new SlackResponseFactory();
			$interactor->setResponseFactory($slack_response_factory);
			$commander = new Commander($API_token,$interactor);

			$response = $commander->execute('rtm.start');

			/*$response = $commander->execute('chat.postMessage', [
			    'channel' => '#general',
			    'text'    => 'Hello, world!'
			]);*/

			if($response->getbody()['ok'])
			{
				$details=$response->getbody();
						
						$user_active=array();
			
						foreach($details['users'] as $user)
						{	if($user['presence']=="active")
							{
								$user_active[]=array("name" => $user['name'],
													 "id" => $user['id']);
								$row=UpdateData::updateDetails($user['name'] , $user['id']);
			
							}
						}
			
						//error_log(var_dump($user_active));
			
						echo $this->twig->render('update.html', array(
							"title" => "Update",
							"response" => $user_active)) ;}
			else
				var_dump($response);
		}


	}
