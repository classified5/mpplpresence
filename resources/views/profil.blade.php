
@extends('admin_template')

@section('content')


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Profil</h3>
	</div>

	<div id="example1_wrapper" class="box-body"
		
		<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row col-sm-12">
				<div class="box-header with-border">
					
				</div>
				<div class="box-body">
					
				</div>
			</div>
		</div>
	</div>

</div>

<script>
$(function () {
	$("#example1").DataTable();
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});
</script>
@endsection