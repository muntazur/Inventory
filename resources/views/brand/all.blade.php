
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Brand</th>
      <th>status</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  			@foreach($table as $row)
                        
                    <tr>
  						<td>{{$row->name}}</td>

  						@if($row->status=='1')
  						  <td>
  						  	<ul>
  						  		<li class="btn btn-success btn-sm">active</li>
  						    </ul>

  						  </td>
  						@endif

  						<td>

  						   <ul>

  						   	 <li class = "btn btn-primary btn-sm">Edit</li>
  						   	 <li class = "btn btn-danger btn-sm">Delete</li>

  						   </ul>

  						</td>

  					</tr>
  			    

  			@endforeach
  </tbody>

</table>


