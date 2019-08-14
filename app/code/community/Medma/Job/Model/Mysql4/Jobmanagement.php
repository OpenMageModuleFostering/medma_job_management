<?php
class Medma_Job_Model_Mysql4_Jobmanagement extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("job/jobmanagement", "job_id");
    }
}