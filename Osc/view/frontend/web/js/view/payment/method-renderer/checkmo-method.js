/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'Mageplaza_Osc/js/view/payment/default'
    ],
    function (Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Mageplaza_Osc/payment/checkmo'
            },

            /** Returns send check to info */
            getMailingAddress: function() {
                return window.checkoutConfig.payment.checkmo.mailingAddress;
            },

            /** Returns payable to info */
            getPayableTo: function() {
                return window.checkoutConfig.payment.checkmo.payableTo;
            }
        });
    }
);
