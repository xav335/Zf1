<?php
namespace Courses\View\Helper;

use Zend\View\Helper\AbstractHelper;

class UpperCase extends AbstractHelper
{
    public function __invoke($string){
        return strtoupper($string);
    }

}

?>