<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Auth;
use carbon\carbon;

class UniversalController extends Controller
{
    
    public function expire()
    {
        $user = Auth::user()->id;
        $alumni = User::findOrFail($user);
       return view('Expire.expire',compact('alumni'));

    }
    public function payment(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            "bkash_number"=>"required|max:50|min:3",
            'transactionId' =>"required",
        ]);

         $payment                = new Transaction();
         $payment->plan_id       = $request->plan_id;
         $payment->bkash_number  = $request->bkash_number;
         $payment->transactionId = $request->transactionId;
         $payment->amount        = $request->amount;
         $payment->user_id       = auth::user()->id;
         $payment->studentId     = auth::user()->student_id;
         $payment->save();
         //return redirect()->back();
         return view('Expire.pending');
    }
    public function pending()
    {
        
       return view('Expire.pending');

    }
    

    
     public function approval()
    {
       $approvals =  Transaction::where('status', 0)->get();
       return view('Expire.approval', compact('approvals'));

    }
    
    

    public function approvalView($id)
    {
       $approval =  Transaction::find($id);
       return view('Expire.approval-view', compact('approval'));

    }
    
    
    public function approvalUpdate(Request $request, $id)
    {
     
       $approval         =  Transaction::find($id);
       $approval->status = $request->status;
       $approval->save();
      
       $uid = $approval->user_id;
      
       
       $day = carbon::today()->addDays(365)->format('Y-m-d');
       
       $user         = User::find($uid);
       $user->expire = $day;
       $user->save();
       
     
       return redirect()->back();

    }
    
    
    
    
    


}
