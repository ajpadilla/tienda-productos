<?php  
	namespace App\Store\Classification;

	use App\Store\Base\BaseRepository;
	use App\Store\Classification\Classification;

	/**
	* 
	*/
	class ClassificationRepository extends BaseRepository
	{
		function __construct()
		{
			$this->setModel(new Classification);
		}
	}
?>