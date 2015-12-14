<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;

class PostController extends Controller
{

    /*
    find blog post with primary key

    create blade views for each method
    */
    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('Post/index')->withPosts(Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //return 'Your email is: ' . Auth::user()->email;
        return view("Post/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //email saved to $_COOKIE['email'];

        if (!isset($_COOKIE['email'])) {
            return "Failed to create post!";
        }
        $email = $_COOKIE['email'];

        $post = new Post;
        $post->title = $request->title;
        $post->author_id = User::where('email', $email)->first()->id;
        $post->article = $request->article;
        $post->save();
        return redirect()->intended('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
// $post =  Post::findOrFail($id);
        try {
            $post =  Post::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) {
            return 'Model was not found!';

        } catch(Exception $e) {
            return $e;
        }

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
