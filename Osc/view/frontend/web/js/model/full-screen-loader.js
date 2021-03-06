/**
 * Copyright � 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define(
    ['jquery'],
    function ($) {
        'use strict';

        var containerId = '#mageplaza-one-step-checkout';

        return {

            /**
             * Start full page loader action
             */
            startLoader: function () {
                $(containerId).trigger('processStart');
            },

            /**
             * Stop full page loader action
             */
            stopLoader: function () {
                $(containerId).trigger('processStop');
            }
        };
    }
);
