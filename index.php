<?php



define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

if($_GET['action']){

$params = explode("/", $_GET['action']);

if($params[0]!= "")
{
	$controller = $params[0];

	$action = "";

	if(isset($params[1])) 
	{
		$action = $params[1];
}

	include(ROOT.'controllers/'.$controller.'.php');

	if(function_exists($action))
	{
		/*if(isset($params[2])&& isset($params[3])&& isset($params[4])&& isset($params[5]))
		{
			$action($params[2],$params[3],$params[4],$params[5]);
		}*/
		if(isset($params[2])&& isset($params[3])&& isset($params[4])&& isset($params[5]) && isset($params[6]))
		{
			$action($params[2],$params[3],$params[4],$params[5],$params[6]);
		}
		elseif(isset($params[2])&& isset($params[3])&& isset($params[4])&& isset($params[5]))
		{
			$action($params[2],$params[3],$params[4],$params[5]);
		}
		elseif (isset($params[2]) && isset($params[3])&& isset($params[4]) )
		{

			$action($params[2],$params[3],$params[4]);
		}
		elseif(isset($params[2])&& isset($params[3]))
		{
			$action($params[2],$params[3]);
		}
		elseif(isset ($params[2]))
		{
			$action($params[2]);
		}
		else
		{
			$action();
		}
	}
		/*if(function_exists($action)){
			if(isset($params[2])&& isset($params[3])){
				$action($params[2],$params[3]);
			}elseif (isset($params[2])) {
	
				$action($params[2]);
			}else
			{
				$action();
			}
		}*/else{
			echo "Fonction n'existe pas";
		}
	
	 
	
 
}
}else{
	include('controllers/controllerVisiteur.php');
	pageAccueil();

	//getAllCourses();

}