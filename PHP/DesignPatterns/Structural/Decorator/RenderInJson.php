<?php


namespace DesignPatterns\Structural\Decorator;


class RenderInJson extends Decorator
{
	/**
	 * render data as JSON
	 *
	 * @return mixed|string
	 */
	public function renderData()
	{
		$output = $this->wrapped->renderData();

		return json_encode($output);
	}
}
