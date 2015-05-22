<?php

 	namespace Models;
 
 	use Models\DBConnect;

 	class UpdateData
 	{
 		public static function updateDetails($name , $id)
 		{
 			//require __DIR__."/../../configs/CommonUtilities.php" ;
 					
 				$db = DBConnect::getDB() ;
				$add_user = $db->prepare("UPDATE Time SET Time=Time+5 WHERE ID=:Id ") ;
 				$par=array(
 					
 					":Id" => $id);

 				$add_user->execute($par);
 				$row=$add_user->fetch();
 				if($row)
 					{			
 						return true;
 					}
 				else
 					return false;

 		}
 		public static function addDetails($name , $id)
 		{
 			//require __DIR__."/../../configs/CommonUtilities.php" ;
 					
 				$db = DBConnect::getDB() ;
				$add_user = $db->prepare("INSERT INTO Time (Name, ID) VALUES (:name, :Id) ") ;
 				$par=array(
 					":name" => $name,
 					":Id" => $id);

 				$add_user->execute($par);
 				$row=$add_user->fetch();
 				if($row)
 					{			
 						return true;
 					}
 				else
 					return false;

 		}
 		public static function deleteTable()
 		{
 			//require __DIR__."/../../configs/CommonUtilities.php" ;
 					
 				$db = DBConnect::getDB() ;
 				$add_user = $db->prepare("DELETE FROM Time") ;
 				$add_user->execute();
 				$row=$add_user->fetch();
 				
 		}
 		public static function getDetails()
 		{
 				$db = DBConnect::getDB() ;
				$add_user = $db->prepare("SELECT * FROM Time") ;
 				/*$par=array(
 					":name" => $name,
 					":Id" => $id);*/

 				$add_user->execute();
 				//$row=$add_user->fetch();
 				//return $row;
 				$row=$add_user->fetchAll(\PDO::FETCH_ASSOC);
					$posts=$row;
				return $posts;
 		}
 	}
 	