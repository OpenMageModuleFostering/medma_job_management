<?php
class Medma_Job_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
	{
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Job Management"));
      $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");

      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("job management", array(
                "label" => $this->__("Job Management"),
                "title" => $this->__("Job Management")
		   ));

      $this->renderLayout(); 
    }

	public function saveAction()
	{
		if ($data = $this->getRequest()->getPost())
		{
			//echo "Test 1".$_FILES['filename']['name'];
			
			try {
				if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '')
				{
						/* Starting upload */	
						$uploader = new Varien_File_Uploader('filename');
			
						/* Any extention would work */
					  $uploader->setAllowedExtensions(array('doc','docx','txt','odt','pdf'));
						$uploader->setAllowRenameFiles(false);

						/*
						 * Set the file upload mode 
						 * false -> get the file directly in the specified folder
						 * true -> get the file in the product like folders 
						 *	(file.jpg will go in something like /media/f/i/file.jpg)
						*/
						$uploader->setFilesDispersion(false);
					
						// We set media as the upload dir
						$path = Mage::getBaseDir('media') . DS .'cv';
						$uploader->save($path, $_FILES['filename']['name'] );

							//this way the name is saved in DB
							$data['filename'] = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'cv/'.$_FILES['filename']['name'];

						//echo $data['filename']; exit;
				}
				$model = Mage::getModel('job/jobmanagement');

				$model->setData($data)
					->setId($this->getRequest()->getParam('job_id'));

				$model->save();
				Mage::getSingleton('core/session')->addSuccess('You have applied Successfully.');

				}
				catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage().' File type should be doc/docx/txt/odt/pdf');
            Mage::getSingleton('core/session')->setFormData($data);
            $this->_redirect('*/*/');
        }

		}
		$this->_redirect('*/*/');
	}
	public function testAction()
	{
			Mage::getModel('job/columns')->dropColumns('newcol_test_field2');
	}
}
