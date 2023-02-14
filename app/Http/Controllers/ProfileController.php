<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use Illuminate\Http\Request;
use Packages\Application\Usecase\Profile\ShowListUsecase;
use Packages\Application\Usecase\Profile\ShowUsecase;
use Packages\Application\Usecase\Profile\UpadateUsecase;
use Packages\Domain\Models\HolidayType;

class ProfileController extends Controller
{
    public function index(ShowListUsecase $usecase, Request $request)
    {
        $profileList = $usecase->__invoke($request->input('name'), $request->input('sexType'), $request->input('tel'));

        return view('profileList', compact('profileList'));
    }

    public function show(int $id, ShowUsecase $usecase)
    {
        $profile = $usecase->__invoke($id);
        $holidays = HolidayType::cases();

        return view('profile', compact('profile', 'holidays'));
    }

    public function update(int $id, ProfileStoreRequest $request, UpadateUsecase $usecase)
    {
        $usecase->__invoke($id, $request->name, $request->sexType, $request->tel, collect($request->holidays), $request->comment ?? '');

        return redirect()->back()->with('message', '更新しました。');
    }
}
