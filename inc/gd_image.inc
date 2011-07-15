<? 
//GD�� �̿��� �̹��� �������� �Լ� 

//$srcimg    :    �������� 
//$dstimg    :�������� ���� : ���� ��� �̹����� ��������մϴ�. 
//*��������� ���� ��ũ�� ������� ���� ��� ���� ����ϴ°� ȿ������ �������ϴ�. 
//(���� ����� ��� header�� �����Ǳ� ������ �ٸ� ����� ������ �ȵ˴ϴ�.) 
//$rewidth    :�������� �ʺ� 
//$reheight    :�������� ���� 
//* $rewidth��$reheight �� �Ѵ� ���� ��� ����ũ�� �״�� �۾��մϴ�. 
//$simg_type        :�������� ����Ÿ�� (1:gif , 2:jpg , 3:png) : �⺻ gif 
//$simg_str : ���͸�ũ ���ڿ�  (���� ��ġ:10px,20px ) ��Ʈ�� gulim.ttc ����, ���� ��� ""�� �ٲ��ּ���. 
//gulim.ttc �� ������ font ���� �ȿ� �ֽ��ϴ�. 
function prdimg_resize($srcimg, $dstimg='', $imgpath, $rewidth='', $reheight='', $simg_type=1,$simg_str='brownbasket.com'){ 

if(!is_file($srcimg)){    return '���� ������ �����ϴ�.'; } 
//if(!$dstimg){    return '�������� �����̸��� �����ϴ�.'; } : �������� ���� �̸��� ������, �̹����� �׳� ����մϴ�. 
//if(!$rewidth && !$reheight){    return '�ʺ� �� ���� ���� �ϳ��� ���� �־���մϴ�'; } : ���� ũ��� �۾��մϴ�. 

// GD ����üũ 
$gd = gd_info(); 
$gdver = substr(preg_replace("/[^0-9]/", "", $gd['GD Version']), 0, 1); 
if(!$gdver) return "GD ����üũ ���аų� GD ������ 1 �̸��Դϴ�."; 

list($img_width, $img_height, $img_type, $img_attr) = getimagesize($imgpath/$srcimg); //�ҽ��̹������� ũ�� 
if(!$rewidth && !$reheight){ 
    $rewidth = $img_width; 
    $reheight = $img_height; 
}else if(!$rewidth){ 
    $rewidth = $img_width * ($reheight/$img_height);    //�ڵ� �������� : �ʺ� 
}else if(!$reheight){ 
    $reheight = $img_height * ($rewidth/$img_width);    //�ڵ� �������� : ���� 
} 
/* 
���� �̹��� Ÿ�� 
1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 
9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. 
1,2,3 �� �����ϵ����Ѵ�. 
*/ 
if($img_type<1 && $img_type > 3){ 
    return "GIF,JPG,PNG �� �ƴմϴ�."; 
} 

if($img_type==1){ 
$img_im = imagecreatefromgif($imgpath/$srcimg);            //���� �̹���: gif 
}else if($img_type==2){ 
$img_im = imagecreatefromjpeg($imgpath/$srcimg);            //���� �̹���: jpg 
}else if($img_type==3){ 
$img_im = imagecreatefrompng($imgpath/$srcimg);            //���� �̹���: png 
} 

if($gdver >= 2){    //GD 2.XX    : truecolor�� �۾��Ѵ�. 
    $simg_im = imagecreatetruecolor($rewidth, $reheight); 
    imagecopyresampled($simg_im, $img_im, 0, 0, 0, 0, $rewidth, $reheight,$img_width, $img_height); //�̹����� ���������Ѵ�. 
}else{ //GD 1.xxx 
    $simg_im = imagecreate($rewidth, $reheight); 
    imagecopyresized($simg_im, $img_im, 0, 0, 0, 0, $rewidth, $reheight,$img_width, $img_height);    //�̹����� ���������Ѵ�. 
} 

if($simg_str){ 
  $color_000000 = imagecolorallocate($simg_im, 0, 0, 0); //���� : ���� 
  $color_FFFFFF = imagecolorallocate($simg_im, 0xFF, 0xFF, 0xFF); //���� : ��� 
  $simg_str = iconv("EUC-KR","UTF-8",$simg_str); // UTF-8�� �ѱ� ���� 
  @imagettftext($simg_im, 10, 0, 12, 22, $color_000000, "/gulim.ttc",$simg_str); //���� ���� 
  @imagettftext($simg_im, 10, 0, 10, 20, $color_FFFFFF, "/gulim.ttc",$simg_str); //���� ���� 
} 


if($dstimg){ 
    if($simg_type==1){ 
        imagegif($simg_im,$dstimg);            //���� �̹���: gif 
    }else if($simg_type==2){ 
        imagejpeg($simg_im,$dstimg,80);            //���� �̹���: jpg 
    }else if($simg_type==3){ 
        imagepng($simg_im,$dstimg);            //���� �̹���: png 
    } 
}else{ 
        Header("Content-Disposition: attachment;; filename=".basename($srcimg)); 
        header("Content-Transfer-Encoding: binary"); 
    if($simg_type==1){ 
        header("Content-type: image/gif");  //�̹��� Ÿ�Կ� �µ��� �ش� ���� 
        imagegif($simg_im);            //���� �̹���: gif 
    }else if($simg_type==2){ 
        header("Content-type: image/jpg");  //�̹��� Ÿ�Կ� �µ��� �ش� ���� 
        imagejpeg($simg_im,'',80);            //���� �̹���: jpg 
    }else if($simg_type==3){ 
        header("Content-type: image/png");  //�̹��� Ÿ�Կ� �µ��� �ش� ���� 
        imagepng($simg_im);            //���� �̹���: png 
    } 
} 

// �޸𸮿� �ִ� �׸� ���� 
imagedestroy($img_im); 
imagedestroy($simg_im); 

return '�̹��� �������� �Ϸ�'; 

} 
?>