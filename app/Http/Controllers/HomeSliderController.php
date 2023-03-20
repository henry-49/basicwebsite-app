<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    //
    public function HomeSlider()
    {
        $homeslide = HomeSlide::find(1);

        return view('admin.homeslide.home_slide_all', compact('homeslide'));

    }

    /**
     * Update Slider
     */

     public function UpdateSlider(Request $request)
     {
        $slide_id = $request->id;

        if ($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 5446474338.jpg

            // resize image before upload
            Image::make($image)->resize(636, 852)->save('upload/home_slider/'.$name_gen);
            $save_url = 'upload/home_slider/'.$name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,

            ]);

            $notification = array(
                'message' => 'Home Slide Updated with Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        }else{

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);

            $notification = array(
                'message' => 'Home Slide Updated without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } // end if


     }



}
