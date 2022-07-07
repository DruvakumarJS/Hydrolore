
@extends('layouts.app')

@section('content')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body >

      <div class="container-body ">
       <div class="row justify-content-center">

        <div>

        <form method="get" action="{{route('show_add_user_form')}}"> 
          @csrf
          <input  class="btn-primary button-right border-radius" type="submit" name="users"  value=" Add users " >
        </form>  

      
          
          <input class="search button-right mr:10 rounded mr" type="search" name="search" id="search" placeholder="search users">


       
          <h2 class="head-h1">Users</h2>
          <label class="date"> {{date('d M ,Y')}} </label>

        </form> 
        </div>  
       </div>

       <div class="card table-responsive">

        <table class="table ">
             
         <tr>
          <th>Name</th>
          <th>Email Address</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Hub ID</th>
         </tr>
  <tbody class="alldata">
           <?php 

      if(!empty($userData) && $userData->count())
        {

        foreach ($userData as $key => $value) {
          
        
         ?>

        <tr>
          <td>{{$value->firstname}} {{$value->lastname}}</td>
          <td>{{$value->email}}</td>
          <td>{{$value->mobile}}</td>
          <td>{{$value->address}}</td>
          <td>{{$value->hub_id}}</td>
        </tr>

        <?php 
           } 
            ?>
            </tbody>

  
         <tbody id="Content" class="searchdata"> </tbody>

        </table>

        <script type="text/javascript">
          
         $('#search').on('keyup',function(){

          $value=$(this).val();
           if($value)
           {
            $('.alldata').hide();
            $('.searchdata').show();
           }
           else
           {
            $('.alldata').show();
            $('.searchdata').hide();
           }

          

          $.ajax({
             type:'get',
             url:'{{URL::to('search')}}',
             data:{'search':$value},

             success:function(data)
             {
             
              console.log(data);
              $('#Content').html(data);
             }
 
          });

         });

        </script>


        <label>Showing {{ $userData->firstItem() }} to {{ $userData->lastItem() }} of  {{$userData->total()}} results</label>
         
      {!! $userData->links() !!}

 <?php 
} 
else 
{
 ?>
              <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
                 <?php 
        }
            ?>



       </div>
        


      </div> 
</div> 
</body>
@endsection
