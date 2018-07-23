<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = '';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$config['acl']['guest'] = array(
    'Guest'=>array('func1','func2'),
    'LogCheck'=>array('login'),
    'Users'=>array('ajaxValid')
);

// 經認證後身分

$config['acl']['users'] = array(
    'Users'=>array(
        'MemberList','nowOnLine',
        'DeleItem','UpdateItem','Update','CreateItem','Create'
        ),
    'LogCheck'=>array('logout'),
    'Tag'=>array(
    	'tagList',
    	'Create','Update','CreateItem','UpdateItem','DeleItem'),
    'Article'=>array(
    	'showList',
    	'Create','Update','CreateItem','UpdateItem','DeleItem')
);

$config['acl']['admin'] = array(
    'Users'=>array(
        'func2',
        'MemberList','nowOnLine',
        'DeleItem','UpdateItem','Update','CreateItem','Create'
        ),
    'LogCheck'=>array('logout'),
    'Tag'=>array(
    	'tagList',
    	'Create','Update','CreateItem','UpdateItem','DeleItem'),
    'Article'=>array(
    	'showList',
    	'Create','Update','CreateItem','UpdateItem','DeleItem')
);


$config['BackCrumb']=array(
	
    '1'=>array('id'=>1,'funcword'=>'home', 'funcname'=>'首頁',
       'parsent'=>null,
       'path'=>'1'
     ),
     // 以上為root路徑,以下為leaf路徑
    '2'=>array('id'=>2,'funcword'=>'Article','funcname'=>'文章模組',
       'parsent'=>'1',
       'path'=>'1,2'
     ),
    '3'=>array('id'=>3,'funcword'=>'showList','funcname'=>'文章列表',
       'parsent'=>'1,2',
       'path'=>'1,2,3'
     ),
    '4'=>array('id'=>4,'funcword'=>'Update','funcname'=>'文章編輯',
       'parsent'=>'1,2',
       'path'=>'1,2,4'
     ),
    '5'=>array('id'=>5,'funcword'=>'Create','funcname'=>'文章新增',
       'parsent'=>'1,2',
       'path'=>'1,2,5'
     ),
     
    '12'=>array('id'=>12,'funcword'=>'Users','funcname'=>'會員模組',
       'parsent'=>'1',
       'path'=>'1,12'
     ),
    '13'=>array('id'=>13,'funcword'=>'MemberList','funcname'=>'會員列表',
       'parsent'=>'1,12',
       'path'=>'1,12,13'
     ),
    '14'=>array('id'=>14,'funcword'=>'Update','funcname'=>'會員編輯',
       'parsent'=>'1,12',
       'path'=>'1,12,14'
     ),
    '15'=>array('id'=>15,'funcword'=>'Create','funcname'=>'會員新增',
       'parsent'=>'1,12',
       'path'=>'1,12,15'
     ),
     '16'=>array('id'=>16,'funcword'=>'nowOnLine','funcname'=>'會員監控',
       'parsent'=>'1,12',
       'path'=>'1,12,16'
     ),
     
    '22'=>array('id'=>22,'funcword'=>'Tag','funcname'=>'標籤模組',
       'parsent'=>'1',
       'path'=>'1,22'
     ),
    '23'=>array('id'=>23,'funcword'=>'tagList','funcname'=>'標籤列表',
       'parsent'=>'1,22',
       'path'=>'1,22,23'
     ),
    '24'=>array('id'=>24,'funcword'=>'Update','funcname'=>'標籤編輯',
       'parsent'=>'1,22',
       'path'=>'1,22,24'
     ),
    '25'=>array('id'=>25,'funcword'=>'Create','funcname'=>'標籤新增',
       'parsent'=>'1,22',
       'path'=>'1,22,25'
     )
    
);