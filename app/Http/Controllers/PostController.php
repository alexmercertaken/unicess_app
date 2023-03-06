<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Latest;
use App\Models\NewsUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('dashboard', compact('posts'));
    }
    public function proposal()
    {



        $posts = Post::orderBy('updated_at', 'desc')->get();


        return view('proposal', compact('posts'));
    }

    public function lnuShow()
    {
        $authorize = DB::table('users')->select('authorize')->get();
        $slider = Latest::where('status', '1')->get();

        $newsUpdate = NewsUpdate::where('status', '1')->get();

        return view('lnu', compact('newsUpdate', 'slider', 'authorize'));
    }


    public function markasread($id)

    {
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|unique:posts|max:255',
            'description' => 'required']);

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id  = auth()->id();
            $post->save();

            return redirect(route('dashboard'))->with('message', 'Your post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['users' => POST::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $request->validate([

            'title' => 'required|unique:posts|max:255',
            'description' => 'required']);

        POST::where('id', $id)->update([

            'title' => $request->title,
            'description' => $request->description,

        ]);
        return redirect(route('dashboard'))->with('message', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Post::destroy($id);

        return redirect(route('dashboard'))->with('message', 'Post has been deleted');
    }
}
