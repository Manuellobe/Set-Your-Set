<?php
class Authorization
	{
		public function check($params)
		{
			require_once('acl.php');
			$baseURL = $GLOBALS['CFG']->config['base_url'];
			$routing =& load_class('Router');
			$class = $routing->fetch_class();
			$method = $routing->fetch_method();
			
			// The page is available to all
			if (!empty($allowAll[$class][$method]) && $allowAll[$class][$method]) {
				return True;
			}
			// The session is not initiated and the group is not set
			if (!isset($session) || !isset($session['group'])) {
				header("location: {$baseURL}");
				exit;
			}
			// The session is initiated, but the user has no access
			if (empty($allowOnly[$session['group']][$class][$method])
			||
			$allowOnly[$session['group']][$class][$method] != True) {
			header("location: {$baseURL}templates/unauthorized");
			exit;
			}
			// If we get here, authorization is succeed!
			return True;
		}
	}
?>