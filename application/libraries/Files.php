<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Files{
	protected $CI;

	function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->library('upload');	
    }
	public function do_upload_multiple($files, $config){
        $number_of_files = sizeof($_FILES[$files]['tmp_name']);
        $errors = array();
        for($i=0;$i<$number_of_files;$i++) {
	      if($_FILES[$files]['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES[$files]['name'][$i];
	    }

	    if(sizeof($errors) == 0) {
      		$uploads_data = array();
			for ($i = 0; $i < $number_of_files; $i++) {
				$random_file = md5(uniqid(rand(), true));
				$_FILES[$random_file]['name'] = $_FILES[$files]['name'][$i];
				$_FILES[$random_file]['type'] = $_FILES[$files]['type'][$i];
				$_FILES[$random_file]['tmp_name'] = $_FILES[$files]['tmp_name'][$i];
				$_FILES[$random_file]['error'] = $_FILES[$files]['error'][$i];
				$_FILES[$random_file]['size'] = $_FILES[$files]['size'][$i];
				$result = $this->do_upload($random_file, $config);
				if(!$result['success'])
					$errors[] = $result['error'];
				else
					$uploads_data[] = $result['upload_data'];
			}
			return array(
				'success'			=>	TRUE,
				'uploads_data'			=>	$uploads_data,
				'errors'			=>	$errors
			);
	    }
	    else
	    {
	      return array(
	      		'success'			=>	FALSE,
	      		'errors'			=>	$errors
	      	);
	    }

	}
	public function do_upload($file, $config)
    {
    	$this->CI->upload->initialize($config, TRUE);
        if ( ! $this->CI->upload->do_upload($file))
        {
                $error = array('error' => $this->CI->upload->display_errors());
                return [
                	'success'	=>	FALSE,
                	'error'		=>	$error
                ];
        }
        else
        {
                $data = array('upload_data' => $this->CI->upload->data());
                $upload_data = $this->CI->upload->data();
                $upload_data['public_path'] = $config['upload_path']."/".$upload_data['file_name'];
                return [
                	'success'		=>	TRUE,
                	'upload_data'	=>	$upload_data
                ];
        }
    }

    public function upload_to_dropbox($path, $d_path = '', $delete_local_file = true){
		$this->CI->load->library('Dx');
    	// public function UploadFile($src_file, $dropbox_path='', $overwrite=true, $parent_rev=null)
    	return $this->CI->dx->dropbox->UploadFile($path, $d_path, false);
    }
    public function get_extension($filename){
    	$parse = explode(".", $filename);
    	if(count($parse) > 1 && $parse[count($parse) - 1] != ''){
    		return $parse[count($parse) - 1];
    	}
    	return 'undefined';
    }
    public function ccCode($asset){
    	$id = $asset->id;
    	return "[f-$id]";
    }

    // public function shares($path, array $params = array(), $root=self::DEFAULT_ROOT)
    public function get_file_from_dropbox($d_path){
        $this->CI->load->library('Dx');
        return $this->CI->dx->dropbox->GetLink($d_path, false);
    }

    // public function GetThumbnail($dropbox_file, $size = 's', $format = 'jpeg', $echo = false) (xs, s, m, l, xl)
    public function get_image_from_dropbox($dropbox_file, $size = 's', $format = 'jpeg', $echo =TRUE){
        $this->CI->load->library('Dx');
        return $this->CI->dx->dropbox->GetThumbnail($dropbox_file, $size, $format, $echo);
    }

    public function create_thumbnail($file, $config){
        $config['source_image'] = $file;
        $this->CI->load->library('image_lib', $config);
        $this->CI->image_lib->resize();
    }
}
?>