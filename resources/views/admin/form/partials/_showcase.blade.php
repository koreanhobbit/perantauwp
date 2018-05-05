@component('admin.widgets.panel')
	@slot('panelTitle1', 'Showcase')
	@slot('panelBody')	
		<div class="row">
			<div class="col-sm-12">
				<div class="form-component">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="row m-b-20">
			<div class="col-sm-12">
				<a href="javascript:" class="sourceCodeBtn">
					<span><i class="fa fa-info"></i><small>&nbsp; See Source Code</small></span>
				</a>
			</div>
		</div>
		<div class="row sourceCodeRow hidden">
			<div class="col-sm-12">
				<textarea name="" id="" class="form-control"></textarea>
			</div>
		</div>
	@endslot
@endcomponent