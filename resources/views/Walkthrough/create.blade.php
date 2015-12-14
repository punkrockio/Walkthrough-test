<!DOCTYPE html>
<html>
<head>
	<title>Walkthrough input</title>
</head>
<body>
	<form action="/walkthrough" method="post" id="postData">	

	</form>


	<!-- HTML -->
	<label>HTML Code</label>
	<br>
	<textarea name="htmlCode" form="postData" rows="10" cols="40">

	</textarea>

	<br><br>
	<!-- CSS -->
	<label>CSS Code</label>
	<br>
	<textarea name="cssCode" form="postData" rows="10" cols="40">

	</textarea>

	<br><br>
	<!-- JS -->
	<label>JS Coded</label>
	<br>
	<textarea name="jsCode" form="postData" rows="10" cols="40">

	</textarea>
	<br>
	<!-- Submit -->

	<button class="btn btn-default" form="postData" type="submit">Create!</button>

</body>
</html>