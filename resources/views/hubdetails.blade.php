@extends('layouts.app')

@section('content')

<body>
<div class="container-body">
    <div class="row justify-content-center">

        <h2 class="head-h1">Dashboard</h2>
        <label class="date"> {{date('d M ,Y')}} </label>

     <div class="row">

        <div class="col-sm-6 col-md-4 ">
        	 <div class="input-group">

                <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input">
                <span class="input-group-append">
                    <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
                
        </div>

        <div class="col-sm-6 col-md-4 ">
            
        
            <div class="input-group">

                <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input">
                <span class="input-group-append">
                    <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                        <i class="fa fa-caret-down"></i>
                    </button>
                </span>
            </div>
                
        </div>
        
        
        <div class="col-sm-6 col-md-4 ">
            <div class="input-group">

                <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input">
                
            </div>
                
        </div>
           
      </div>

   <div style="padding: 40px;">
    <div >
      <div class="row">
        <div class="col-sm-2">
             <h6 >Hub Dashboard</h6>
        </div>
        <div class="col-sm-2">
             <h6>Hub Dashboard</h6>
        </div>
       </div>
      </div>
   </div>   

 </div>    
     
</div>    





@endsection