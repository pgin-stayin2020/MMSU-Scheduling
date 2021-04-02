@extends('layouts.main')

@section('title')
Sections Page - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
<div class="row">
	<h1 class="header">Sections</h1>
	<div class="col">
		<h4 class="section-header">Search:</h4>
		<div class="card">
			<div class="card-header">
				<h5>Filters</h5>
			</div>
			<div class="card-block">
				<div class="container">
					<div class="row">
						<label for="name" class="form-label col-2">Section Name:</label>
						<div class="col-5">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control" placeholder="Section Name">
							</div>
						</div>
						<div class="col-md-5">
							<input type="submit" class="btn btn-primary" name="" value="Submit">
						</div>
					</div>
				</div>

			</div>
		</div>

		<h4 class="section-header">List of Sections</h4>
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Size</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>A</td>
					<td>20</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
@endsection