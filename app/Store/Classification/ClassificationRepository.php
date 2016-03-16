<?php  
	namespace App\Store\Classification;

	use App\Store\Classification\Classification;
	
	use App\Store\Base\BaseRepository;

	/**
	* 
	*/
	class ClassificationRepository extends BaseRepository
	{
		public function __construct()
		{
			$this->setModel(new Classification);
		}
	}
?>