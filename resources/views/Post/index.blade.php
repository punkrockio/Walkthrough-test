<!DOCTYPE>
<html>
	<head>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	</head>
	<body>

		<ul>
			@foreach($posts as $post)
				<li>
					<?php 
						$postUrl = "http://blog.dev/post/" . $post->id; 
						$authourUrl = "http://blog.dev/authour/" . $post->authour->id; 
					?>

					<a href="{{$postUrl}}"  class="btn btn-primary">
						{{$post->title}} 
					</a>
					
					by 

					<a href="{{$authourUrl}}" class="btn btn-primary">
						{{ $post->authour->name }}
					</a>	
				</li>
			@endforeach
			
		</ul>


	</body>
</html>