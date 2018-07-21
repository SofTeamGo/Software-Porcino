@extends('welcome')
@section('content')
<section class="section-container">
	<div class="container-fluid">
		<h5 class="mt-0">Forms</h5>
		<p class="mb-4">Bootstrap provides several form control styles, layout options, and custom components for creating a wide variety of forms.</p>
		<div class="cardbox">
			<div class="cardbox-body">
			    <form method="get" action="/">
			        <fieldset>
			            <div class="form-group row">
				            <label class="col-lg-2 col-form-label">With help</label>
				            <div class="col-lg-10">
				                <input class="form-control" type="text"><span class="form-text text-muted">A block of help text that breaks onto a new line and may extend beyond one line.</span>
				            </div>
			            </div>
			        </fieldset>
				    <fieldset>
				        <div class="form-group row">
				            <label class="col-lg-2 col-form-label" for="input-id-1">Label focus</label>
				            <div class="col-lg-10">
				                <input class="form-control" id="input-id-1" type="text">
				            </div>
				        </div>
				    </fieldset>
			        <fieldset>
			            <div class="form-group row">
			                <label class="col-lg-2 col-form-label">Password</label>
			                <div class="col-lg-10">
			                    <input class="form-control" type="password" name="password">
			                </div>
			            </div>
			        </fieldset>
			        <fieldset>
			            <div class="form-group row">
			                <label class="col-lg-2 col-form-label">Placeholder</label>
			                <div class="col-lg-10">
			                    <input class="form-control" type="text" placeholder="placeholder">
			                </div>
			            </div>
			        </fieldset>
			        <fieldset>
			           <div class="float-right">
                           <button class="btn btn-info" type="submit">Register</button>
                       </div>
                    </fieldset>
			    </form>
			    <example-form></example-form>
			</div>
		</div>
	</div>
</section>
@endsection