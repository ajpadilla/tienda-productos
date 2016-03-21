<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Store\Classification\ClassificationRepository;
use App\Http\Requests\StoreClassificationRequest;
use App\Http\Requests\UpdateClassificationRequest;

class ClassificationController extends Controller
{

	protected $repository;

    public function __construct(ClassificationRepository $repository) {
    	$this->repository = $repository;
    }

    public function index()
    {
    	return view('classification.index');
    }

    public function store(StoreClassificationRequest $request)
    {
    	$classification = $this->repository->create($request->all());
    	$this->setSuccess(($classification ? true : false));
		$this->addToResponseArray('classification', $classification);
		return $this->getResponseArrayJson();
    }

    public function checkName(Request $request)
    {
    	$classification = $this->repository->getModel()->whereName($request->input('name'))->first();
    	$this->setSuccess(($classification ? true : false));
    	$this->addToResponseArray('classification', $classification);
		return $this->getResponseArrayJson();
    }
   
    public function listAll($numberItems = 10)
    {
    	$classifications = $this->repository->getModel()->paginate($numberItems);
    	$this->setSuccess(($classifications ? true : false));
    	$this->addToResponseArray('classifications', $classifications);
		return $this->getResponseArrayJson();
    }

    public function getData($id)
    {
    	$classification = $this->repository->get($id);
    	$this->setSuccess(($classification ? true : false));
    	$this->addToResponseArray('classification', $classification);
		return $this->getResponseArrayJson();
    }

    public function update(UpdateClassificationRequest $request, $id)
    {
    	$input = $request->all();
    	$input['classification_id'] = $id;
    	$classification = $this->repository->update($input);
    	$this->setSuccess(($classification ? true : false));
    	$this->addToResponseArray('classification', $classification);
		return $this->getResponseArrayJson();
    }



}
