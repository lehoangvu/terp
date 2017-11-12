<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// config dropbox path

// for asset
$config['asset_allowed_types']        = 'gif|jpg|jpeg|png';
$config['asset_max_size']             = 10240;
$config['asset_max_width']            = 16000;
$config['asset_max_height']           = 16000;
$config['asset_thumbnail_width'] 			= 128;
$config['asset_thumbnail_height']     = 128;
$config['asset_thumbnail_dir']        = "public/assets/thumbnails";
$config['asset_temp_dir']             = 'private/temp/assets';
$config['asset_dropbox_path']         = 'assets/';


// config comment asset
$config['comment_allowed_types']        = 'gif|jpg|png|psd|ai';
$config['comment_max_size']             = 5120;

// config design asset
$config['design_allowed_types']        = 'gif|jpg|png|psd|ai';
$config['design_max_size']             = 10240;

// config files path
$config['f_user_avatar'] = "/public/media/avatar/";