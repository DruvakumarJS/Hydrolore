@extends('layouts.app')

@section('content')

<body>
<div class="container-body">
    <div class="row justify-content-center">
 
       
        
           <form method="post" action="{{route('show_users')}}">
                @csrf        

            <h2 class="head-h1">Tickets</h2>
            <label class="date"> {{date('d M ,Y')}} </label>


            <div class="dropdown">
 

<div class="dropdown">
  <button class="dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    {{date('Y-m-d')}}
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Last Day</a></li>
    <li><a class="dropdown-item" href="#">Last week</a></li>
    <li><a class="dropdown-item" href="#">Last month</a></li>
  </ul>
</div>


 <button class="dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   status
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="status">
    <li><a class="dropdown-item"  href="#"></a></li>
    <li><a class="dropdown-item"  href="#">Penging</a></li>
    <li><a class="dropdown-item" href="#">Open</a></li>
    <li><a class="dropdown-item" href="#">Closed</a></li>
  </ul>
</div>


              <label style="float:right; margin-right: 10px;"> Status  </label>

          

        </form>

               
    </div>  

    <div class="card table-responsive" >
     <table class="table" >
        <tr >
          <th>Ticket ID</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Updated</th>
          <th>   </th>
         </tr>

         <?php

         if(!empty($tickets) && $tickets->count())
         {

         foreach ($tickets as $key => $value) {
            $statusvalue=$value->status;

            if($statusvalue=='0'){$data='pending';$colourcode='#e6b00e';}
            else if($statusvalue=='1'){$data='open';$colourcode='#e86413';}
            else if($statusvalue=='2'){$data='closed';$colourcode='#0ee6c9';}
            else {$data='undefined';$colourcode='#FF0000';}
              
        
          ?>

          <tr>
          <td>{{$value->ticket_id}}</td>
          <td>{{$value->subject}}</td>
          <td> <label class="curved-text" style="background-color: {{$colourcode}}">{{$data}}</label></td>
          <td>{{$value->updated_at}}</td>
          <td><label class="curved-text">view</label></td>
            
        </tr>

        <?php } ?>

        <script type="text/javascript">
          
          
        </script>
     </table>    
          <label>Showing {{ $tickets->firstItem() }} to {{ $tickets->lastItem() }} of {{$tickets->total()}} results</label>
         
          {!! $tickets->links() !!}

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


@endsection