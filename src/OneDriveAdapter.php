<?php
namespace As247\Flysystem\OneDrive;


use As247\CloudStorages\Storage\OneDrive;
use As247\Flysystem\DriveSupport\StorageToAdapter;
use Microsoft\Graph\Graph;
use League\Flysystem\Adapter\AbstractAdapter;

class OneDriveAdapter extends AbstractAdapter
{
	use StorageToAdapter;
	protected $storage;
    public function __construct(Graph $graph, $options = '')
    {
        if(!is_array($options)){
            $options=['root'=>$options];
        }
    	$this->storage=new OneDrive($graph,$options);
    	$this->setPathPrefix($options['root']??'');
		$this->throwException=$options['debug']??'';
    }
	public function getTemporaryUrl($path, $expiration=null, $options=[]){
		return $this->getMetadata($path)['@downloadUrl']??'';
	}

}
