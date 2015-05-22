<?php
	
	namespace Controllers ;

	use Http\CurlInteractor;

	use Http\SlackResponseFactory;

	use Core\Commander;

	use Models\UpdateData;

	class AdduserController
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

			$details=$response->getbody();
			
			$user_active=array();
			UpdateData::deleteTable();

			foreach($details['users'] as $user)
			{	//if($user['presence']=="active")
				//{
					$user_active[]=array("name" => $user['name'],
										 "id" => $user['id']);
					$row=UpdateData::addDetails($user['name'] , $user['id']);

				//}
			}

			//error_log(var_dump($user_active));

			echo $this->twig->render('adduser.html', array(
				"title" => "Added",
				"response" => $user_active)) ;
		}


	}
