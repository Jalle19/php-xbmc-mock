<?php

namespace XBMCMock\Handler;

/**
 * Interface for request handlers
 * 
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
interface IHandler
{

	public function __construct($uri, $method);

	public function handleRequest();
}
