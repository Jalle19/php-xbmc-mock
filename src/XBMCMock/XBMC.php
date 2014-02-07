<?php

namespace XBMCMock;

/**
 * Main class. Authentication and request routing is performed here.
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
class XBMC
{
	
	const HTTP_BASIC_REALM = 'XBMC';
	const HTTP_USERNAME = 'xbmc';
	const HTTP_PASSWORD = 'xbmc';

	/**
	 * Requires the client to authenticate
	 */
	public function requireAuthentication()
	{
		if (!isset($_SERVER['PHP_AUTH_USER']) ||
		    $_SERVER['PHP_AUTH_USER'] !== self::HTTP_USERNAME || 
			$_SERVER['PHP_AUTH_USER'] !== self::HTTP_PASSWORD)
		{
			header('WWW-Authenticate: Basic realm="'.self::HTTP_BASIC_REALM.'"');
			header('HTTP/1.1 401 Unauthorized');
			exit;
		}
	}

	/**
	 * Main request router
	 */
	public function handleRequest()
	{
		$uri = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];
		
		$handle = Handler\Factory::factory($uri, $method);
		$handle->handleRequest();
	}

}
