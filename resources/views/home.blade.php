@extends('layouts.app')

@section('content')
<body>
<div class="container-body">
    <div class="row justify-content-center">
 
         <form method="post" action="{{route('show_users')}}">
                @csrf        

            <h2 class="head-h1">Dashboard</h2>
            <label class="date"> {{date('d M ,Y')}} </label>

              
            <input style="float:right; border-radius: 7px;" type="text" placeholder="  search Hub ID" name="search">

        </form>
         
    <div class="row mt" >

        <div class="col-sm-6 col-md-4 ">
             <div class="card ">
                
                <div class="card-body">
                    <img src="{{ asset('images/hub1.png') }}" alt="hub" style="width:20px;height: 20px;">
                    <h2 class="card-text card-text-color" style="float:right;">30</h2>

                    </div>
                    <h4 class="card-text-black" style="float:left;">HUB</h4>
                    <label class="card-text-label">Total number of hub</label>
                </div>
            <!--</div>-->
        </div>

         <div class="col-sm-6 col-md-4">
            <div class="card ">
                
                    <div class="card-body">
                        <img src="{{ asset('images/hub1.png') }}" alt="hub" style="width:20px;height: 20px; ">
                        <h2 class="card-text card-text-color" style="float:right;">122</h2>

                    </div>
                    <h4 class="card-text-black" style="float:left;">POD</h4>
                    <label class="card-text-label">Total number of POD</label>
                </div>
            <!--</div>-->
        </div>

         <div class="col-sm-6 col-md-4">
            <div class="card border-white">
               
                    <div class="card-body">
                        <img src="{{ asset('images/hub1.png') }}" alt="hub" style="width:20px;height: 20px;">
                        <h2 class="card-text card-text-color" style="float:right;">40</h2>

                    </div>
                    <h4 class="card-text-black" style="float:left;">Ticket</h4>
                    <label class="card-text-label">Today's new tickets</label>
                </div>
            <!--</div>-->
        </div>
            


    <div>

       <label class="header-lab">Tickets</label>
       <label style="float: right;margin-top: 10px;margin-right: 10px;">Today</label>
       <div>
           
     <div class="card table-responsive" >
       <table class="table" >
             
         <tr >
          <th>Ticket ID</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Updated</th>
          <th></th>
         </tr>

         <?php

         if(!empty($tickets) && $tickets->count())
         {

         foreach ($tickets as $key => $value) {
              
          $statusvalue=$value->status;

            if($statusvalue=='0'){$data='New';$colourcode='#e6b00e';}
            else if($statusvalue=='1'){$data='open';$colourcode='#e86413';}
            else if($statusvalue=='2'){$data='closed';$colourcode='#0ee6c9';}
            else {$data='undefined';$colourcode='#FF0000';}

          ?>

          <tr>
          <td>{{$value->ticket_id}}</td>
          <td>{{$value->subject}}</td>
           <td> <label class="curved-text">{{$data}}</label></td>
         <!--  <td> <label class="curved-text">{{($value->status==0) ? ' New ':' old '}}</label></td> -->
          <td>{{$value->updated_at}}</td>
          <td><label class="curved-text">view</label></td>
        </tr>

        <?php } ?>
  



        </table>

         <label>Showing {{ $tickets->firstItem() }} to {{ $tickets->lastItem() }} of  {{$tickets->total()}} results</label>
         
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

      

  </div>
</div>

</div>
      
   </body>    


@endsection
