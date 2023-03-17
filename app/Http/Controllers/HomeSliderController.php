<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    //
    public function HomeSlider()
    {
        $homeslide = HomeSlide::find(1);

        return view('admin.homeslide.home_slide_all', compact('homeslide'));


    }
}
