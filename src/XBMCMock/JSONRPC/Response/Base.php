<?php

namespace XBMCMock\JSONRPC\Response;

/**
 * Base class for JSON-RPC responses
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
abstract class Base
{

	public $jsonrpc = '2.0';
	public $id;

}
