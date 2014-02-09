<?php

namespace XBMCMock\Model;

/**
 * Base model for objects returned to the client (e.g. movie, TV show etc.)
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2014-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v2.0
 */
abstract class Base implements \JsonSerializable
{

	/**
	 * @var string the item label
	 */
	public $label;

	/**
	 * Class constructor. Constructs an object from an array.
	 * @param array $data the object data
	 */
	public function __construct($data)
	{
		foreach ($data as $property=> $value)
			$this->{$property} = $value;
	}

	/**
	 * Serializes the object to JSON
	 * @return \stdClass
	 */
	public function jsonSerialize()
	{
		$object = new \stdClass();

		foreach (get_object_vars($this) as $property=> $value)
			$object->{$property} = $value;

		return $object;
	}

}
