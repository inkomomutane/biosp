@extends('web.backend.admin.layout.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>HTML5 Form Basic</h4>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            <b>Note!</b> Not all browsers support HTML5 type input.
        </div>
        <div class="form-group">
            <label>Text</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Select</label>
            <select class="form-control">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
        </div>
      
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <button class="btn btn-secondary" type="reset">Reset</button>
    </div>
</div>





<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Input Text</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Default Input Text</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone Number (US Format)</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control phone-number">
                    </div>
                </div>
               
                
               
               
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </div>
        </div>
     

        
    </div>
</div>
 
@endsection
