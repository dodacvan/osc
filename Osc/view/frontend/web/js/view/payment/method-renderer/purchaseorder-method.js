/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'Mageplaza_Osc/js/view/payment/default',
        'jquery',
        "mage/validation"
    ],
    function (Component, $) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Mageplaza_Osc/payment/purchaseorder-form',
                purchaseOrderNumber: ''
            },
            initObservable: function () {
                this._super()
                    .observe('purchaseOrderNumber');
                return this;
            },
            getData: function () {
                return {
                    "method": this.item.method,
                    'po_number': this.purchaseOrderNumber(),
                    "additional_data": null
                };

            },
            validate: function () {
                var form = 'form[data-role=purchaseorder-form]';
                return $(form).validation() && $(form).validation('isValid');
            }
        });
    }
);
