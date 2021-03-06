<?php

namespace Runn\Html\Form;

/**
 * Trait that implements ElementHasParentInterface for elements that have parent
 *
 * Trait ElementHasParentTrait
 * @package Runn\Html\Form
 *
 * @implements \Runn\Html\ElementHasParentInterface
 */
trait ElementHasParentTrait
    /*implements ElementHasParentInterface*/
{

    /** @var \Runn\Html\Form\FormElementInterface|null  */
    protected $__parent;

    /**
     * @param \Runn\Html\Form\FormElementInterface|null $parent
     * @return $this
     */
    public function setParent(?FormElementInterface $parent)
    {
        $this->__parent = $parent;
        return $this;
    }

    /**
     * @return \Runn\Html\Form\FormElementInterface|null
     */
    public function getParent(): ?FormElementInterface
    {
        return $this->__parent;
    }

    /**
     * @return bool
     */
    public function hasParent(): bool
    {
        return null !== $this->__parent;
    }

    /**
     * @return \Runn\Html\Form\ElementsCollection|\Runn\Html\Form\FormElementInterface[]
     */
    public function getParents(): ElementsCollection
    {
        $parents = new ElementsCollection();
        $element = $this;
        while ( ($element instanceof ElementHasParentInterface) && null !== ($parent = $element->getParent()) ) {
            $parents->prepend($parent);
            $element = $parent;
        }
        return $parents;
    }

}
