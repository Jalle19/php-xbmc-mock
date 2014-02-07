<?php

namespace XBMCMock\Handler;

/**
 * Factory for request handlers
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
class Factory
{

	/**
	 * Factory for request handlers
	 * @param string $uri the current request URI
	 * @param string $method the current request method
	 * @return \XBMCMock\Handler\JSONRPC the request handler
	 * @throws \Exception if no request handler can be determined
	 */
	public static function factory($uri, $method)
	{
		if (preg_match('/^\/jsonrpc/', $uri))
			return new JSONRPC($uri, $method);
		else
			throw new \Exception('Unhandled request '.$method.' '.$uri);
	}

}
