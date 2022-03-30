<?php


namespace Grifart\NotSerializable;


final class SaferSerializer
{

	/**
	 * @param mixed $dataToBeSerialized
	 * @return string
	 */
	public static function serialize($dataToBeSerialized)
	{
		self::check($dataToBeSerialized);
		return serialize($dataToBeSerialized);
	}


	/**
	 * @param mixed $dataToBeChecked
	 */
	public static function check($dataToBeChecked): void
	{
		if (is_scalar($dataToBeChecked) || is_null($dataToBeChecked)) {
			return;
		}

		if (!is_object($dataToBeChecked)) {
			throw new \LogicException(\sprintf('You have passed a non-scalar, non-object value of type %s.', gettype($dataToBeChecked)));
		}

		if (! (method_exists($dataToBeChecked, '__serialize') && method_exists($dataToBeChecked, '__unserialize'))) {
			throw new \LogicException(\sprintf('Object of type %s do NOT explicitly state serialization support using __serialize() && __unserialize() methods.', get_class($dataToBeChecked)));
		}

		// can throw exceptions, not a problem as we will call real serialize() anyway
		$valuesToBeSerialized = $dataToBeChecked->__serialize();
		foreach($valuesToBeSerialized as $value) {
			self::check($value);
		}

		// as there is no way how one can check referenced properties when Serializable interface or __sleep() magic method is used,
		// we consider them as case where class did NOT stated that is serializable.
	}


}