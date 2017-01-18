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
namespace Mageplaza\Osc\Block\Container\Review;

use Mageplaza\Osc\Block\Container\Review;

class Newsletter extends Review
{

    public function canShow()
    {
        if ($this->isCustomerLoggedIn()) {
            $email = $this->getCustomer()->getEmail();
            if ($this->getHelperData()->isSubscribed($email)) {
                return false;
            }
        }

        return $this->getHelperConfig()->isNewsletter();
    }

    public function getIsSubscribed()
    {
        $data   = $this->getFormData();
        $isSubs = isset($data['is_subscribed']) ? $data['is_subscribed'] : $this->getHelperConfig()->isSubscribedByDefault();

        return $isSubs;
    }

}