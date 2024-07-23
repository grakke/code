<?php


namespace DesignPatterns\Structural\Facade;


interface BiosInterface
{
	/**
	 * execute the BIOS
	 */
	public function execute();

	/**
	 * wait for halt
	 */
	public function waitForKeyPress();

	/**
	 * launches the OS
	 *
	 * @param  OsInterface  $os
	 */
	public function launch(OsInterface $os);

	/**
	 * power down BIOS
	 */
	public function powerDown();
}
