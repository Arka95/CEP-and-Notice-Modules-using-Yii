<?php

class NoticeadminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'noticeadmin.models.*',
			'noticeadmin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
                    
                   if($controller->id==='noticeadmin')
                         $controller->layout = 'noticeAdminLayout';
			
                     else if($controller->id==='noticesuperadmin')
                          $controller->layout = 'noticeSuperadminLayout';
			return true;
		}
		else
			return false;
	}
}
