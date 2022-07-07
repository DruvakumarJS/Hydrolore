@extends('layouts.app')

@section('content')

<body >
  
  <div class="container-body">
    
      <div >

        <form method="get" action="{{route('show_users')}}">
          @csrf
         <input  class="btn-primary button-right rounded-pill" type="submit" name="users" value=" view users " >

       </form>

         <h2 class="head-h1">Add Users</h2>
         <label class="date">{{date('d M ,Y')}} </label>


      </div>

    <form method="post" action="{{route('create_new_users')}}">
      @csrf

      <div class="form-body">
        
        <div class="row mb-2">
            
          <div class="col-md-3">
            <label for="firstname" class="label-title">First name </label>
            <input type="text" id="firstname" name="firstname" class="form-input"  required="required" value="{{ old('firstname') }}" />
              @error('firstname')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
          </div>

          <div class="col-md-3">
            <label for="lastname" class="label-title">Last name </label>
            <input type="text" id="lastname" name="lastname" class="form-input"  required="required" value="{{ old('lastname') }}" />
             @error('lastname')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
          </div>  

        </div>


        <div class="row mb-2">
            
          <div class="col-md-3">
            <label for="mobile" class="label-title">Mobile</label>
            <input type="text" id="mobile" name="mobile" class="form-input"  required="required" value="{{ old('mobile') }}"/>
             @error('mobile')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
          </div>

          <div class="col-md-3">
            <label for="email" class="label-title">Email ID </label>
            <input type="text" id="email" name="email" class="form-input"  required="required" value="{{ old('email') }}"/>
             @error('email')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
          </div>  

        </div>


        <div class="row mb-2">  
          <div class="col-md-6">
            <label for="location" class="label-title">Location</label>
            <input type="text" id="location" name="location" class="form-input"  required="required" value="{{ old('location') }}"/>
             @error('location')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
             
          </div>
        </div>

        <div class="row mb-2">  
          <div class="col-md-6">
            <label for="address" class="label-title">Address</label>
            <input type="text" id="address" name="address" class="form-input"  required="required" value="{{ old('address') }}"/>
             @error('address')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
             
          </div>
        </div>

        <div class="row mb-3">  
          <div class="col-md-6">
            <label for="hubid" class="label-title">Hub ID</label>
            <input type="text" id="hub_id" name="hub_id" class="form-input"  required="required" value="{{ old('hub_id') }}"/>
             @error('hubid')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
             
          </div>
        </div>

        <div>
          
          <div> 
            <input class=" btn-primary rounded-pill " type="submit" name="create " value=" Create user "> 
            <input class="btn-transaparent rounded-pill" disabled type="button" name="cancel" value="  Cancel  "> 
          </div>
         

        </div>


      </div>
         
      
    </form> 

  </div>
 
</body>


@endsection