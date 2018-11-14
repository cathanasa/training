</doctype html>
<html>
	<head>
		<title>View projects</title>
	</head>	
	<body>
		<b><h1>View projects</h1></b>
		<table border = 1>
	         <tr>
	            <th>S/N</th>
	            <th>Name</th>
	            <th>Customer</th>
	            <th>Start Date</th>
	            <th>End Date</th>
	            <th>Active</th>
	            <th>Budget</th>
	            <th>Actions</th>
	         </tr>
	         @foreach ($projects as $i)
	         <tr>
	            <td>{{ $i->id }}</td>
	            <td>{{ $i->name }}</td>
	            <td>{{ $i->customer }}</td>
	            <td>{{ $i->start_date }}</td>
	            <td>{{ $i->end_date }}</td>
	            <td>{{ $i->active }}</td>
	            <td>{{ $i->budget }}</td>
	            <td></td>
	         </tr>
	         @endforeach
      	</table>
      	<form class="" action="{{URL::to('new')}}" method="get">
      		<br><br><button type="submit" name="button">New Project</button>
      	</form>
	</body>
</html>