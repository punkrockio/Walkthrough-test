<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Create a new blog</h1>
		
		<form action='/post' method='post' id='postForm'>
				Title: <input type="text" name="title">
		</form>
		<br>
		<br>
		<p>Your content:</p>
		<textarea name='article' form='postForm'  rows='10' cols='80'></textarea>
		<br>
		<br>
		<button form='postForm' type='submit'>Submit</button>
	</body>
</html>