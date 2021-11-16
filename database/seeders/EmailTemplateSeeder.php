<?php

namespace Database\Seeders;
use App\Models\EmailTemplate;

use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailTemplate::create([

            'email_type'  => 'new_order',
            'email_subject'  => 'Your Order Placed Successfully',
            'email_body'  => '<p>Hello {customer_name},<br>Your order has been placed successfully</p>',
            'status'  => '1',
           
        ]);
        EmailTemplate::create([

            'email_type'  => 'new_registration',
            'email_subject'  => 'Welcome To KingCommerce',
            'email_body'  => '<p>Hello {customer_name},<br>You have successfully registered to {website_title}, We wish you will have a wonderful experience using our service.</p><p>Thank You<br></p>',
            'status'  => '1',
           
        ]);
        EmailTemplate::create([

            'email_type'  => 'vendor_accept',
            'email_subject'  => 'Your Vendor Account Activated',
            'email_body'  => '<p>Hello {customer_name},<br>Your Vendor Account Activated Successfully. Please Login to your account and build your own shop.</p><p>Thank You<br></p>',
            'status'  => '1',
           
        ]);
        EmailTemplate::create([

            'email_type'  => 'subscription_warning',
            'email_subject'  => 'Your subscrption plan will end after five days',
            'email_body'  => '<p>Hello {customer_name},<br>Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.</p><p>Thank You<br></p>',
            'status'  => '1',
           
        ]);
    }
}
