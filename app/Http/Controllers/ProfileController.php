<?php

namespace App\Http\Controllers;

use Packages\Application\Usecase\Profile\ShowListUsecase;

class ProfileController extends Controller
{
    public function show(int $id, ShowListUsecase $usecase)
    {
        $profile = $usecase->__invoke($id);

        return view('profile', compact('profile'));
    }
}
