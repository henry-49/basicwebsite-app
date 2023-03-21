<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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


    /**
     * Upload Multi Image
     */

     public function AboutMultiImage()
     {

        return view('admin.aboutpage.multi_image');
     }


     /**
      * Store Multi Image
      */

    public function StoreMultiImage(Request $request)
    {

        $image = $request->file('multi_image');

        foreach ($image as $multi_image){

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension(); // 5446474338.jpg

            // resize image before upload
            Image::make($multi_image)->resize(220, 220)->save('upload/multi/' . $name_gen);
            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),

            ]);
        }

        var_dump($name_gen);
            $notification = array(
                'message' => 'Multi Image Inserted Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
    }


    /**
     * Show all multi image
     */

    public function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();

        return view('admin.aboutpage.all_multi_image', compact('allMultiImage'));
    }
}
