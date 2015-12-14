<!DOCTYPE html> 
<html>
	<head>
	</head>
	<body>
		<h1>authour index</h1>
		<ul>
			@foreach($users as $user)
				<li>
					<a href="/authour/{{$user->id}}">	
						{{$user->name}}
					</a>
				</li>
			@endforeach
		</ul>
	</body>
</html>