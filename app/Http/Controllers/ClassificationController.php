<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Store\Classification\ClassificationRepository;
use App\Http\Requests\StoreClassificationRequest;

class ClassificationController extends Controller
{

	protected $userRepository;

    public function __construct(UserRepository $userRepository) {
    	$this->userRepository = $userRepository;
    }

    public function index()
    {
    	return view('classification.index');
    }

    public function store(StoreClassificationRequest $request)
    {
    	return response()->json(compact('user'));
    }
}
