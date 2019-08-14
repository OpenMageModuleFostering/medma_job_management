<?php
/**
 * Medma Lenswebshop Module.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Team
 * that is bundled with this package of Medma Infomatix Pvt. Ltd.
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * Medma Support does not guarantee correct work of this package
 * on any other Magento edition except Magento COMMUNITY edition.
 * =================================================================
 */



$installer = $this;

$installer->startSetup();


$installer->run("

ALTER TABLE `{$this->getTable('job_manager')}` DROP COLUMN applicant_name;
ALTER TABLE `{$this->getTable('job_manager')}` DROP COLUMN applicant_phone;

");

$installer->endSetup(); 
?>
