<!doctype html>
<html>
	<head>
		<title>Delete project</title>
	</head>
	<body>
		<b><h1>Delete project</h1></b>
		<div class="content">
			<form class="" action="{{ route('delete', ['id'=>$project->id]) }}" method="post">
				@method('DELETE') 
				@csrf
				<div>
					<br><h4>You are about to delete project {{ $project->id }}. Are you sure?</h4><br>
					<button type="submit" name="button">Yes</button>
					<a href="{{URL::to('index')}}">No</a>
				</div>
			</form>
		</div>
	</body>
</html>