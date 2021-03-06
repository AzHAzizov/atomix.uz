<?php

use function Runn\Html\Rendering\escape;

/** @var \Runn\Html\Form\Fields\SelectField $this */

$attrs = [];

foreach ($this->getAttributes() ?? [] as $key => $val) {
    if (null !== $val) {
        if ('name' == $key) {
            $val .= '[]';
        }
        $attrs[] = $key . '="' . escape($val) . '"';
    } else {
        $attrs[] = $key;
    }
}

$value = (array)$this->getValue();

$html  = '<select' . ($attrs ? ' ' . implode(' ', $attrs) : '') . '>';

$options = [];
foreach ($this->getValues() as $key => $val) {
    $options[] =
        '<option value="' . escape($key) . '"' . (in_array($val, $value) ? ' selected' : '') . '>'
        . escape($val)
        . '</option>';
}

$html .= !empty($options) ? "\n" : '';
$html .= implode("\n", $options);
$html .= !empty($options) ? "\n" : '';

$html .= '</select>' ;

echo $html;