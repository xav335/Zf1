<?php
namespace Courses\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\ElementInterface;

class BootstrapFormRow extends AbstractHelper
{
    public function __invoke(ElementInterface $elt){
        $elt->setAttribute('id', $elt->getName())
            ->setAttribute('class', 'form-control ' . $elt->getAttribute('class'))
        ;
        return $this->render($elt);
    }
    
    public function render(ElementInterface $elt){
        $html = '<div class="form-group">';
        $html .= $this->getView()->formrow($elt);
        $html .= '</div>';
        return $html;
    }

}

?>