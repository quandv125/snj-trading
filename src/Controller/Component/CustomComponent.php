<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
class CustomComponent extends Component
{
    public function sum($amount1, $amount2)
    {
        return $amount1 + $amount2;
    }

    public function generateThumb( $src_path, $name_thumb = null, $thumb_width) {
		## $src_path 	= 'D:/xampp/htdocs/project/app/webroot/img/1.jpg'
		## $thumb_width = 320 

		if ($name_thumb == null) {
			$thumb_path = THUMBNAILS.$this->CreateNameThumb($src_path);
		} else {
			$thumb_path = THUMBNAILS.$name_thumb;
		}
		
		$src_dir 	= 	opendir( dirname($src_path) );
		$img_path_info 	= 	pathinfo($src_path);
		if(strtolower($img_path_info['extension']) == 'jpg') {
			$image 	= 	imagecreatefromjpeg( "{$src_path}" );
		} else if(strtolower($img_path_info['extension']) == 'png'){
			$image 	= 	imagecreatefrompng( "{$src_path}" );
		} else if( strtolower($img_path_info['extension']) == 'gif'){
			$image 	= 	imagecreatefromgif( "{$src_path}" );
		} 

		$imgwidth = imagesx( $image );
		$imgheight = imagesy( $image );

		$new_thumb_width = $thumb_width;
		$new_thumb_height = floor( $imgheight * ( $thumb_width / $imgwidth ) );

		// Size percent
		// $new_thumb_width_percent = ($imgwidth*$thumb_width)/100;
		// $new_thumb_height_percent = ($imgheight*$thumb_width)/100;

		$temp_img = imagecreatetruecolor( $new_thumb_width, $new_thumb_height );
		imagecopyresized( $temp_img, $image, 0, 0, 0, 0, $new_thumb_width, $new_thumb_height, $imgwidth, $imgheight );
			$name = 'test.jpg';
		if(strtolower($img_path_info['extension']) == 'jpg') 
		{
		  	imagejpeg( $temp_img, "{$thumb_path}" );
		} 
		else if(strtolower($img_path_info['extension']) == 'png')
		{
		 	imagepng( $temp_img, "{$thumb_path}" );
		} 
		else  if ( strtolower($img_path_info['extension']) == 'gif' ){
		    imagegif( $temp_img, "{$thumb_path}" );
		}
		@chmod($thumb_path, 0777); 
	}

	public function CreateNameThumb($name){
		## name = '1.jpg'
		$name_thumb = md5(time().pathinfo($name,PATHINFO_FILENAME)).DOT.pathinfo($name,PATHINFO_EXTENSION);
		return $name_thumb;
	}

	public function generate_thumbnail($source_image_path, $thumbnail_image_path = null, $thumb_width) {

		if ($thumbnail_image_path == null) {
			$thumbnail_image_path = THUMBNAILS.$this->CreateNameThumb($source_image_path);
		} else {
			$thumbnail_image_path = THUMBNAILS.$thumbnail_image_path;
		}
		$thumb_height = $thumb_width;
		list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
		switch ($source_image_type) {
			case IMAGETYPE_GIF:
				$source_gd_image = imagecreatefromgif($source_image_path);
				break;
			case IMAGETYPE_JPEG:
				$source_gd_image = imagecreatefromjpeg($source_image_path);
				break;
			case IMAGETYPE_PNG:
				$source_gd_image = imagecreatefrompng($source_image_path);
				break;
		}
		if ($source_gd_image === false) {
			return false;
		}
		$source_aspect_ratio = $source_image_width / $source_image_height;
		$thumbnail_aspect_ratio = $thumb_width / $thumb_height;
		if ($source_image_width <= $thumb_width && $source_image_height <= $thumb_height) {
			$thumbnail_image_width = $source_image_width;
			$thumbnail_image_height = $source_image_height;
		} elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
			$thumbnail_image_width = (int) ($thumb_height * $source_aspect_ratio);
			$thumbnail_image_height = $thumb_height;
		} else {
			$thumbnail_image_width = $thumb_width;
			$thumbnail_image_height = (int) ($thumb_width / $source_aspect_ratio);
		}
		$thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
		imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);

		$img_disp = imagecreatetruecolor($thumb_width,$thumb_width);
		$backcolor = imagecolorallocate($img_disp,255, 255, 255);
		imagefill($img_disp,0,0,$backcolor);

		imagecopy($img_disp, $thumbnail_gd_image, (imagesx($img_disp)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img_disp)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));

		imagejpeg($img_disp, $thumbnail_image_path, 90);
		imagedestroy($source_gd_image);
		imagedestroy($thumbnail_gd_image);
		imagedestroy($img_disp);
		return true;
	}
}
?>