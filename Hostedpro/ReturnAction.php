<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Paypal\Controller\Hostedpro;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\RemoteServiceUnavailableException;

class ReturnAction extends \Magento\Framework\App\Action\Action implements CsrfAwareActionInterface
{
    /**
     * When a customer return to website from gateway.
     *
     * @return void
     */
     
       /**
     * @inheritDoc
     */
    public function createCsrfValidationException(
        RequestInterface $request
    ): ?InvalidRequestException {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
     
    public function execute()
    {
        $session = $this->_objectManager->get(\Magento\Checkout\Model\Session::class);
        //TODO: some actions with order
        if ($session->getLastRealOrderId()) {
            $this->_redirect('checkout/onepage/success');
        }
    }
}
