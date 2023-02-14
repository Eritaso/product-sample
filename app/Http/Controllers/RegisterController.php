<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use Packages\Application\Usecase\Profile\StoreUsecase;
use Packages\Domain\Models\HolidayType;

class RegisterController extends Controller
{
    public function show()
    {
        $holidays = HolidayType::cases();

        return view('profileRegister', compact('holidays'));
    }

    public function store(ProfileStoreRequest $request, StoreUsecase $usecase)
    {
        $usecase->__invoke($request->name, $request->sexType, $request->tel, collect($request->holidays), $request->comment ?? '');

        return redirect()->route('profileList')->with('message', '登録しました。');
    }
}
