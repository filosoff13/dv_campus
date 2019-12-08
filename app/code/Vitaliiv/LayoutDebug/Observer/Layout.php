<?php

namespace Vitaliiv\LayoutDebug\Observer;

class Layout
{
    private $logger;

    /**
     * Layout constructor.
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct( \Psr\Log\LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $xml = $observer->getEvent()->getLayout()->getXmlString();
        /*$this->_logger->debug($xml);*//*If you use it, check ouput string xml in var/debug.log*/
        $writer = new \Zend\Log\Writer\Stream(BP . '/pub/layout_block.xml');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($xml);
        return $this;
    }
}