<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * Book 是纸质书实现类
 */
class Book implements PaperBookInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function open(): mixed
    {
	}

	/**
	 * {@inheritdoc}
	 */
	public function turnPage(): mixed
    {
	}
}
