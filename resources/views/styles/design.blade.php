
@if($lang->rtl == 1)
<style type="text/css">
input, textarea, select, ul{
    direction: rtl;
}
.header-top-left-wrap li a,
.header-middle-right-wrap li a {
    border-left: 1px solid #ffffff;
    border-right: none;
}
.header-top-left-wrap li:last-child a,
.header-top-right-wrap li:last-child a,
.header-middle-right-wrap li:nth-child(3) a, .header-middle-right-wrap li:nth-child(5) a {border-left: none;}
.header-top-left-wrap li i.fa,
.header-top-right-wrap li i.fa {margin-left: 5px; margin-right: 0;}
.header-middle-right-wrap li a {
    border-color: #333333;
}
.cart-quantity {
    left: 3px;
    right: auto;
}
.compare-quantity {
    left: 3px;
    right: auto;
}
.addToMycart, .addToMycart1 {
    left: -3px;
    right: auto;
    text-align: right;
}

.addToMycart1{
    right: -132px;
    left: auto;
}

.header-search-box button {
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    margin-right: -3px;
}
.header-search-box input {
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    padding-right: 10px;
}
.header-menu-wrap li ul {
    right: 0;
    left: auto;
    top: 45px;
    text-align: right;
}
.header-bottom-left-wrap h5 {
    text-align: right;
}
.header-bottom-left-wrap .fa-bars {margin-left: 10px;}
.header-bottom-left-wrap .fa-angle-down {
    left: 30px;
    right: auto;
    top: 0;
}
.header-bottom-left-wrap ul li .fa-angle-left {
    left: 0;
    right: auto;
    top: 50%;
}
.header-bottom-left-wrap ul li img {
    height: 15px; 
    width: 12px;
    margin-left: 10px;
    margin-right: 0;
}
.header-bottom-left-wrap ul li ul {
    right: 100%;
    left: auto;
    margin-left: 0;
    margin-right: 30px;
}
.subscribe-form input,
.subscribe-form button {
    padding-right:15px;
    padding-left: 0;
}
.subscribe-form button {
    margin-left: -0;
    margin-right: -35px;
    z-index: 9;
    position: relative;
}
.single-footer-wrap li span {
    position: absolute;
    right: 50px;
    left: 0;
    top: 10px;
    line-height: 1.4;
}
.single-footer-wrap.contact li span {right: 30px; left: 0;}
.single-footer-wrap.information li:hover {margin-right: 10px; margin-left: 0;}
.footer-social-links {text-align: left;}
.footer-copyright-area {text-align: right;}
.mean-container a.meanmenu-reveal {
    left: auto !important;
    right: 0 !important;
}
.product-filter-option ul li ul li i.fa-angle-left {
    margin-left: 10px;
    margin-right: 3px;
}
.product-filter-option ul li span i.fa {
    float: right;
    margin-left: 12px;
    margin-right: 0;
}

.styled-faq .panel .panel-heading h4 a span {margin-left: 0;margin-right: 25px;}

.styled-faq .panel .panel-heading h4 a i.fa {

    right: 15px;
    left: auto;
    top: 15px;
}
.news-list-meta {
    right: 0;
    left: auto;
}
.slicknav_btn {float: left;}

.breadcrumb-box{direction: rtl;}
.breadcrumb-box a:after{content: "\f104"; margin-right: 7px;}
.product-headerInfo__title {
    font-size: 16px;
    font-weight: 700;
    margin-right: 0;
    margin-left: 10px;
}
.header-top-left-wrap li:last-child a,
.header-middle-right-wrap li:nth-child(3) a,
.header-middle-right-wrap li:nth-child(4) a,
.header-middle-right-wrap li:nth-child(5) a,
.header-middle-right-wrap li:nth-child(6) a {border-left: none;}
.service-icon-text {
    direction: rtl;
    margin-left: 0;
    width: 72%;
}
.service-icon-img {
left: auto;
right: 0;
    }
.contact-info {
    padding-right: 40px;
}
.contact-info i {
    left: auto;
    right: 0;
}
    @media only screen and (max-width: 767px) { 
        .header-middle-right-wrap li a { 
            border-left: none;
    }

    .footer-social-links, .footer-copyright-area {text-align: center;}
    .footer-social-links
    {
        margin-bottom: 5px;
    }
.slicknav_menu {
    display: inline-block;
    background-color: #f3f3f3;
    padding: 0;
    position: absolute;
    left: 0 !important;
    z-index: 999;
    width: 100%;
    right: auto;
}
.slicknav_btn {
    border-radius: 0;
    background: transparent;
    padding: 7px;
    text-shadow: none;
    z-index: 99;
    float: left;
}
.mean-container {
    position: relative;
}
.mean-container .mean-bar {
    background: transparent;
    padding: 0;
    position: absolute;
    z-index: 999;
    width: 90%;
    top: 0;
    right: 0;
    left: auto;
}
.mean-container a.meanmenu-reveal {
    background: #0163d2;
    padding: 12px;
    top: -1px;
    left: auto !important;
    right: 0 !important;
}
.mean-container .mean-nav {
    overflow-y: hidden;
}
.mean-container .mean-nav {
    margin-top: 42px;
}
.mean-container .mean-nav ul li a .fa-angle-left{
    display: none;
    }
.slicknav_arrow {
    float: left;
}
.header-search-box button {
    margin-left: 7px;
    margin-top: 15px;
}
.header-search-box input {
    float: right;
}
.header-searched-item-list-wrap {
    left: 20%;
}
.header-search-box input {
    width: 79%;
    }
}
.header-top-right-wrap ul {
    direction: ltr;
}
.cart-close {
    right: auto;
    left: 0;
}
#comments {
    text-align: right;
}
.replay-btn {

    left: auto;
    right: 15px;
    bottom: 0;
}
.replay-btn-edit {
    left: auto;
    right: 75px;
    bottom: 0;
}
.replay-btn-delete {
    left: auto;
    right: 156px;
    bottom: 0;
}

.replay-btn-edit1{
    left: auto;
    right: 75px;
    bottom: 0;
}
.replay-btn-delete1 {
    left: auto;
    right: 156px;
    bottom: 0;
}
.replay-btn-edit2{
    left: auto;
    right: 15px;
    bottom: 0;
}
.replay-btn-delete2 {
    left: auto;
    right: 156px;
    bottom: 0;
}
.subreplay-btn {
    left: auto;
    right: 15px;
    bottom: 0;
}
.blog-comments-area h3
{
    direction: rtl;
}
.header-menu-wrap li {
    margin-right: 0;
    margin-left: 25px;
}
.mainmenu li a:hover {padding-left: 0px; padding-right: 10px;}
.mainmenu li a i.fa {
    float: left;
    padding-top: 14px;
}
.mainmenu li.megamenu ul {
    left: 0;
    right: 107.5%;
}
.mainmenu li.megamenu ul ul {
    left: 0;
    right: auto;
}
.mainmenu li.megamenu ul ul ul{
    left: 0;
    top: 0;
    right: 106%;
    }
.single-megamanu-area h5 {text-align: right;}
.mainmenu li ul li {
    text-align: right;
}
.view-replay-btn {
    left: auto;
    right: 209px;
}
</style>
@endif

<style type="text/css">

            #cover {
                background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }
            .featured_loader {
                background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;
                position: absolute;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }
            .gallery-overlay {
                background-color: {{$gs->colors == null ? '#000000':'#000000'}};
            }
            .single-news-list::before {

                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .overlay::after {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .scrollup {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .header-middle-right-wrap i.fa-cart-plus, .circle-li i, .fa-exchange i{
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .header-middle-right-wrap li.sell-btn{
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            span.hovertip {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            span.hovertip:hover {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            span.wish-number {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .tooltip.top .tooltip-inner {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            span.sell-btn{
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .slider-handle{
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .slider-selection{
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            input.price-input{
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            input.price-search-btn{
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .product-filter-content.tags a{
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .tooltip.top .tooltip-arrow{
                border-top-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-filter-content a:hover {
                background-color: #ffffff;
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .product-filter-option .form-group .fa-minus{
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }

            .header-middle-right-wrap li a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .header-middle-mid-wrap a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .header-search-box.mobile {
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .black-btn {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .black-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
            }
            .slicknav_menu .slicknav_icon {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .mean-container a.meanmenu-reveal {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
             .mean-container .mean-nav {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
         
            .client-logo-wrap .owl-prev:hover,
            .client-logo-wrap .owl-next:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .review-carousel-wrap .owl-prev:hover,
            .review-carousel-wrap .owl-next:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .single-footer-wrap.information li:hover a {color: {{$gs->colors == null ? '#0163d2':$gs->colors}};}
            .single-footer-wrap.contact li i.fa {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .subscribe-newsletter-text-area {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-type-tab .nav-tabs>li.active>a,
            .product-type-tab .nav-tabs>li.active>a:focus,
            .product-type-tab .nav-tabs>li.active>a:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-tag span {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-tag span:after {
                border-left: 10px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-carousel .owl-prev:hover,
            .featured-carousel .owl-next:hover {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .single-product-area:hover {border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};}
            .addToCart-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .addToCart-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .blog-comments-msg-area button {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .blog-comments-msg-area button:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .styled-faq .panel-title {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}}; 
            }
            .comments-form input[type="submit"], 
            .comments-form button[type="submit"]  {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .comments-form input[type="submit"]:hover{
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .tab-list li.active a {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .tab-list li.active a:after {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .btn-review {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .btn-review:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .product-details-wrapper .productDetails-addCart-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-details-wrapper .productDetails-addCart-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-checkOut-wrap .form-group .order-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-checkOut-wrap .form-group .order-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .login-tab .nav-tabs>li.active>a, 
            .login-tab .nav-tabs>li.active>a:focus, 
            .login-tab .nav-tabs>li.active>a:hover {
                border-top: 5px solid {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
            }
            .login-form button {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .forgot-area {margin-top: 10px;}
            .forgot-area a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .pagination>.disabled>a, 
            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .pagination>.disabled>a, 
            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .pagination>.active>a, 
            .pagination>.active>a:focus, 
            .pagination>.active>a:hover, 
            .pagination>.active>span, 
            .pagination>.active>span:focus, 
            .pagination>.active>span:hover {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .pagination>li>a, .pagination>li>span {
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .pagination>li>a, .pagination>li>span {
                color:{{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .subscribe-newsletter-text-area:before {
                border-left: 29px solid {{$gs->colors == null ? '#024a9b':$gs->colors}};
            }
            .subscribe-newsletter-text-area:after {
                border-left: 29px solid {{$gs->colors == null ? '#024a9b':$gs->colors}};
            }
            .news-list-meta {
                background-color: {{$gs->colors == null ? '#0163D3':$gs->colors}}; 
            }
            .single-news-list:hover .news-list-button {color: {{$gs->colors == null ? '#0163D3':$gs->colors}};}
            .header-top-area {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}}; 

            }
            .header-top-right-wrap li ul {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-bottom-left-wrap {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-bottom-left-wrap ul {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-menu-wrap li ul li:hover {background: {{$gs->colors == null ? '#0363D1':$gs->colors}};}
            .slicknav_nav {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .service-icon-img {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .count-down-button .btn {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .cart-quantity {
                background: {{$gs->colors == null ? '#0F5EC2':$gs->colors}};
            }
            .compare-quantity {
                background: {{$gs->colors == null ? '#0F5EC2':$gs->colors}};
            }
            .product-price {
                color: {{$gs->colors == null ? '#0063d1':$gs->colors}};
            }
            .single-product-area::before {
                background: {{$gs->colors == null ? '#0063d1':$gs->colors}};
            }
            .product-hover-top span:hover {color: {{$gs->colors == null ? '#0363D1':$gs->colors}};}
            .mean-container .mean-nav ul li a.mean-expand:hover {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .subscribePreloader__text {
                background: {{$gs->colors == null ? '#0163d2c7':$gs->colors.'c7'}};
            }
            .headerInfo__btn {
                color: {{$gs->colors == null ? 'green':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? 'green':$gs->colors}};
            }
            .headerInfo__btn.colored {background:{{$gs->colors == null ? 'green':$gs->colors}}; color: #ffffff;}
            .headerInfo__btn:hover {background:{{$gs->colors == null ? 'green':$gs->colors}}; color: #ffffff;}

            .replay-form button[type="submit"] {
                background-color: {{$gs->colors == null ? '#0363D1':$gs->colors}}; color: #ffffff;;
            }
            .black-btn:hover {
                border: 2px solid {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
            }
            .update-shopping-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .shopping-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .update-shopping-btn:hover, 
            .shopping-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .header-menu-wrap a{

                color: #000000;
            }

            .header-menu-wrap li a.active{
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .mainmenu li {
                border-bottom: 1px dotted {{$gs->colors == null ? '#000000':$gs->colors}};
            }
            .mainmenu li a {
                color: {{$gs->colors == null ? '#000000':$gs->colors}};
            }
            .single-megamanu-area h5 {
                color: {{$gs->colors == null ? '#000000':$gs->colors}};
            }

            .header-search-box button {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .compare-cartBtn,.clear-btn {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .homepage-carousel-area .owl-dots div.active {
                border-color: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            #comments .reply  button[type="submit"]{
                background-color: {{$gs->colors == null ? '#0363D1':$gs->colors}};
                color: #ffffff;
            }
            .replay-form button[type="button"] {
                background-color: {{$gs->colors == null ? '#0363D1':$gs->colors}};
                color: #ffffff;
                padding: 8px 20px;
                font-size: 12px;
                font-weight: 600;
                border-radius: 0;
                -webkit-transition: all 400ms ease-in;
                transition: all 400ms ease-in;
            }
            .blog__meta {
                background: {{$gs->colors == null ? '#eb600b':$gs->colors}};
            }

/*            .mainmenu {
                background-color: {{$gs->colors == null ? '#fff':$gs->colors}};
            }*/
/*            .mainmenu li ul {
                background-color: {{$gs->colors == null ? '#fff':$gs->colors}};
            }
            .mainmenu li.megamenu ul ul ul{
                background-color: {{$gs->colors == null ? '#fff':$gs->colors}};
                }*/
            @media only screen and (max-width: 767px) {
                .header-middle-right-wrap ul li a i{
                    background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                }
            }
</style>