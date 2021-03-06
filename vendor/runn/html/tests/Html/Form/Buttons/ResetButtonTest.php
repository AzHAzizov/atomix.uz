<?php

namespace Runn\tests\Html\Form\Buttons\ResetButton;

use PHPUnit\Framework\TestCase;
use Runn\Html\Form\Buttons\ResetButton;

class ResetButtonTest extends TestCase
{

    public function testGetType()
    {
        $button = new ResetButton();
        $this->assertSame('reset', $button->getType());
    }

    public function testTitle()
    {
        $button = new ResetButton();
        $this->assertNull($button->getTitle());
        $this->assertSame('<button type="reset"></button>', $button->render());

        $button = new ResetButton('foo');
        $this->assertSame('foo', $button->getTitle());
        $this->assertSame('<button type="reset">foo</button>', $button->render());
    }

}
