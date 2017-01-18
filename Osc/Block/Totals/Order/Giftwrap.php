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

/**
 * Osc Total Point Spend Block
 * You should write block extended from this block when you write plugin
 *
 * @category    Mageplaza
 * @package     Mageplaza_Osc
 * @author      Mageplaza Developer
 */
namespace Mageplaza\Osc\Block\Totals\Order;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Template;

class Giftwrap extends Template
{
    public function initTotals()
    {
        $totalsBlock = $this->getParentBlock();
        $order       = $totalsBlock->getOrder();
        if ($order && $order->getMcGiftwrapAmount() > 0.01) {
            $totalsBlock->addTotal(new DataObject([
                'code'        => 'mc_giftwrap_label',
                'label'       => __('Gift wrap'),
                'value'       => $order->getMcGiftwrapAmount(),
                'is_formated' => false,
            ]), 'subtotal');
        }
    }
}
