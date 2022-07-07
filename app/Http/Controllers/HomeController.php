<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickets;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date=date('Y-m-d');

    
       
        $tickets=tickets::where('created_at','LIKE','%'.$date.'%');

    
        $ticket_array=$tickets->count();

        if($ticket_array==0)
        {   
           $tickets=$tickets->get();
        }
        else{
           
           $tickets=$tickets->paginate(5);

        } 
       

         return view('home',compact('tickets'));
       }

    public function show()
    {

        print_r($date);exit();
       
    }
}
