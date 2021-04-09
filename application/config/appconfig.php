<?php
$config['emailConfig'] = array(
   'host'         => 'mail.ilia5.site7.me',
   'Username'     => 'admin@ilia5.site7.me',
   'Password'     => '8AOUU!q46no3',
   'SMTPAuth'     => true,
   'SMTPSecure'   => 'ssl',
   'port'         => 465,
   'senderEmail' => 'admin@ilia5.site7.me',
   'senderName'  => 'www.afishnik.site7.me Admin'
);


$config['uploadFolder'] = 'assets/uploads/';
$categoryIconUploadFolder = 'assets/uploads/icons/';
$bgImagesFolder = 'assets/uploads/covers/';
$config['lastVisitsPeriod'] = 24 * 60 * 60; //24h
$config['lastPeriodAllowedVisitCount'] = 5;

$config['fileUploadConfig'] = array(
   'upload_path'     => $config['uploadFolder'],
   'max_size'        => 5120,
   'allowed_types'   => 'jpg|jpeg|png',
   'overwrite'       => TRUE,
   'remove_spaces'   => TRUE
);

$config['categoryIconUploadConfig'] = array(
   'upload_path'     => $categoryIconUploadFolder,
   'max_size'        => 5120,
   'allowed_types'   => 'jpg|jpeg|png',
   'overwrite'       => TRUE,
   'remove_spaces'   => TRUE
);


$config['bgImagesUploadConfig'] = array(
   'upload_path'     => $bgImagesFolder,
   'max_size'        => 6144,
   'allowed_types'   => 'jpg|jpeg|png|ico',
   'overwrite'       => TRUE,
   'remove_spaces'   => TRUE
);

$config['profilePaginationConfig'] = array(
   'per_page'        => 5,
   'num_links'       => 8,
   'full_tag_open'   => '<div class="pagination-bx float-right"><ul class="pagination mt-4">',
   'full_tag_close'  => '</ul></div>',
   'cur_tag_open'    => '<li class="active"><a href="javascript:void(0);">',
   'cur_tag_close'   => '</a></li>',
   'num_tag_open'    => '<li>',
   'num_tag_close'   => '</li>',
   'prev_tag_open'   => '<li class="previous"><i class="ti-arrow-left"></i>',
   'prev_tag_close'  => '</li>',
   'next_tag_open'   => '<li class="next">',
   'next_tag_close'  => '<i class="ti-arrow-right"></i></li>'
);

$config['jobsPaginationConfig'] = array(
   'per_page'        => 5,
   'num_links'       => 8,
   'full_tag_open'   => '<div class="pagination-bx float-right"><ul class="pagination mt-4">',
   'full_tag_close'  => '</ul></div>',
   'cur_tag_open'    => '<li class="active"><a href="javascript:void(0);">',
   'cur_tag_close'   => '</a></li>',
   'num_tag_open'    => '<li>',
   'num_tag_close'   => '</li>',
   'prev_tag_open'   => '<li class="previous"><i class="ti-arrow-left"></i>',
   'prev_tag_close'  => '</li>',
   'next_tag_open'   => '<li class="next">',
   'next_tag_close'  => '<i class="ti-arrow-right"></i></li>'
);

$config['searchPaginationConfig'] = array(
   'per_page'        => 7,
   'use_page_numbers'=> false,
   'num_links'       => 8,
   'full_tag_open'   => '<div class="pagination-bx float-right"><ul class="pagination mt-4">',
   'full_tag_close'  => '</ul></div>',
   'cur_tag_open'    => '<li class="active"><a href="javascript:void(0);">',
   'cur_tag_close'   => '</a></li>',
   'num_tag_open'    => '<li>',
   'num_tag_close'   => '</li>',
   'prev_tag_open'   => '<li class="previous"><i class="ti-arrow-left"></i>',
   'prev_tag_close'  => '</li>',
   'next_tag_open'   => '<li class="next">',
   'next_tag_close'  => '<i class="ti-arrow-right"></i></li>'
);


$config['adminPaginationConfig'] = array(
   'per_page'        => 5,
   'num_links'       => 8,
   'full_tag_open'   => '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">',
   'full_tag_close'  => '</ul></nav>',
   'cur_tag_open'    => '<li class=" page-item active"><span class="page-link">',
   'cur_tag_close'   => ' <span class="sr-only">(current)</span></span></li>',
   'num_tag_open'    => '<li class=" page-item">',
   'num_tag_close'   => '</li>',
   'prev_tag_open'   => '<li class=" page-item previous">',
   'prev_tag_close'  => '</li>',
   'next_tag_open'   => '<li class=" page-item next">',
   'next_tag_close'  => '</li>'
);

