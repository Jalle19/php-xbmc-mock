<?php

namespace XBMCMock\JSONRPC\Response;

/**
 * Successful JSON-RPC response
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
class SuccessResponse extends Base
{

	public $result;

	public function __construct($result)
	{
		$this->result = $result;
	}

}
