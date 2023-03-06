<?php

namespace App\Http\Controllers;


use App\Models\NewsUpdate;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class LatestNewsController extends Controller
{


    //  For Latest News Starts here

    public function index()
    {
        $newsUpdates = NewsUpdate::orderBy('updated_at', 'desc')->get();
        return view('admin.latest-news.index', compact('newsUpdates'));
    }

    public function create()
    {
        return view('admin.latest-news.create');
        // End method

    }


    public function store(Request $request)

    {
        $request->validate([

            'title' => 'required|unique:latests|max:255',
            'description' => 'required',
            'image' => 'required','mimes:jpg,png,jpeg', 'max:5048']);

            $image = $request->image;
            $filename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(600, 500);
            $resize_image->save(public_path('upload/image-folder/'. $filename));

            $newsupdate = new NewsUpdate();
            $newsupdate->title = $request->title;
            $newsupdate->description = $request->description;
            $newsupdate->image = $filename;
            $newsupdate->status = $request->input('status') == true ? '1': '0';
            $newsupdate->save();

        return redirect(route('admin.latest-news.index'))->with('message', 'News add successfully');
        // End method

        dd($newsupdate);

    }


    public function edit($id)
    {
        $latestNews = NewsUpdate::where('id', $id)->first();

        return view('admin.latest-news.edit', compact('latestNews'));
        // End method
    }


    public function update(Request $request, $id)
    {
                $request->validate([

                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'mimes:jpg,png,jpeg', 'max:5048']);

                if($request->file('image')){
                $image = $request->file('image');
                $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(600, 500);
                $resize_image->save(public_path('upload/image-folder/'. $filename));

                NewsUpdate::where('id', $id)->update([

                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $filename,
                    'status' => $request->input('status') == true ? '1': '0'
                ]);

                return redirect(route('admin.latest-news.index'))->with('message', 'News  updated with image successfully');
            }else {

                NewsUpdate::where('id', $id)->update([

                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->input('status') == true ? '1': '0'

                ]);

                return redirect(route('admin.latest-news.index'))->with('message', 'News updated w/o image  successfully');
            }
        // End method

    }


    public function delete($id)
    {
        NewsUpdate::destroy($id);

        return redirect(route('admin.latest-news.index'))->with('message', 'Post has been deleted');

         // End method

    }


}
