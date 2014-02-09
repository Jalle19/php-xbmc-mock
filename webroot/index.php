<?php

/**
 * Web server entry script
 * 
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */

// Find and include the Composer autoloader
$vendorDir = __DIR__.'/../vendor';
if (!file_exists($vendorDir))
	$vendorDir = __DIR__.'/../../..';

if (file_exists($vendorDir))
	require_once($vendorDir.'/autoload.php');
else
	die('Unable to find the Composer autoloader');

// Start the mock, catching any exceptions so the client can see them
try
{
	$xbmc = new \XBMCMock\XBMC();
	$xbmc->requireAuthentication();
	$xbmc->handleRequest();
}
catch (Exception $e)
{
	die('Caught exception: '.$e->getMessage());
}