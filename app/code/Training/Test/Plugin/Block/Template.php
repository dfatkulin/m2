<?php

namespace Training\Test\Plugin\Block;

/**
 * Class Template
 * @package Training\Test\Plugin\Block
 */
class Template
{
    /**
     * @param \Magento\Framework\View\Element\Template $subject
     * @param $result
     * @return string
     */
    public function afterToHtml(
        \Magento\Framework\View\Element\Template $subject,
        $result
    ){
        $result = '<div><p>' . $subject->getTemplate() . '</p>'
            . '<p>' . get_class($subject) . '</p>' . $result . '</div>';
        return $result;
    }
}