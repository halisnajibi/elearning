<!DOCTYPE html>

<html lang="en">

<head>
 <meta charset="utf-8">
 <link href="<?= base_url('vendor/temp/') ?>dist/images/logo.svg" rel="shortcut icon">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
 <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
 <meta name="author" content="LEFT4CODE">
 <title>ELEARNING</title>
 <!-- BEGIN: CSS Assets-->
 <link rel="stylesheet" href="<?= base_url('vendor/temp/') ?>dist/css/app.css" />
 <!-- css me -->
 <link rel="stylesheet" href="<?= base_url('vendor/temp/') ?>dist/css/me.css" />

 <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
 <!-- BEGIN: Mobile Menu -->
 <div class="mobile-menu md:hidden">
  <div class="mobile-menu-bar">
   <a href="" class="flex mr-auto">
    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= base_url('vendor/temp/') ?>dist/images/logo.svg">
   </a>
   <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
  </div>
  <ul class="border-t border-theme-24 py-5 hidden">
   <li>
    <a href="index.html" class="menu menu--active">
     <div class="menu__icon"> <i data-feather="home"></i> </div>
     <div class="menu__title"> Dashboard </div>
    </a>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="box"></i> </div>
     <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="index.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Side Menu </div>
      </a>
     </li>
     <li>
      <a href="simple-menu-dashboard.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Simple Menu </div>
      </a>
     </li>
     <li>
      <a href="top-menu-dashboard.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Top Menu </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="side-menu-inbox.html" class="menu">
     <div class="menu__icon"> <i data-feather="inbox"></i> </div>
     <div class="menu__title"> Inbox </div>
    </a>
   </li>
   <li>
    <a href="side-menu-file-manager.html" class="menu">
     <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
     <div class="menu__title"> File Manager </div>
    </a>
   </li>
   <li>
    <a href="side-menu-point-of-sale.html" class="menu">
     <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
     <div class="menu__title"> Point of Sale </div>
    </a>
   </li>
   <li>
    <a href="side-menu-chat.html" class="menu">
     <div class="menu__icon"> <i data-feather="message-square"></i> </div>
     <div class="menu__title"> Chat </div>
    </a>
   </li>
   <li>
    <a href="side-menu-post.html" class="menu">
     <div class="menu__icon"> <i data-feather="file-text"></i> </div>
     <div class="menu__title"> Post </div>
    </a>
   </li>
   <li class="menu__devider my-6"></li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="edit"></i> </div>
     <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="side-menu-crud-data-list.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Data List </div>
      </a>
     </li>
     <li>
      <a href="side-menu-crud-form.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Form </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="users"></i> </div>
     <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="side-menu-users-layout-1.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Layout 1 </div>
      </a>
     </li>
     <li>
      <a href="side-menu-users-layout-2.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Layout 2 </div>
      </a>
     </li>
     <li>
      <a href="side-menu-users-layout-3.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Layout 3 </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="trello"></i> </div>
     <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="side-menu-profile-overview-1.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Overview 1 </div>
      </a>
     </li>
     <li>
      <a href="side-menu-profile-overview-2.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Overview 2 </div>
      </a>
     </li>
     <li>
      <a href="side-menu-profile-overview-3.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Overview 3 </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="layout"></i> </div>
     <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-wizard-layout-1.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 1</div>
        </a>
       </li>
       <li>
        <a href="side-menu-wizard-layout-2.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 2</div>
        </a>
       </li>
       <li>
        <a href="side-menu-wizard-layout-3.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 3</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-blog-layout-1.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 1</div>
        </a>
       </li>
       <li>
        <a href="side-menu-blog-layout-2.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 2</div>
        </a>
       </li>
       <li>
        <a href="side-menu-blog-layout-3.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 3</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-pricing-layout-1.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 1</div>
        </a>
       </li>
       <li>
        <a href="side-menu-pricing-layout-2.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 2</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-invoice-layout-1.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 1</div>
        </a>
       </li>
       <li>
        <a href="side-menu-invoice-layout-2.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 2</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-faq-layout-1.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 1</div>
        </a>
       </li>
       <li>
        <a href="side-menu-faq-layout-2.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 2</div>
        </a>
       </li>
       <li>
        <a href="side-menu-faq-layout-3.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Layout 3</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="login-login.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Login </div>
      </a>
     </li>
     <li>
      <a href="login-register.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Register </div>
      </a>
     </li>
     <li>
      <a href="main-error-page.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Error Page </div>
      </a>
     </li>
     <li>
      <a href="side-menu-update-profile.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Update profile </div>
      </a>
     </li>
     <li>
      <a href="side-menu-change-password.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Change Password </div>
      </a>
     </li>
    </ul>
   </li>
   <li class="menu__devider my-6"></li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="inbox"></i> </div>
     <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="javascript:;" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Grid <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
      </a>
      <ul class="">
       <li>
        <a href="side-menu-regular-table.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Regular Table</div>
        </a>
       </li>
       <li>
        <a href="side-menu-datatable.html" class="menu">
         <div class="menu__icon"> <i data-feather="zap"></i> </div>
         <div class="menu__title">Datatable</div>
        </a>
       </li>
      </ul>
     </li>
     <li>
      <a href="side-menu-accordion.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Accordion </div>
      </a>
     </li>
     <li>
      <a href="side-menu-button.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Button </div>
      </a>
     </li>
     <li>
      <a href="side-menu-modal.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Modal </div>
      </a>
     </li>
     <li>
      <a href="side-menu-alert.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Alert </div>
      </a>
     </li>
     <li>
      <a href="side-menu-progress-bar.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Progress Bar </div>
      </a>
     </li>
     <li>
      <a href="side-menu-tooltip.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Tooltip </div>
      </a>
     </li>
     <li>
      <a href="side-menu-dropdown.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Dropdown </div>
      </a>
     </li>
     <li>
      <a href="side-menu-toast.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Toast </div>
      </a>
     </li>
     <li>
      <a href="side-menu-typography.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Typography </div>
      </a>
     </li>
     <li>
      <a href="side-menu-icon.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Icon </div>
      </a>
     </li>
     <li>
      <a href="side-menu-loading-icon.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Loading Icon </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
     <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="side-menu-regular-form.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Regular Form </div>
      </a>
     </li>
     <li>
      <a href="side-menu-datepicker.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Datepicker </div>
      </a>
     </li>
     <li>
      <a href="side-menu-select2.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Select2 </div>
      </a>
     </li>
     <li>
      <a href="side-menu-file-upload.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> File Upload </div>
      </a>
     </li>
     <li>
      <a href="side-menu-wysiwyg-editor.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Wysiwyg Editor </div>
      </a>
     </li>
     <li>
      <a href="side-menu-validation.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Validation </div>
      </a>
     </li>
    </ul>
   </li>
   <li>
    <a href="javascript:;" class="menu">
     <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
     <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
    </a>
    <ul class="">
     <li>
      <a href="side-menu-chart.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Chart </div>
      </a>
     </li>
     <li>
      <a href="side-menu-slider.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Slider </div>
      </a>
     </li>
     <li>
      <a href="side-menu-image-zoom.html" class="menu">
       <div class="menu__icon"> <i data-feather="activity"></i> </div>
       <div class="menu__title"> Image Zoom </div>
      </a>
     </li>
    </ul>
   </li>
  </ul>
 </div>
 <!-- END: Mobile Menu -->
 <!-- BEGIN: Top Bar -->
 <div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
  <div class="top-bar-boxed flex items-center">
   <!-- BEGIN: Logo -->
   <a href="" class="-intro-x hidden md:flex">
    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= base_url('vendor/temp/') ?>dist/images/logo.svg">
    <span class="text-white text-lg ml-3"> E-<span class="font-medium">learning</span> </span>
   </a>
   <!-- END: Logo -->
   <!-- BEGIN: Breadcrumb -->
   <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> <a href="" class=""><?= $uri = $this->uri->segment(1) ?></a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active"><?php if ($uri = $this->uri->segment(2) == "") {
                                                                                                                                                                                                                                 echo 'dasboard';
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                 echo $this->uri->segment(2);
                                                                                                                                                                                                                                }  ?></a> </div>
   <!-- END: Breadcrumb -->
   <!-- BEGIN: Search -->
   <!-- <div class="intro-x relative mr-3 sm:mr-6">
    <div class="search hidden sm:block">
     <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
     <i data-feather="search" class="search__icon"></i>
    </div>
    <a class="notification notification--light sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
    <div class="search-result">
     <div class="search-result__content">
      <div class="search-result__content__title">Pages</div>
      <div class="mb-5">
       <a href="" class="flex items-center">
        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
        <div class="ml-3">Mail Settings</div>
       </a>
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
        <div class="ml-3">Users & Permissions</div>
       </a>
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
        <div class="ml-3">Transactions Report</div>
       </a>
      </div>
      <div class="search-result__content__title">Users</div>
      <div class="mb-5">
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 image-fit">
         <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
        </div>
        <div class="ml-3">Denzel Washington</div>
        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
       </a>
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 image-fit">
         <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
        </div>
        <div class="ml-3">Robert De Niro</div>
        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">robertdeniro@left4code.com</div>
       </a>
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 image-fit">
         <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
        </div>
        <div class="ml-3">John Travolta</div>
        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johntravolta@left4code.com</div>
       </a>
       <a href="" class="flex items-center mt-2">
        <div class="w-8 h-8 image-fit">
         <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
        </div>
        <div class="ml-3">Tom Cruise</div>
        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">tomcruise@left4code.com</div>
       </a>
      </div>
      <div class="search-result__content__title">Products</div>
      <a href="" class="flex items-center mt-2">
       <div class="w-8 h-8 image-fit">
        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-7.jpg">
       </div>
       <div class="ml-3">Dell XPS 13</div>
       <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">PC &amp; Laptop</div>
      </a>
      <a href="" class="flex items-center mt-2">
       <div class="w-8 h-8 image-fit">
        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-10.jpg">
       </div>
       <div class="ml-3">Nike Air Max 270</div>
       <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
      </a>
      <a href="" class="flex items-center mt-2">
       <div class="w-8 h-8 image-fit">
        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-7.jpg">
       </div>
       <div class="ml-3">Nikon Z6</div>
       <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
      </a>
      <a href="" class="flex items-center mt-2">
       <div class="w-8 h-8 image-fit">
        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-10.jpg">
       </div>
       <div class="ml-3">Sony Master Series A9G</div>
       <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
      </a>
     </div>
    </div>
   </div> -->
   <!-- END: Search -->
   <!-- BEGIN: Notifications -->
   <div class="intro-x dropdown relative mr-4 sm:mr-6">
    <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon"></i> </div>
    <div class="notification-content dropdown-box mt-8 absolute top-0 right-0 z-10 -mr-10 sm:mr-0">
     <div class="notification-content__box dropdown-box__content box">
      <div class="notification-content__title">Notifications</div>
     </div>
    </div>
   </div>
   <!-- END: Notifications -->
   <!-- BEGIN: Account Menu -->
   <div class="intro-x dropdown w-8 h-8 relative">
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
     <img alt="Midone Tailwind HTML Admin Template" src="<?= base_url('public/profiel/') . $profiel['foto'] ?>">
    </div>
    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
     <div class="dropdown-box__content box bg-theme-38 text-white">
      <div class="p-4 border-b border-theme-40">
       <div class="font-medium"><?= $profiel['nama'] ?></div>
      </div>
      <div class="p-2">
       <?php if ($level === 'Admin') : ?>
        <a href="<?= base_url('user/profiel/admin') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
       <?php elseif ($level === 'Guru') : ?>
        <a href="<?= base_url('user/profiel/guru') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
       <?php else : ?>
        <a href="<?= base_url('user/profiel/siswa') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
       <?php endif; ?>
       <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
       <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
      </div>
      <div class="p-2 border-t border-theme-40">
       <a href="<?= base_url('auth/logout') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
      </div>
     </div>
    </div>
   </div>
   <!-- END: Account Menu -->
  </div>
 </div>
 <!-- END: Top Bar -->
 <!-- BEGIN: Top Menu -->
 <nav class="top-nav">
  <?php if ($level === 'Admin') : ?>
   <ul>
    <li>
     <a href="<?= base_url('admin') ?>" class="top-menu <?php if ($this->uri->segment(3) === null) {
                                                         echo 'top-menu--active';
                                                        } ?> ">
      <div class="top-menu__icon"> <i data-feather="home"></i> </div>
      <div class="top-menu__title"> Dashboard </div>
     </a>
    </li>
    <li>
     <a href="javascript:;" class="top-menu <?php if ($this->uri->segment(2) === 'user') {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="users"></i> </div>
      <div class="top-menu__title"> Management User <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
     </a>
     <ul class="">
      <li>
       <a href="<?= base_url('admin/user/guru') ?>" class="top-menu">
        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
        <div class="top-menu__title"> Guru </div>
       </a>
      </li>
      <li>
       <a href="<?= base_url('admin/user/siswa') ?>" class="top-menu">
        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
        <div class="top-menu__title"> Siswa </div>
       </a>
      </li>
     </ul>
    </li>
    <li>
     <a href="javascript:;" class="top-menu <?php if ($this->uri->segment(2) === 'master') {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="box"></i> </div>
      <div class="top-menu__title"> Master Data <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
     </a>
     <ul class="">
      <li>
       <a href="<?= base_url('admin/master/guru') ?>" class="top-menu">
        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
        <div class="top-menu__title"> Guru </div>
       </a>
      </li>
      <li>
       <a href="<?= base_url('admin/master/siswa') ?>" class="top-menu">
        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
        <div class="top-menu__title"> Siswa </div>
       </a>
      </li>
      <li>
       <a href="<?= base_url('admin/master/mapel') ?>" class="top-menu">
        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
        <div class="top-menu__title"> Mata Pelajaran </div>
       </a>
      </li>
     </ul>
    </li>
    <li>
     <a href="<?= base_url('user/profiel/admin') ?>" class="top-menu  <?php if ($this->uri->segment(2) === 'profiel') {
                                                                       echo 'top-menu--active';
                                                                      } ?> ">
      <div class="top-menu__icon"> <i data-feather="user"></i> </div>
      <div class="top-menu__title"> Profiel </div>
     </a>
    </li>
   </ul>
  <?php elseif ($level == 'Guru') : ?>
   <ul>
    <li>
     <a href="<?= base_url('guru') ?>" class="top-menu <?php if ($this->uri->segment(2) === null) {
                                                        echo 'top-menu--active';
                                                       } ?> ">
      <div class="top-menu__icon"> <i data-feather="home"></i> </div>
      <div class="top-menu__title"> Dashboard </div>
     </a>
    </li>
    <li>
     <a href="<?= base_url('guru/ruangan') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'ruangan' or $this->uri->segment(2) === 'detailRuangan') {
                                                                echo 'top-menu--active';
                                                               } ?> ">
      <div class="top-menu__icon"> <i data-feather="box"></i> </div>
      <div class="top-menu__title"> Ruangan </div>
     </a>
    </li>
    <li>
     <a href="<?= base_url('guru/materi') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'materi' or $this->uri->segment(2) === 'materiDetail') {
                                                               echo 'top-menu--active';
                                                              } ?>">
      <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
      <div class="top-menu__title"> Materi</div>
     </a>

    </li>

    <li>
     <a href="<?= base_url('guru/absen') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'absen' or $this->uri->segment(2) === 'absenDetail') {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="book"></i> </div>
      <div class="top-menu__title"> Absen </div>
     </a>

    </li>
     <li>
     <a href="<?= base_url('guru/tugas') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'tugas' or $this->uri->segment(2) === 'tugasDetail') {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="clipboard"></i> </div>
      <div class="top-menu__title"> Tugas </div>
     </a>
    </li>
    <li>
     <a href="<?= base_url('user/profiel/guru') ?>" class="top-menu  <?php if ($this->uri->segment(2) === 'profiel') {
                                                                       echo 'top-menu--active';
                                                                      } ?> ">
      <div class="top-menu__icon"> <i data-feather="user"></i> </div>
      <div class="top-menu__title"> Profiel </div>
     </a>
    </li>
   </ul>
   <?php else: ?>
     <ul>
    <li>
     <a href="<?= base_url('siswa') ?>" class="top-menu <?php if ($this->uri->segment(2) === null) {
                                                        echo 'top-menu--active';
                                                       } ?> ">
      <div class="top-menu__icon"> <i data-feather="home"></i> </div>
      <div class="top-menu__title"> Dashboard </div>
     </a>
    </li>
    <li>
     <a href="<?= base_url('siswa/ruangan') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'ruangan' or $this->uri->segment(2) === 'detailRuangan') {
                                                                echo 'top-menu--active';
                                                               } ?> ">
      <div class="top-menu__icon"> <i data-feather="box"></i> </div>
      <div class="top-menu__title"> Ruangan </div>
     </a>
    </li>
    <?php if($this->uri->segment(2) == 'pertemuan' || $this->uri->segment(2) == 'detailPertemuan'): ?>
    <li>
     <a href="" class="top-menu <?php if ($this->uri->segment(2) === 'pertemuan' ||  $this->uri->segment(2) == 'detailPertemuan') {
                                                               echo 'top-menu--active';
                                                              } ?>">
      <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
      <div class="top-menu__title"> Pertemuan</div>
     </a>
    </li>
   <?php endif; ?>
    <li>
     <a href="<?= base_url('siswa/absen') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'absen' || $this->uri->segment(2) === 'pertemuanAbsen' ) {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="book"></i> </div>
      <div class="top-menu__title"> Absen </div>
     </a>

    </li>
     <li>
     <a href="<?= base_url('siswa/tugas') ?>" class="top-menu <?php if ($this->uri->segment(2) === 'tugas' ||$this->uri->segment(2) === 'kerjakanTugas'|$this->uri->segment(2) === 'riwayatTugas' ) {
                                             echo 'top-menu--active';
                                            } ?>">
      <div class="top-menu__icon"> <i data-feather="clipboard"></i> </div>
      <div class="top-menu__title"> Tugas </div>
     </a>
    </li>
    <li>
     <a href="<?= base_url('user/profiel/siswa') ?>" class="top-menu  <?php if ($this->uri->segment(2) === 'profiel') {
                                                                       echo 'top-menu--active';
                                                                      } ?> ">
      <div class="top-menu__icon"> <i data-feather="user"></i> </div>
      <div class="top-menu__title"> Profiel </div>
     </a>
    </li>
   </ul>
  <?php endif; ?>
 </nav>