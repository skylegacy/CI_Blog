
<?php
$this->load->helper('form');
$this->load->helper('url');
$this->load->library('session');
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link href="<?=base_url('asserts/semantic/semantic.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('asserts/main/main.css') ?>" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="<?=base_url() ?>asserts/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>asserts/jquery/jquery.ellipsis.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>asserts/semantic/semantic.js"></script>
    <script type="text/javascript" src="<?=base_url('asserts/main/main.js') ?>"></script>



    <title>SkyLegacy</title>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 350px;
        }
        .top_banner{
           height:140px;
            background: #99CCFF;
        }
        .breadRow{
            padding-top: 10px;
            padding-left:  5px;
            padding-bottom:  10px;
            background: #fff;
        }
        .navWrap{
            margin-left: 260px;
            
        }
        .navWrap .ui.menu{
                border-radius: 0;
                border: 0;
                background:#009999;
                color:#fff;
        }
        .mainWrap{
            min-height: 100%;
            position: relative;
            margin-left: 260px;
        }
        .mainContent{
           
        }

    </style>
</head>

 <body>

