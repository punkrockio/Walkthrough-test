<?php
namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller {



	public function getHomepage() {
		
		$posts = Post::all();

		return view('welcome')
			->withPosts($posts);
	}


}

?>