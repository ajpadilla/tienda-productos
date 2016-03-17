<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Store\Classification\ClassificationRepository;
use App\Http\Requests\StoreClassificationRequest;

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
    	$this->setSuccess(true);
		$this->addToResponseArray('classification', $classification);
		return $this->getResponseArrayJson();
    }
   
}
