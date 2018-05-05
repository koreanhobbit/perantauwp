@extends('admin.layouts.navs')

@section('page_heading', 'Edit Form')

@section('section')
	<div class="row m-b-20">
		<div class="col-sm-12">
			<div class="pull-right">
				<button class="btn btn-sm btn-primary" type="submit">Edit Form</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			@component('admin.widgets.panel')
				@slot('panelTitle1', 'Construct Form')
				@slot('panelBody')
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">Form's Name</label>
								<div class="input-group">
									<input type="text" name="name" id="name" value="{{ $form->name }}" class="form-control" disabled="">
									<span class="input-group-btn">
										<button class="btn btn-default activateName">
											<span><i class="fa fa-check"></i></span>
										</button>
									</span>
								</div>
								<div class="help-block">
									<span>
										<strong>
											{{ $errors->first('name') }}
										</strong>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row addItemRow">
						@foreach($formParts as $item)
							<div class="col-sm-6">
								<div class="form-group">
									<a data-toggle="modal" data-target="{{ '#modal' .  $item->name }}" class="btn btn-primary form-control submitItemBtn" data-id="{{ $item->id }}">Add {{ ucfirst($item->name) }}</a>
								</div>	
							</div>
						@endforeach
					</div>
				@endslot
			@endcomponent
		</div>
		<div class="col-sm-6">
			<div class="loaderHook"></div>
			<div class="showcaseContainer">
				@include('admin.form.partials._showcase')
			</div>
		</div>
	</div>


	{{-- modals section --}}
	{{-- modal for input --}}
	<div class="modal fade-in" id="modalinput">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Input</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-sm-12">
					<div class="form-group">
						<label for="label">Label</label>
	        			<input type="text" name="label" id="label" class="form-control">
	        		</div>
	        		<div class="form-group">
	        			<label for="type">Type</label>
	        			<select name="type" id="type" class="form-control">
	        				<option value="text">Text</option>
	        				<option value="email">Email</option>
	        				<option value="password">Password</option>
	        				<option value="phone">Phone</option>
	        			</select>
	        		</div>
	        	</div>
	        </div>
	        <div class="row"> 
		      	<div class="col-sm-12">
		      		<div class="pull-right">
		      			<a href="javascript:" class="btn btn-sm btn-primary appendItemBtn" data-dismiss="modal" data-url="{{ route('form.edit', ['form' => $form->id]) }}" data-title="addInput" data-id="">Add Item</a>
		      		</div>
		      	</div>
		    </div>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- modal for textarea --}}
	<div class="modal fade-in" id="modaltextarea">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Text Area</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-sm-12">
					<div class="form-group">
						<label for="label">Label</label>
	        			<input type="text" name="label" id="label" class="form-control">
	        		</div>
	        	</div>
	        </div>
	        <div class="row"> 
		      	<div class="col-sm-12">
		      		<div class="pull-right">
		      			<a href="javascript:" class="btn btn-sm btn-primary appendItemBtn" data-dismiss="modal" data-url="{{ route('form.edit', ['form' => $form->id]) }}" data-title="addTextarea">Add Item</a>
		      		</div>
		      	</div>
		    </div>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- modal for radio --}}
	<div class="modal fade-in" id="modalradio">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Radio</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-sm-12">
					<div class="form-group">
						<label for="label">Label</label>
	        			<input type="text" name="label" id="label" class="form-control">
	        		</div>
	        		<div class="optionRow">
		        		<div class="row">
		        			<div class="col-sm-6">
		        				<div class="form-group">
			        				<label for="optionname">Name</label>
			        				<input type="text" class="form-control optionname" id="optionname" name="optionname">
			        			</div>
		        			</div>
		        			<div class="col-sm-6">
		        				<div class="form-group">
		        					<label for="optionvalue">Value</label>
		        					<input type="text" class="form-control optionvalue" id="optionvalue" name="optionvalue">
		        				</div>
		        			</div>
			        	</div>
			        </div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<div class="pull-left">
		        				<a href="javascript:" class="btn btn-sm btn-info addOptionBtn">
		        					<span><i class="fa fa-plus"></i></span>&nbsp;Add more option
		        				</a>
		        			</div>
		        		</div>
		        	</div>
	        	</div>
	        </div>
	        <div class="row"> 
		      	<div class="col-sm-12">
		      		<div class="pull-right">
		      			<a href="javascript:" class="btn btn-sm btn-primary appendItemBtn" data-dismiss="modal" data-url="{{ route('form.edit', ['form' => $form->id]) }}" data-title="addRadio">Add Item</a>
		      		</div>
		      	</div>
		    </div>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- modal for checkbox --}}
	<div class="modal fade-in" id="modalcheckbox">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Checkbox</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-sm-12">
					<div class="form-group">
						<label for="label">Label</label>
	        			<input type="text" name="label" id="label" class="form-control">
	        		</div>
	        		<div class="optionRow">
		        		<div class="row">
		        			<div class="col-sm-6">
		        				<div class="form-group">
			        				<label for="optionname">Name</label>
			        				<input type="text" class="form-control optionname" id="optionname" name="optionname">
			        			</div>
		        			</div>
		        			<div class="col-sm-6">
		        				<div class="form-group">
		        					<label for="optionvalue">Value</label>
		        					<input type="text" class="form-control optionvalue" id="optionvalue" name="optionvalue">
		        				</div>
		        			</div>
			        	</div>
			        </div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<div class="pull-left">
		        				<a href="javascript:" class="btn btn-sm btn-info addOptionBtn">
		        					<span><i class="fa fa-plus"></i></span>&nbsp;Add more option
		        				</a>
		        			</div>
		        		</div>
		        	</div>
	        	</div>
	        </div>
	        <div class="row"> 
		      	<div class="col-sm-12">
		      		<div class="pull-right">
		      			<a href="javascript:" class="btn btn-sm btn-primary appendItemBtn" data-dismiss="modal" data-url="{{ route('form.edit', ['form' => $form->id]) }}" data-title="addCheckbox">Add Item</a>
		      		</div>
		      	</div>
		    </div>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- modal for select --}}
	<div class="modal fade-in" id="modalselect">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Select</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-sm-12">
					<div class="form-group">
						<label for="label">Label</label>
	        			<input type="text" name="label" id="label" class="form-control">
	        		</div>
	        		<div class="optionRow">
		        		<div class="row">
		        			<div class="col-sm-6">
		        				<div class="form-group">
			        				<label for="optionname">Name</label>
			        				<input type="text" class="form-control optionname" id="optionname" name="optionname">
			        			</div>
		        			</div>
		        			<div class="col-sm-6">
		        				<div class="form-group">
		        					<label for="optionvalue">Value</label>
		        					<input type="text" class="form-control optionvalue" id="optionvalue" name="optionvalue">
		        				</div>
		        			</div>
			        	</div>
			        </div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<div class="pull-left">
		        				<a href="javascript:" class="btn btn-sm btn-info addOptionBtn">
		        					<span><i class="fa fa-plus"></i></span>&nbsp;Add more option
		        				</a>
		        			</div>
		        		</div>
		        	</div>
	        	</div>
	        </div>
	        <div class="row"> 
		      	<div class="col-sm-12">
		      		<div class="pull-right">
		      			<a href="javascript:" class="btn btn-sm btn-primary appendItemBtn" data-dismiss="modal" data-url="{{ route('form.edit', ['form' => $form->id]) }}" data-title="addSelect">Add Item</a>
		      		</div>
		      	</div>
		    </div>
	      </div>
	    </div>
	  </div>
	</div>

@endsection

@section('script')
	@include('admin.form.script._edit');
@endsection