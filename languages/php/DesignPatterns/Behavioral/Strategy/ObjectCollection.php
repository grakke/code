<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * ObjectCollection类
 */
class ObjectCollection
{
    /**
     * @var array
     */
    private array $elements;

    /**
     * @var ComparatorInterface
     */
    private ComparatorInterface $comparator;

    /**
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    /**
     * @param ComparatorInterface $comparator
     *
     * @return void
     */
    public function setComparator(ComparatorInterface $comparator): void
    {
        $this->comparator = $comparator;
    }

    /**
     * @return array
     */
    public function sort(): array
    {
        if (!$this->comparator) {
            throw new \LogicException("Comparator is not set");
        }

        $callback = array($this->comparator, 'compare');
        uasort($this->elements, $callback);

        return $this->elements;
    }
}
