<? 

/*  usage 

$src = '/home/myid/public_html/source.jpg';        //-- 원본 
$dst = '/home/myid/public_html/thumbnail/test_image.jpg';     //-- 저장 

$quality = '80';    //-- jpg 퀄리티 
$size = '200';    //-- 줄일 크기 pixel (너비, 또는 높이에 적용) 
//$ratio = '4:3';        //-- 이미지를 4:3 비율로 잘라냄 
$ratio = 'false';        //-- 원본 이미지비율을 유지 

$get_size = _getimagesize($src, $size, $ratio); 
$result = resize_image($dst, $src, $get_size, $quality, $ratio); 

if($result === TRUE) 
    echo '리사이즈 성공'; 
else 
    echo 'ㅜ.ㅜ'; 

*/ 


// $destination : 이미지가 저장될 경로 
// $departure : 원본 이미지 경로 
// $size : _getimagesize() 의 return 값을 넣을 것 
// $quality : JPG 퀄리티 
// $ratio : 비율 강제설정 

function resize_image($destination, $departure, $size, $quality='80', $ratio='false'){ 

    if($size[2] == 1)    //-- GIF 
        $src = imageCreateFromGIF($departure); 
    elseif($size[2] == 2) //-- JPG 
        $src = imageCreateFromJPEG($departure); 
    else    //-- $size[2] == 3, PNG 
        $src = imageCreateFromPNG($departure); 

    $dst = imagecreatetruecolor($size['w'], $size['h']); 


    $dstX = 0; 
    $dstY = 0; 
    $dstW = $size['w']; 
    $dstH = $size['h']; 

    if($ratio != 'false' && $size['w']/$size['h'] <= $size[0]/$size[1]){ 
        $srcX = ceil(($size[0]-$size[1]*($size['w']/$size['h']))/2); 
        $srcY = 0; 
        $srcW = $size[1]*($size['w']/$size['h']); 
        $srcH = $size[1]; 
    }elseif($ratio != 'false'){ 
        $srcX = 0; 
        $srcY = ceil(($size[1]-$size[0]*($size['h']/$size['w']))/2); 
        $srcW = $size[0]; 
        $srcH = $size[0]*($size['h']/$size['w']); 
    }else{ 
        $srcX = 0; 
        $srcY = 0; 
        $srcW = $size[0]; 
        $srcH = $size[1]; 
    } 

    @imagecopyresampled($dst, $src, $dstX, $dstY, $srcX, $srcY, $dstW, $dstH, $srcW, $srcH); 
    @imagejpeg($dst, $destination, $quality); 
    @imagedestroy($src); 
    @imagedestroy($dst); 

    return TRUE; 
} 

// $img : 원본이미지 
// $m : 목표크기 pixel 
// $ratio : 비율 강제설정 
function _getimagesize($img, $m, $ratio='false'){ 

    $v = @getImageSize($img); 

    if($v === FALSE || $v[2] < 1 || $v[2] > 3) 
        return FALSE; 

    $m = intval($m); 

    if($m > $v[0] && $m > $v[1]) 
        return array_merge($v, array("w"=>$v[0], "h"=>$v[1])); 

    if($ratio != 'false'){ 
        $xy = explode(':',$ratio); 
        return array_merge($v, array("w"=>$m, "h"=>ceil($m*intval(trim($xy[1]))/intval(trim($xy[0]))))); 
    }elseif($v[0] > $v[1]){ 
        $t = $v[0]/$m; 
        $s = floor($v[1]/$t); 
        $m = ($m > 0) ? $m : 1; 
        $s = ($s > 0) ? $s : 1; 
        return array_merge($v, array("w"=>$m, "h"=>$s)); 
    } else { 
        $t = $v[1]/intval($m); 
        $s = floor($v[0]/$t); 
        $m = ($m > 0) ? $m : 1; 
        $s = ($s > 0) ? $s : 1; 
        return array_merge($v, array("w"=>$s, "h"=>$m)); 
    } 
} 

?> 