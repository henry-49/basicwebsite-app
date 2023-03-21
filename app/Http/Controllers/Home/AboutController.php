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


    /**
     * Update About page
     */

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 5446474338.jpg

            // resize image before upload
            Image::make($image)->resize(523,605)->save('upload/home_about/' . $name_gen);
            $save_url = 'upload/home_about/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]);

            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,

            ]);

            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } // end if


    }


    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));
    }

}
