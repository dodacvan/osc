<?php

namespace Mageplaza\Osc\Controller\Index;

use Magento\Quote\Model\Quote\Address;

class Index extends AbstractIndex
{
    /**
     *
     * @return $this|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if (!$this->_helperConfig->isEnabled()) {
            return $resultRedirect->setPath('checkout');
        }
        $this->getOnePage()->initCheckout();
        $this->_initShippingAddress();
        $this->_initShippingMethod();
        $this->_initPaymentMethod();

        $quote = $this->getQuote();

        if (!$quote->hasItems() || !empty($quote->getErrors())) {
            return $resultRedirect->setPath('checkout/cart');
        }

        if (!$quote->validateMinimumAmount()) {
            $this->messageManager->addError(
                $this->_helperConfig->getConfigValue('sales/minimum_order/error_message')
            );

            return $resultRedirect->setPath('checkout/cart');
        }
        $this->_customerSession->regenerateId();
        $this->_objectManager->get('Magento\Checkout\Model\Session')->setCartWasUpdated(false);


        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set($this->_helperConfig->getCheckoutTitle());

        return $resultPage;
    }

    /**
     * Init Default Shipping from default config
     */
    protected function _initShippingAddress()
    {
        $address       = $this->_cart->getQuote()->getShippingAddress();
        $defaultFields = array(
            'country_id',
            'postcode',
            'region_id',
            'city',
        );

        foreach ($defaultFields as $field) {
            if (is_null($address->getData($field))) {
                $address->setData($field, $this->_helperConfig->getGeneralConfig('default_' . $field));
            }
        }
        if ($address->hasDataChanges()) {
            $address->setCollectShippingRates(true);
        }

        $this->quoteRepository->save($this->_cart->getQuote());
        $this->_cart->save();
    }

    protected function _initShippingMethod()
    {
        $this->_checkoutAddress->setDefaultShippingMethod($this->getShippingAddress());
    }

    protected function _initPaymentMethod()
    {
        $this->_checkoutPayment->setDefaultPaymentMethod();
    }
}
