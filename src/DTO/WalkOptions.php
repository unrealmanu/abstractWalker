<?php

namespace unrealmanu\Walker\DTO;

use stdClass;

class WalkOptions implements WalkOptionsInterface
{
    /**
     * @var bool $recursiveProcess
     */
    private $recursiveProcess = true;

    /**
     * @var int
     */
    private $recursiveDepthLimit = -1;

    /**
     * @var array
     */
    private $filterInstance = [];

    /**
     * @param bool $status
     * @return bool
     */
    public function setRecursiveProcessStatus(bool $status = true): bool
    {
        $this->recursiveProcess = $status;
        return $status;
    }

    /**
     * @return bool
     */
    public function getRecursiveProcessStatus(): bool
    {
        return $this->recursiveProcess;
    }

    /**
     * @return array
     */
    public function getFilterInstance(): array
    {
        return $this->filterInstance;
    }

    /**
     * @return int
     */
    public function getRecursiveDepthLimit(): int
    {
        return $this->recursiveDepthLimit;
    }

    /**
     * @param int $recursiveDepthLimit
     */
    public function setRecursiveDepthLimit(int $recursiveDepthLimit): void
    {
        $this->recursiveDepthLimit = $recursiveDepthLimit;
    }

    /**
     * @param array $class
     * @return array
     */
    public function setFilterInstance(array $class): array
    {
        $validItems = array_filter($class, "isValidItemForFilter");
        $this->filterInstance = $validItems;
        return $validItems;
    }

    /**
     * @param $item
     * @return bool
     */
    protected function isValidItemForFilter($item): bool
    {
        $accept = false;
        try {
            return $this->isClass($item);
        } catch (\Exception $e) {
        }
        return $accept;
    }

    /**
     * @param stdClass $class
     * @return bool
     */
    protected function isClass(stdClass $class): bool
    {
        if (is_object($class)) {
            return true;
        }
        return false;
    }
}