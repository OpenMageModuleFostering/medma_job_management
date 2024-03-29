<?php

class Medma_Job_Block_Adminhtml_Jobbackend_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('jobGrid');
      $this->setDefaultSort('job_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('job/jobmanagement')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('job_id', array(
          'header'    => Mage::helper('job')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'job_id',
      ));

      $this->addColumn('applicant_name', array(
          'header'    => Mage::helper('job')->__('Applicant Name'),
          'align'     =>'left',
          'index'     => 'applicant_name',
      ));

      $this->addColumn('applicant_email', array(
			'header'    => Mage::helper('job')->__('Applicant Email'),
			'width'     => '150px',
			'index'     => 'applicant_email',
      ));

      $this->addColumn('applicant_phone', array(
			'header'    => Mage::helper('job')->__('Applicant Phone'),
			'width'     => '150px',
			'index'     => 'applicant_phone',
      ));

      $this->addColumn('filename', array(
			'header'    => Mage::helper('job')->__('File Path'),
			'width'     => '100px',
			'index'     => 'filename',
      ));

	  $this->addExportType('*/*/exportCsv', Mage::helper('job')->__('CSV'));
	  $this->addExportType('*/*/exportXml', Mage::helper('job')->__('XML'));

      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('job_id');
        $this->getMassactionBlock()->setFormFieldName('job');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('job')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('job')->__('Are you sure?')
        ));

        return $this;
    }

}
