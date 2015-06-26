<?php
namespace higherchen\registry;

class Registry extends \ArrayObject {

	/**
	 * @var Registry object
	 */
	protected static $_instance;

	/**
	 * No constructor.
	 *
	 * @return  void
	 */
	public function __construct() {
		throw new Exception(
			'There is no need to construct the object',
			0,
			__CLASS__
		);
		return;
	}

	/**
	 * Get instance.
	 *
	 * @return  object
	 */
	protected static function getInstance() {
		if (null === static::$_instance) {
			static::$_instance = new parent();
		}
		return static::$_instance;
	}

	/**
	 * Set a new registry.
	 *
	 * @param   mixed   $index     Index of registry.
	 * @param   mixed   $value     Value of registry.
	 * @return  void
	 */
	public static function set($index, $value) {
		static::getInstance()->offsetSet($index, $value);
		return;
	}

	/**
	 * Get a registry.
	 *
	 * @param   mixed   $index     Index of registry.
	 * @return  mixed
	 */
	public static function get($index) {
		$registry = static::getInstance();
		if (false === $registry->offsetExists($index)) {
			return null;
		}
		return $registry->offsetGet($index);
	}

	/**
	 * Check if an index is registered.
	 *
	 * @param   mixed   $index     Index of registry.
	 * @return  bool
	 */
	public static function isRegistered($index) {
		return static::getInstance()->offsetExists($index);
	}

	/**
	 * Unset an registry.
	 *
	 * @param   mixed   $index    Index of registry.
	 * @return  void
	 */
	public static function remove($index) {
		static::getInstance()->offsetUnset($index);
		return;
	}
}
