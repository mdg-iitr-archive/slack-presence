<?php
	
	namespace Controllers ;
	use Models\UpdateData;
	
	class HomeController
	{

		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function get()
		{
			$details=UpdateData::getDetails();
			echo $this->twig->render('index.html', array(
				"title" => "hi",
				"response" => $details)) ;
		}
	}
