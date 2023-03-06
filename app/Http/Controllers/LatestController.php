<?php

namespace App\Http\Controllers;

use App\Models\Latest;
use App\Models\LatestNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class LatestController extends Controller
{

    // For Latest Events Start here

    public function index()
    {

        $latests = Latest::orderBy('updated_at', 'desc')->get();
        return view('admin.latest-events.index', compact('latests'));
        // End method
    }


    public function edit($id)
    {
        $latestEvents = Latest::where('id', $id)->first();

        return view('admin.latest-events.edit', compact('latestEvents'));
        // End method
    }




    public function update(Request $request, $id)
    {
                $request->validate([

                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'mimes:jpg,png,jpeg', 'max:5048']);

                    // $destination = 'upload/image-folder/'.$filename->image;
                    // if(File::exists($destination)){
                    //     File::delete($destination);
                    // }

                if($request->file('image')){
                $image = $request->file('image');
                $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(600, 500);
                $resize_image->save(public_path('upload/image-folder/'. $filename));

                Latest::where('id', $id)->update([

                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $filename,
                    'status' => $request->input('status') == true ? '1': '0'
                ]);

                return redirect(route('admin.latest-events.index'))->with('message', 'event  updated with image successfully');
            }else {

                Latest::where('id', $id)->update([

                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->input('status') == true ? '1': '0'

                ]);

                return redirect(route('admin.latest-events.index'))->with('message', 'event without image updated successfully');
            }
        // End method

    }




    public function create()
    {
        return view('admin.latest-events.create');
        // End method

    }

    public function store(Request $request)

    {
        $request->validate([

              // if($request->file('image')){
            //     $image = $request->file('image');
            //     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            //     Image::make($image)->resize(322, 500)->save('upload/image-folder/'.$name_gen);
            //     $save_url = 'upload/image-folder/'. $name_gen;


            // }
            //     $latest = new Latest();
            //     $latest->title = $request->title;
            //     $latest->description = $request->description;
            //     $latest->$image = $save_url;
            //     $latest->save();

            'title' => 'required|unique:latests|max:255',
            'description' => 'required',
            'image' => 'required','mimes:jpg,png,jpeg', 'max:5048']);


            $image = $request->image;
            $filename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(600, 500);
            $resize_image->save(public_path('upload/image-folder/'. $filename));

            $latest = new Latest();
            $latest->title = $request->title;
            $latest->description = $request->description;
            $latest->image = $filename;
            $latest->status = $request->input('status') == true ? '1': '0';
            $latest->save();

        return redirect(route('admin.latest-events.index'))->with('message', 'Event add successfully');
        // End method

    }


    public function delete($id)
    {
        Latest::destroy($id);

        return redirect(route('admin.latest-events.index'))->with('message', 'Post has been deleted');
    }

    // End of Latest Events


}
