<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Store\Classification\ClassificationRepository;
use App\Http\Requests\StoreClassificationRequest;
use App\Store\Classification\ClassificationRepository;

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
    	return response()->json(compact('user'));
    }
}
