<? 
//GD를 이용한 이미지 리사이즈 함수 

//$srcimg    :    원본파일 
//$dstimg    :리사이즈 파일 : 없을 경우 이미지를 직접출력합니다. 
//*리사이즈와 워터 마크를 사용하지 않을 경우 직접 출력하는건 효율성이 떨어집니다. 
//(직접 출력의 경우 header가 수정되기 때문에 다른 출력이 있으면 안됩니다.) 
//$rewidth    :리사이즈 너비 
//$reheight    :리사이즈 높이 
//* $rewidth와$reheight 가 둘다 없을 경우 원본크기 그대로 작업합니다. 
//$simg_type        :리사이즈 파일타입 (1:gif , 2:jpg , 3:png) : 기본 gif 
//$simg_str : 워터마크 문자열  (시작 위치:10px,20px ) 폰트는 gulim.ttc 지만, 없을 경우 ""로 바꿔주세요. 
//gulim.ttc 는 윈도우 font 폴더 안에 있습니다. 
function prdimg_resize($srcimg, $dstimg='', $imgpath, $rewidth='', $reheight='', $simg_type=1,$simg_str='brownbasket.com'){ 

if(!is_file($srcimg)){    return '원본 파일이 없습니다.'; } 
//if(!$dstimg){    return '리사이즈 파일이름이 없습니다.'; } : 리사이즈 파일 이름이 없으면, 이미지로 그냥 출력합니다. 
//if(!$rewidth && !$reheight){    return '너비 와 높이 둘중 하나는 값이 있어야합니다'; } : 원본 크기로 작업합니다. 

// GD 버젼체크 
$gd = gd_info(); 
$gdver = substr(preg_replace("/[^0-9]/", "", $gd['GD Version']), 0, 1); 
if(!$gdver) return "GD 버젼체크 실패거나 GD 버젼이 1 미만입니다."; 

list($img_width, $img_height, $img_type, $img_attr) = getimagesize($imgpath/$srcimg); //소스이미지파일 크기 
if(!$rewidth && !$reheight){ 
    $rewidth = $img_width; 
    $reheight = $img_height; 
}else if(!$rewidth){ 
    $rewidth = $img_width * ($reheight/$img_height);    //자동 비율생성 : 너비 
}else if(!$reheight){ 
    $reheight = $img_height * ($rewidth/$img_width);    //자동 비율생성 : 높이 
} 
/* 
지원 이미지 타입 
1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 
9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. 
1,2,3 만 지원하도록한다. 
*/ 
if($img_type<1 && $img_type > 3){ 
    return "GIF,JPG,PNG 가 아닙니다."; 
} 

if($img_type==1){ 
$img_im = imagecreatefromgif($imgpath/$srcimg);            //원본 이미지: gif 
}else if($img_type==2){ 
$img_im = imagecreatefromjpeg($imgpath/$srcimg);            //원본 이미지: jpg 
}else if($img_type==3){ 
$img_im = imagecreatefrompng($imgpath/$srcimg);            //원본 이미지: png 
} 

if($gdver >= 2){    //GD 2.XX    : truecolor로 작업한다. 
    $simg_im = imagecreatetruecolor($rewidth, $reheight); 
    imagecopyresampled($simg_im, $img_im, 0, 0, 0, 0, $rewidth, $reheight,$img_width, $img_height); //이미지를 리사이즈한다. 
}else{ //GD 1.xxx 
    $simg_im = imagecreate($rewidth, $reheight); 
    imagecopyresized($simg_im, $img_im, 0, 0, 0, 0, $rewidth, $reheight,$img_width, $img_height);    //이미지를 리사이즈한다. 
} 

if($simg_str){ 
  $color_000000 = imagecolorallocate($simg_im, 0, 0, 0); //색상 : 검정 
  $color_FFFFFF = imagecolorallocate($simg_im, 0xFF, 0xFF, 0xFF); //색상 : 흰색 
  $simg_str = iconv("EUC-KR","UTF-8",$simg_str); // UTF-8로 한글 변경 
  @imagettftext($simg_im, 10, 0, 12, 22, $color_000000, "/gulim.ttc",$simg_str); //글자 적기 
  @imagettftext($simg_im, 10, 0, 10, 20, $color_FFFFFF, "/gulim.ttc",$simg_str); //글자 적기 
} 


if($dstimg){ 
    if($simg_type==1){ 
        imagegif($simg_im,$dstimg);            //원본 이미지: gif 
    }else if($simg_type==2){ 
        imagejpeg($simg_im,$dstimg,80);            //원본 이미지: jpg 
    }else if($simg_type==3){ 
        imagepng($simg_im,$dstimg);            //원본 이미지: png 
    } 
}else{ 
        Header("Content-Disposition: attachment;; filename=".basename($srcimg)); 
        header("Content-Transfer-Encoding: binary"); 
    if($simg_type==1){ 
        header("Content-type: image/gif");  //이미지 타입에 맞도록 해더 구성 
        imagegif($simg_im);            //원본 이미지: gif 
    }else if($simg_type==2){ 
        header("Content-type: image/jpg");  //이미지 타입에 맞도록 해더 구성 
        imagejpeg($simg_im,'',80);            //원본 이미지: jpg 
    }else if($simg_type==3){ 
        header("Content-type: image/png");  //이미지 타입에 맞도록 해더 구성 
        imagepng($simg_im);            //원본 이미지: png 
    } 
} 

// 메모리에 있는 그림 삭제 
imagedestroy($img_im); 
imagedestroy($simg_im); 

return '이미지 리사이즈 완료'; 

} 
?>