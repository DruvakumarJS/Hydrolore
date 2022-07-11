<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Validator;
use App\Models\Userdetails;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

     public function search(Request $request){

      $output="";
      $searchdata=Userdetails::where('firstname','LIKE','%'.$request->search.'%')
                             ->orWhere('email','LIKE','%'.$request->search.'%')
                             ->orWhere('mobile','LIKE','%'.$request->search.'%')
                             ->orWhere('address','LIKE','%'.$request->search.'%')
                             ->orWhere('hub_id','LIKE','%'.$request->search.'%')->get();

      foreach ($searchdata as $searchdata) 
      
          {
            $output.=

            '<tr> 
              <td> '.$searchdata->firstname.' '.$searchdata->lastname.' </td>
              <td> '.$searchdata->email.' </td>
              <td> '.$searchdata->mobile.' </td>
              <td> '.$searchdata->address.' </td>
              <td> '.$searchdata->hub_id.' </td>

            
            
            </tr>';

          }                       

       return response($output);

    }

    public function index()
    {
        
        
        $userData=Userdetails::all();
        $count=$userData->count();

        if($count==0)
        {   
           $userData=$userData->get();
        }
        else{
           
           $userData=Userdetails::paginate(10);

        } 
        
        return view('users',compact('userData'));
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

         if($request->action == 'cancel')
       {
         return redirect()->route('show_users');
       }
       else 
       {

       $validator = Validator::make($request->all(), [
            'firstname' => 'required|min:3',
            'lastname' => 'required',
            'mobile' => 'required|min:10|unique:userdetails',
            'email' => 'required|email|unique:userdetails',
            'location' => 'required',
            'address' => 'required',
            'hub_id' => 'required',
        ]);


       if ($validator->fails()) {
            return redirect()->route('show_add_user_form')
                        ->withErrors($validator)
                        ->withInput();
        }
    
      else{

       $data = $request->all();
     
       $insert=Userdetails::create($data);

       //return to view

       $userData=Userdetails::all();

      return redirect()->route('show_users');
     }

    }

    }

    
    public function show()
    {
        return view('add_users');

    }

   
    public function edit($id)
    {
       $userdetail=Userdetails::where('id','=',$id)->get();

       return view('edit_user',compact('userdetail'));
    }

   
    public function update(Request $request, $id)
    {

       if($request->action == 'cancel')
       {
         return redirect()->route('show_users');
       }
       else if($request->action == 'Update') {

       $update=Userdetails::where('id', $id)
                             ->update(['firstname' => $request->firstname ,
                                     'lastname' => $request->lastname,
                                     'mobile' => $request->mobile,
                                     'email' => $request->email,
                                     'location' => $request->location,
                                     'address' => $request->address,
                                     'hub_id' => $request->hub_id
                                 ]);


       if($update)
       {
        
         return redirect()->route('show_users');
       }

        }

        else {
            
        }

     }

   
    public function destroy($id)
    {
         $delete=Userdetails::where('id',$id)
         ->delete();
          return $this->index();

    }
}
