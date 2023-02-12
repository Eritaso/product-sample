<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Packages\Application\Usecase\Profile\ShowListUsecase;
use Packages\Application\Usecase\Profile\ShowUsecase;

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

        return view('profile', compact('profile'));
    }
}
