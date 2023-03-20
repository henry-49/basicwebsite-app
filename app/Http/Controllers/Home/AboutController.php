<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{

    /**
     * About page
     */
    public function AboutPage()
    {
        $aboutpage = About::find(1);

        return view('admin.aboutpage.about_page_all', compact('aboutpage'));
    }

}
