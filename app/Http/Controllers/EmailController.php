<?php

namespace App\Http\Controllers;

use App\Classes\GeniusMailer;
use App\Models\EmailTemplate;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Config;
use Mail;
use Mockery\Exception;
use App\Models\User;
use App\Models\Subscriber;

class EmailController extends Controller
{
    public function index()
    {
        $templates = EmailTemplate::all();
        return view('admin.email.index',compact('templates'));
    }

    public function config()
    {
        $config = Generalsetting::findOrFail(1);
        return view('admin.email.config',compact('config'));
    }

    public function edit($id)
    {
        $temp = EmailTemplate::findOrFail($id);
        return view('admin.email.edit',['temp'=>$temp]);
    }

    public function groupemail()
    {
        $config = Generalsetting::findOrFail(1);
        return view('admin.email.group',compact('config'));
    }

    public function groupemailpost(Request $request)
    {
        $config = Generalsetting::findOrFail(1);
        if($request->type == 0)
        {
        $users = User::all();
        //Sending Email To Users
        foreach($users as $user)
        {
            if($config->is_smtp == 1)
            {
                $data = [
                    'to' => $user->email,
                    'subject' => $request->subject,
                    'body' => $request->body,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);            
            }
            else
            {
               $to = $user->email;
               $subject = $request->subject;
               $msg = $request->body;
                $headers = "From: ".$config->from_name."<".$config->from_email.">";
               mail($to,$subject,$msg,$headers);
            }  
        } 
        return redirect()->route('admin-group-show')->with('success','Email Sent Successfully.');
        }
        else if($request->type == 1)
        {
        $users = User::where('is_vendor','=','2')->get();
        //Sending Email To Vendors        
        foreach($users as $user)
        {
            if($config->is_smtp == 1)
            {
                $data = [
                    'to' => $user->email,
                    'subject' => $request->subject,
                    'body' => $request->body,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);            
            }
            else
            {
               $to = $user->email;
               $subject = $request->subject;
               $msg = $request->body;
                $headers = "From: ".$config->from_name."<".$config->from_email.">";
               mail($to,$subject,$msg,$headers);
            }  
        } 
        return redirect()->route('admin-group-show')->with('success','Email Sent Successfully.');
        }
        else
        {
        $users = Subscriber::all();
        //Sending Email To Subscribers
        foreach($users as $user)
        {
            if($config->is_smtp == 1)
            {
                $data = [
                    'to' => $user->email,
                    'subject' => $request->subject,
                    'body' => $request->body,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);            
            }
            else
            {
               $to = $user->email;
               $subject = $request->subject;
               $msg = $request->body;
                $headers = "From: ".$config->from_name."<".$config->from_email.">";
               mail($to,$subject,$msg,$headers);
            }  
        }   
        return redirect()->route('admin-group-show')->with('success','Email Sent Successfully.');
        }


    }

    public function update(Request $request, $id)
    {
        $temp = EmailTemplate::findOrFail($id);
        $data = $request->all();
        $temp->update($data);
        return redirect()->route('admin-mail-index')->with('success','Email Template Updated Successfully.');
    }

    public function configupdate(Request $request)
    {
        $config = Generalsetting::findOrFail(1);
        $data = $request->all();
        $config->update($data);
        return redirect()->route('admin-mail-config')->with('success','Email Configuration Updated Successfully.');
    }




    public function sendMail()
    {
       $data = [
           'to' => "ciit104@gmail.com",
           'type' => "new_order",
           'cname' => "zee",
           'oamount' => "",
           'aname' => "",
           'aemail' => "",
       ];

       $mailer = new GeniusMailer();
       $mailer->sendAutoMail($data);

       $data = [
           'to' => "ciit104@gmail.com",
           'subject' => "new_order",
           'body' => "zee",
       ];

       $mailer = new GeniusMailer();
       $mailer->sendCustomMail($data);


       $setup = Generalsetting::find(1);

       $temp = EmailTemplate::where('email_type','=','new_order')->first();

       $data = [
           'email_body' => "body test zee", //EmailTemplate::BBCode('ShaOn','','','',$temp->email_body)
       ];

       $objDemo = new \stdClass();
       $objDemo->to = 'ciit104@gmail.com';
       $objDemo->from = $setup->from_email;
       $objDemo->title = $setup->from_name;
       $objDemo->subject = $temp->email_subject;

       try{
           Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo) {
               $message->from($objDemo->from,$objDemo->title);
               $message->to($objDemo->to);
               $message->subject($objDemo->subject);
           });
       }
       catch (\Exception $e){

       }
    }


}
