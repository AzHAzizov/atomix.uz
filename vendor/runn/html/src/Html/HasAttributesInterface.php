<?php

namespace Runn\Html;

/**
 * Common interface for all elements that have html attributes (forms, form inputs, another html tags)
 *
 * Interface HasAttributesInterface
 * @package Runn\Html
 */
interface HasAttributesInterface
{

    /**
     * @param string $key
     * @param string|null $val
     * @return $this
     */
    public function setAttribute(string $key, ?string $val);

    /**
     * @param string $key
     * @return string|null
     */
    public function getAttribute(string $key): ?string;

    /**
     * @param string $key
     * @return bool
     */
    public function issetAttribute(string $key): bool;

    /**
     * @param string $key
     */
    public function unsetAttribute(string $key): void;

    /**
     * @param iterable|null $attributes
     * @return $this
     */
    public function setAttributes(iterable $attributes = null);

    /**
     * @return \Runn\Core\Std|null
     */
    public function getAttributes(): ?\Runn\Core\Std;

}
