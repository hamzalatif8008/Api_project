<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['rtl','is_default','language','home','fh', 'fht', 'h', 'about', 'faq','faqs', 'contact', 'signin', 'signup', 'bgs', 'rds','hcs', 'lns', 'lm', 'vd','ston', 's', 'fl','sm', 'fpw', 'cn', 'al','bg', 'dni', 'search', 'ec','sbg','dashboard','edit','reset','logout','cp','np','rnp','chnp','ss','bs','blog','blogs','blogss','blogsss','maq','contacts','sie','spe','suf','suph','sue','sup','sucp','fpt','fpe','fpb','con','cop','coe','cor','vdn','vt','gt','dopd','doo','dol','doa','doe','dor','dopr','doc','doci','dosp','don','doem','dom','fname','cup','pp','app','size','md','amf','doct','doad','doph','dofx','dofpl','dotpl','dogpl','dolpl','doeml','doupl','supl','success','dttl','ddesc','ppr','fpr','cremove','cimage','cproduct','cedit','cquantity','cupice','cst','ccs','cpc','odetails','bdetails','ship','onow','ships','shipss','pickup','pickups','pickupss','tid','onotes','ctry','sctry','cpn','ecpn','acpn','ds','ft','review_title','video_title','enter_code','support','product_detail','hot_sale','latest_special','big_sale','featured_product','new_arrival','shop_now','week','day','hour','minute','second','view_website','wish_list','favorite_product','order_processing','order_completed','view_all','all_categories','wishlists','wish_head','others','colors','shop_name','vendor_description','linked_accounts','is_default','rtl','signinup','vendor_registration','vshop_name','owner_name','shop_number','shop_address','reg_number','message','optional','sale','welcome','user_dashboard','conv','new_conv','no_conv','affilate_bonus','current_balance','item_sold','total_earning','clear','customer','favorite_seller','messages','purchased_item','affilate_settings','affilate_withdraw','affilate_code','vendor_products','vendor_orders','withdraw','settings','sliders','shop_description','shipping_cost','social_link','vendor_apply','availability','wishlist_add','quick_view','compare','product_condition','shipping_time','watch_video','add_seller','contact_seller','phone_number','send_message','send_to','new_message','vendor_subject','vendor_message','vendor_send','platform','region','licence_type','comment_login','comment_review','product_favorite','facebook_login','google_login','digital_login','tax','comment','comments','write_comment','write_reply','edit_button','reply_button','remove','update_comment','edit_comment','edit_reply','compare_title','compare_rating','compare_vendor','compare_description','compare_available','compare_cart','no_compare','to_review','product_review','view_replies','cancel_edit','see_more','see_less'];

    public $timestamps = false;
}
