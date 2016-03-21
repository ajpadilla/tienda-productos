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

		public function update($data = array())
		{
			$classification = $this->get($data['classification_id']);
			$classification->update($data);
			return $classification;
		}
	}
?>