<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyKycRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function __construct(protected UserRepository $userRepository)
    {
        
    }

    public function index()
    {
        $data = [];
        $data['user'] = auth('web')->user();
        return view('user.kyc.prompt', $data);
    }

    public function kycPage()
    {
        return view('user.kyc.index');
    }

    public function verification(VerifyKycRequest $request)
    {
        $data = $request->validated();

        $SelfiePath = Storage::putFile('selfies', $request->file('selfie'));
        $frontPath = Storage::putFile('documents', $request->file('document_front'));
        $backPath = Storage::putFile('documents', $request->file('document_back'));
        $data['selfie'] = $SelfiePath;
        $data['document_front'] = $frontPath;
        $data['document_back'] = $backPath;

        if ($this->userRepository->setKyc($data, $request->user('web'))) {
            return response()->json(['status' => true, 'message' => 'KYC updated']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to update Kyc']);
    }
}
