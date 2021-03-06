<?php

namespace unrealmanu\Walker;

use Generator;
use unrealmanu\Walker\DTO\WalkOptionsInterface;

/**
 * Class Walk
 * @package unrealmanu\Walker\DTO
 */
class Walk extends AbstractWalk implements WalkInterface
{
    /**
     * Walk constructor.
     * @param WalkOptionsInterface $options
     */
    public function __construct(WalkOptionsInterface $options)
    {
        parent::__construct($options);
    }

    // MAKE YOUR CUSTOM LOGIC FOR FILTER ITEMS
    public function itemFilter($item): bool
    {
        return parent::itemFilter($item);
    }

    /**
     * @param WalkOptionsInterface $options
     * @return WalkOptionsInterface
     */
    public function setOptions(WalkOptionsInterface $options): WalkOptionsInterface
    {
        return parent::setOptions($options);
    }

    /**
     * @param $parent
     * @return array
     */
    public function walk($parent): array
    {
        return parent::walk($parent);
    }

    /**
     * @param $parent
     * @return Generator
     */
    public function walkGen($parent): Generator
    {
        return parent::walkGen($parent);
    }

    // MAKE YOUR CUSTOM LOGIC FOR GET CHILDREN IN RECURSIVE PROCESSES
    /**
     * @param array|mixed $parent
     * @return mixed
     */
    public function loadChildren($parent)
    {
        if (method_exists($parent, 'getChildren')) {
            return $parent->getChildren();
        }
    }
}
