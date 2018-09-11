<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\Listener;


class HooksListener
{
    public function onGenerateFilters(array $arrFilters)
    {
        $arrInput = \Input::post('filter');

        return $arrFilters;
    }

    public function onApplyAdvancedFilters(array $arrFilters)
    {
        $arrInput = \Input::post('filter');

        return $arrFilters;
    }


}