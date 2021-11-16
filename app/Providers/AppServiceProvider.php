<?php

namespace App\Providers;

 
use App\Models\Advertise;
use App\Models\Blog;
use App\Models\Category;
use App\Classes\GeniusMailer;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Language;
use App\Models\Page;
use App\Models\Pagesetting;
use App\Models\Product;
use App\Models\Seotool;
use App\Models\Sociallink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);

        $smtpdata = Generalsetting::find(1);
        Config::set('mail.port', $smtpdata->smtp_port);
        Config::set('mail.host', $smtpdata->smtp_host);
        Config::set('mail.username', $smtpdata->smtp_user);
        Config::set('mail.password', $smtpdata->smtp_pass);
   
        $date_users = User::all();
        foreach ($date_users as  $user) {
            if($user->is_vendor == 2)
            {
                $lastday = $user->date;
                $today = Carbon::now()->format('Y-m-d');
                $newday = strtotime($today);
                $secs = strtotime($lastday)-$newday;
                $days = $secs / 86400;
                if($days <= 5)
                {
                  if($user->mail_sent == 1)
                  {
                    $settings = Generalsetting::find(1);
                    if($settings->is_smtp == 1)
                    {
                        $data = [
                            'to' => $user->email,
                            'type' => "subscription_warning",
                            'cname' => $user->name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                    else
                    {
                    $headers = "From: ".$settings->from_name."<".$settings->from_email.">";
                    mail($user->email,'Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.Thank You.',$headers);
                    }
                    $user->mail_sent = 0;
                    $user->update();                    
                  }

                }
                if($today > $lastday)
                {
                    $user->is_vendor = 1;
                    $user->update();
                }
            }
        }

        view()->composer('*',function($settings){
            $settings->with('gs', Generalsetting::find(1));
            $settings->with('sl', Sociallink::find(1));
            $settings->with('seo', Seotool::find(1));
            $settings->with('ps', Pagesetting::find(1));
            $settings->with('nav_shop', User::where('nav_shop','=',1)->take(12)->get());
            $settings->with('nav_brand', User::where('brand','=',1)->take(12)->get());
            $settings->with('fastiv_product', Product::where('festival','=',1)->take(12)->where('status','=',1)->get());
            
            if (Session::has('language')) 
            {
                $settings->with('lang', Language::find(Session::get('language')));
            }
            else
            {
                $settings->with('lang', Language::where('is_default','=',1)->first());
            }
            if (!Session::has('popup')) 
            {
                $settings->with('visited', 1);
            }
            Session::put('popup' , 1);
            if (Session::has('currency')) 
            {
                $settings->with('curr', Currency::find(Session::get('currency')));
            }
            else
            {
                $settings->with('curr', Currency::where('is_default','=',1)->first());
            }
            $settings->with('categories', Category::where('status','=',1)->get());

            if(Category::where('status','=',1)->count() > 10)
            {
                $settings->with('catgories', Category::where('status','=',1)->skip(10)->take(count(Category::all()) - 10)->get());
            }
            ///////////start country  state city wise 
            $country = User::select('country')->distinct()->whereNotNull('country')->get();
            foreach($country as $ct){
                $sts = User::select('state')->distinct()->whereNotNull('state')->where('country',$ct->country)->get();
                if($sts){
                foreach($sts as $st){
                        $cit = User::select('city')->distinct()->whereNotNull('city')->where('state',$st->state)->get();
                        if($cit){
                            $st->city= $cit;
                        }
                        } 
                $ct->state = $sts;
                }
            }
            ///////////end country  state city wise  
            $settings->with('country',$country);
            $settings->with('lblogs', Blog::orderBy('created_at', 'desc')->limit(4)->get());
            $settings->with('pages', Page::orderBy('pos','asc')->get());
        });


    } 
}
