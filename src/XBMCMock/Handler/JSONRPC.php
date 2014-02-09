<?php

namespace XBMCMock\Handler;

use \XBMCMock\JSONRPC\Response as Response;

/**
 * Handles requests to /jsonrpc
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
class JSONRPC implements IHandler
{

	/**
	 * @var string the raw JSON-RPC request
	 */
	protected $_request;

	public function __construct($uri, $method)
	{
		// Extract the request body
		switch ($method)
		{
			case 'GET':
				if (isset($_GET['request']))
					$requestBody = urldecode($_GET['request']);
				else
					throw new \Exception('Invalid request ('.$uri.')');

				break;
			case 'POST':
				$requestBody = file_get_contents('php://input');
				break;
			default:
				throw new \Exception('Invalid request');
		}

		// Attempt to parse it
		$this->_request = json_decode($requestBody);

		if (json_last_error() !== JSON_ERROR_NONE)
			throw new \Exception('Invalid request: malformed JSON');
	}

	/**
	 * Routes the request's method to a class metod
	 * @throws \Exception if the request method isn't implemented
	 */
	public function handleRequest()
	{
		$jsonRpcMethod = $this->_request->method;
		$method = str_replace('.', '', $jsonRpcMethod);

		if (method_exists($this, $method))
			$this->{$method}();
		else
			throw new \Exception('The method '.$jsonRpcMethod.' has not been implemented');
	}

	/**
	 * Encodes and outputs the response to the client (with the correct headers)
	 * @param string $response the raw JSON-RPC response
	 */
	private function respond(Response\Base $response)
	{
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	/**
	 * 
	 * JSON-RPC method mappings. These should be protected so that people can 
	 * customize the responses.
	 * 
	 */

	/**
	 * 
	 */
	protected function ApplicationGetProperties()
	{
		$version = new \stdClass();
		$version->major = 13;
		$version->minor = 0;
		$version->revision = '20131231-7da2a42';
		$version->tag = 'prealpha';
		$properties = new \stdClass();
		$properties->version = $version;

		$response = new Response\SuccessResponse($properties);
		$response->id = $this->_request->id;

		$this->respond($response);

		$this->respond($response);
	}

}
