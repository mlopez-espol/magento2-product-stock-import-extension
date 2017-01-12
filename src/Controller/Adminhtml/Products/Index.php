<?php

/**
 * Limesharp_Import extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Limesharp
 * @package   Limesharp_Import
 * @copyright 2016 Limesharp
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Claudiu Creanga
 */
namespace Limesharp\Import\Controller\Adminhtml\Products;

use Limesharp\Import\Controller\Adminhtml\AbstractImportIntegration;

class Index extends AbstractImportIntegration
{
    /**
     * Products list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Limesharp_Import::products_files');
        $resultPage->getConfig()->getImport()->prepend(__('Product files that run'));
        $resultPage->addBreadcrumb(__('Import Integration'), __('Import Integration'));
        return $resultPage;
    }
}