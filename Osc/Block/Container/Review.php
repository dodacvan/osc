<?php

/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_Osc
 * @copyright   Copyright (c) 2016 Mageplaza (http://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */
namespace Mageplaza\Osc\Block\Container;

use Mageplaza\Osc\Block\Container;

class Review extends Container
{
    public function isNoColspanLayout()
    {
        return $this->_helperConfig->getDesignConfig('page_layout') == '3columns-no-colspan';
    }

    public function getHelperConfig()
    {
        return $this->_helperConfig;
    }
}