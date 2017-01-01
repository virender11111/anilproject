<?php

/**
 * Webservices Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Webservices
 * @version  1.0
 * @author   Apurav Gaur
 */
class WebservicesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Webservices';

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Email', 'RequestHandler'
    );

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('User');
    public $status = false;
    public $output = null;
    public $message = '';
    public $timestamp = '';
    public $requestData = null;

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function index() {


        $this->requestData = $this->request->query;
        //set data from post
        if ($this->request->is('post')) {

            $this->requestData = $this->request->data;

            CakeLog::write('activity_' . date('dmY'), json_encode($this->request->data)); // add json
        }
        if (!empty($this->requestData['action'])) {
            $fun = "_" . $this->requestData['action'];
            $this->$fun();
        }
        $this->_output();
    }

    private function _output() {
        // How long my cache should last
        $cacheDuration = 300; // in seconds
        // Client is told to cache these results for set duration
        header('Cache-Control: public,max-age=' . $cacheDuration . ',must-revalidate');
        header('Expires: ' . gmdate('D, d M Y H:i:s', ($_SERVER['REQUEST_TIME'] + $cacheDuration)) . ' GMT');
        header('Last-modified: ' . gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME']) . ' GMT');

        // Pragma header removed should the server happen to set it automatically
        // Pragma headers can make browser misbehave and still ask data from server
        header_remove('Pragma');

        $this->output['message'] = $this->message;
        $this->output['status'] = $this->status;
        $output = json_encode($this->output);

        header('Content-Type: application/json');
        echo $output;
        exit();
    }
    public function _dataSync(){
    	$this->loadModel('Country');
    	$this->loadModel('Category');
    	$this->loadModel('Sitelink');
    	if($this->requestData['timestamp']==0){
    	
    		$categories = $this->Category->find('all',array(
    				'conditions'=>array(
    						'Category.status'=>1
    				)
    		)
    		);
    		/*
    		 * sitelinks listing
    		*/
    		$sitelinks = $this->Sitelink->find('all',array(
    				'conditions'=>array(
    						'Sitelink.status'=>1
    				)
    		)
    		);
    		if (count($categories) > 0) {
    			
    			foreach ($categories as $key1 => $catvalue) {
    				$categories[$key1] = $catvalue['Category'];
    			}
    			foreach ($sitelinks as $key2 => $sitevalue) {
    				$sitelinks[$key2] = $sitevalue['Sitelink'];
    			}
    			$this->output['categories'] = $categories;
    			$this->output['subcategory'] = $sitelinks;
    			$this->output['timestamp'] =time();
    			$this->status = true;
    			$this->message = "Data sync Listing";
    		} else {
    			$this->status = false;
    			$this->message = "Data not available";
    		}
    	}else{
    		$modifiedDate = date('Y-m-d h:i:s',$this->requestData['timestamp']);
    		
    		
    		/*
    		 * categories listing
    		*/
    		$categories = $this->Category->find('all',array(
    				'conditions'=>array(
    						'Category.status'=>1,
    						'Category.modified >'=>$modifiedDate,
    				)
    		)
    		);
    		/*
    		 * sitelinks listing
    		*/
    		$sitelinks = $this->Sitelink->find('all',array(
    				'conditions'=>array(
    						'Sitelink.status'=>1,
    						'Sitelink.modified >'=>$modifiedDate,
    				)
    		)
    		);
    		if (count($categories) > 0) {
    			
    			foreach ($categories as $key1 => $catvalue) {
    				$categories[$key1] = $catvalue['Category'];
    			}
    			foreach ($sitelinks as $key2 => $sitevalue) {
    				$sitelinks[$key2] = $sitevalue['Sitelink'];
    			}
    			$this->output['categories'] = $categories;
    			$this->output['sitelinks'] = $sitelinks;
    			$this->output['timestamp'] =time();
    			$this->status = true;
    			$this->message = "Country Listing";
    		} else {
    			$this->status = false;
    			$this->message = "Country not available";
    		}
    	}
    }
    
    public function _images(){
        $this->loadModel('Brand');
        
       
        $images = $this->Brand->find('all',array('status'=>1));
        if(count($images)>0){
            foreach ($images as $key => $image) {
    		$images[$key] = $image['Brand'];
    	}
                        $this->output['image_base_url'] = Router::url('/files/brand/image',true);
                        $this->output['images'] = $images;
    			$this->status = true;
    			$this->message = "Images Listing";
        }else{
            $this->status = false;
    	$this->message = "Images not available";
        }
        
    }
}
