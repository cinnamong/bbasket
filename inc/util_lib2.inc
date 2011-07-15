<?
/******************************************************************************
 * Wizshop library
 *
 * 마지막 수정일자 : 2005. 6. 15
 *
 * by FEEL (feel@wizshop.net)
 *
 ******************************************************************************/
	
	// 문자열 끊기 (이상의 길이일때는 ... 로 표시)
	function cut_str($msg, $cut_size) {
		
		if($cut_size<=0) return $msg;
		if(ereg("\[re\]",$msg)) $cut_size=$cut_size+4;
		for($i=0;$i<$cut_size;$i++) if(ord($msg[$i])>127) $han++; else $eng++;
		$cut_size=$cut_size+(int)$han*0.6;
		$point=1;
		for ($i=0;$i<strlen($msg);$i++) {
			if ($point>$cut_size) return $pointtmp."...";
			if (ord($msg[$i])<=127) {
				$pointtmp.= $msg[$i];
				if ($point%$cut_size==0) return $pointtmp."..."; 
			} else {
				if ($point%$cut_size==0) return $pointtmp."...";
				$pointtmp.=$msg[$i].$msg[++$i];
				$point++;
			}
			$point++;
		}
		
		return $pointtmp;
		
	}



	// 회원레벨명
	function user_level($level) {
		
		if($level == "AM") $level = "관리자";
		else if($level == "BM") $level = "부관리자";
		else if($level == "CM") $level = "우수회원";
		else if($level == "DM") $level = "정회원";
		else if($level == "EM") $level = "일반회원";
		else $level = "비회원";
		
		return $level;
	}

	// 결제방법
	function pay_method($pay_method) {
	   
	   if($pay_method == "PB") $pay_method = "무통장입금";
	   else if($pay_method == "PC") $pay_method = "신용카드";
	   else if($pay_method == "PH") $pay_method = "휴대폰";
	   
	   return $pay_method;
	}

	// 배송상태
	function order_status($status){
	   
	   if($status == "OR") $status = "주문접수";
	   else if($status == "OY") $status = "결제완료";
	   else if($status == "DR") $status = "배송준비중";
	   else if($status == "DI") $status = "배송중";
	   else if($status == "DC") $status = "배송완료";
	   else if($status == "OC") $status = "주문취소";
	   else if($status == "RD") $status = "환불요청";
	   else if($status == "RC") $status = "환불완료";
	   else if($status == "CD") $status = "교환요청";
	   else if($status == "CC") $status = "교환완료";

	   return $status;
	}

	// 비방글, 욕설체크
	function check_abuse($str){
		
		global $bbs_info;
	
		$abuse_list = explode(",",$bbs_info->abtxt);
		for($ii=0; $ii < count($abuse_list); $ii++){
			$abuse_list[$ii] = trim($abuse_list[$ii]);
			if(!empty($abuse_list[$ii])){
				if( strpos($str, $abuse_list[$ii]) !== false){
					error("'$abuse_list[$ii]' 단어는 사용하실 수 없습니다.");
				}
			}
		}
	
	}

	// 상품이미지 리사이즈
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

	
	// 포토게시판 이미지 리사이즈
	function bbsimg_resize($srcimg, $dstimg, $imgpath, $rewidth, $reheight){
		
		$src_info = getimagesize("$imgpath/$srcimg");

		if($rewidth < $src_info[0] || $reheight < $src_info[1] ){
			if(($src_info[0]-$rewidth) > ($src_info[1]-$reheight)){
				$reheight = round(($src_info[1]*$rewidth)/$src_info[0]);
			}else{
				$rewidth = round(($src_info[0]*$reheight)/$src_info[1]);
			}
		}else{
			exec("cp $imgpath/$srcimg $imgpath/$dstimg");
			return;
		}

		$dst = imageCreatetrueColor($rewidth,$reheight);
		
		if($src_info[2] == 1){
			
			$src = ImageCreateFromGIF("$imgpath/$srcimg");
			imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
			Imagejpeg($dst,"$imgpath/$dstimg",100);
			
		}else if($src_info[2] == 2){
			
			$src = ImageCreateFromJPEG("$imgpath/$srcimg");
			imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
			Imagejpeg($dst,"$imgpath/$dstimg",100);
			
		}else if($src_info[2] == 3){
			
			$src = ImageCreateFromPNG("$imgpath/$srcimg");
			imagecopyResampled($dst, $src,0,0,0,0,$rewidth,$reheight,ImageSX($src),ImageSY($src));
			Imagepng($dst,"$imgpath/$dstimg",100);
			
		}
		
		imageDestroy($src);
		imageDestroy($dst);

	}
	
	// 파일이 이미지인지
	function isImgtype($srcimg){
		
		if(is_file($srcimg)){
			
			$image_info = getimagesize($srcimg);
			switch ($image_info['mime']) {
				case 'image/gif': return true; break;
				case 'image/jpeg': return true; break;
				case 'image/png': return true; break;
				case 'image/bmp': return true; break;
				default : return false; break;
			}
		}else{
			return false;
		}
		
	}
	
	// 페이지 리스트 출력
	function print_pagelist($page, $list_amount, $page_count, $param) {
	   
	   global $code, $catcode, $orderby;
	   
		if(($page%$list_amount) == 0) $tmp = $page-1;
		else $tmp = $page;
		
		$spage = floor($tmp/$list_amount)*$list_amount+1;
		if($spage <= 1) $ppage = 1;
		else $ppage = $spage - $list_amount;

		$epage = $spage+$list_amount-1;
		if($epage >= $page_count){
			$epage = $page_count;
			$npage = $page_count;
		}else{
			$npage = $epage + 1;
		}
	   
	   echo "    <table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td align='center'>";
	   echo "      <table border='0' cellspacing='0' cellpadding='0'>";
	   echo "        <tr>";
	   echo "          <td width='16'><a href='$PHP_SELF?page=1$param'><img src='/images/arrow_prew2.gif' align=absmiddle border=0'></a></td>";
	   echo "          <td width='16'><a href='$PHP_SELF?page=$ppage$param'><img src='/images/arrow_prew.gif' align=absmiddle border=0'></a></td>";
	   echo "          <td align='center'>&nbsp; ";
	   
	   for($spage; $spage <= $epage; $spage++){
	      if($page == $spage) echo "<b>$spage</b> / ";
	      else echo "<a href='$PHP_SELF?page=$spage$param'> $spage </a> / ";
	   }
	
	   echo "          &nbsp; </td>";
	   echo "          <td width='16'><a href='$PHP_SELF?page=$npage$param'><img src='/images/arrow_next.gif' align=absmiddle border='0'></a></td>";
	   echo "          <td width='16'><a href='$PHP_SELF?page=$page_count$param'><img src='/images/arrow_next2.gif' align=absmiddle border='0'></a></td>";
	   echo "        </tr>";
	   echo "      </table>";
		echo "    </td></tr></table>";
	
	}


	// 이메일 발송
	function send_mail($se_name, $se_email, $re_name, $re_email, $subject, $content, $cc="", $bcc="") {
	
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=euc-kr\r\n";
		$headers .= "From: ".$se_name." <".$se_email.">\r\n";
		$headers .= "To: ".$re_name." <".$re_email.">\r\n";
		$headers .= "Reply-To: ".$se_name." <".$se_email.">\r\n";
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-MSMail-Priority: High\r\n";
		$headers .= "X-Mailer: Just My Server";
	   
	   if($cc) $headers .= "cc: $cc\n";
		if($bcc) $headers .= "bcc: $bcc";
		
		$result = mail( $re_email , $subject , $content , $headers );
		
		return $result;

	}


	// SMS 발송(DACOM인경우 emma 디비에 메세지작성)
	function send_sms($se_num, $re_num, $message) {

		/*
		if($sms_conn == null){
			
			$db_host = "xxx.xxx.xxx.xxx";
			$db_user = "xxxx";
			$db_pass = "xxxx";
			$db_name = "xxxx";
			$sms_conn = mysql_connect($db_host, $db_user, $db_pass);
			mysql_select_db($db_name, $sms_conn);
			
		}
		
		$sql = "insert into em_tran(tran_pr, tran_phone, tran_callback, tran_status, tran_date, tran_msg) values('','$re_num', '$se_num', '1',now(),'$message')";
		mysql_query($sql,$sms_conn) or error(mysql_error());
		*/
		
	}

	function info_replace($shop_info, $re_info, $msg){
		
		global $HTTP_HOST;
		
		$date = date('Y')."년 ".date('m')."월 ".date('d')."일";
		
		$msg = str_replace("{DATE}", $date, $msg);
	   $msg = str_replace("{MEM_ID}", $re_info[id], $msg);
	   $msg = str_replace("{MEM_PW}", $re_info[pw], $msg);
	   $msg = str_replace("{MEM_NAME}", $re_info[name], $msg);
		$msg = str_replace("{SHOP_NAME}", $shop_info->shop_name, $msg);
		$msg = str_replace("{SHOP_EMAIL}", $shop_info->shop_email, $msg);
		$msg = str_replace("{SHOP_TEL}", $shop_info->com_tel, $msg);
		$msg = str_replace("{SHOP_URL}", "http://".$HTTP_HOST, $msg);
		
		return $msg;
		
	}
	
	// 메일내용 생성
	function send_mailsms($type, $re_info, $addmsg) {
		
		global $DOCUMENT_ROOT;
		
		// 관리자 정보 가져오기
		include "$DOCUMENT_ROOT/inc/shop_info.inc";
	
		$se_name = $shop_info->shop_name;
		$se_email = $shop_info->shop_email;
		$se_hand = $shop_info->shop_hand;
		$se_tel = $shop_info->com_tel;
		
		// 메일/sms 발송내용 가져오기
		$sql = "select * from wiz_mailsms where code = '$type'";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_object($result);
		   

	   $subject = $row->email_subj;
	   $sms_msg = $row->sms_msg;
	   $email_msg = $row->email_hmsg.$addmsg.$row->email_fmsg;
	   
		$subject = info_replace($shop_info, $re_info, $subject);
		$sms_msg = info_replace($shop_info, $re_info, $sms_msg);
	   $email_msg = info_replace($shop_info, $re_info, $email_msg);
	   
		if($row->sms_cust == "Y"){
			send_sms($se_tel, $re_info[hphone], $sms_msg);
		}
		if($row->sms_oper == "Y"){
			send_sms($se_tel, $se_hand, $sms_msg);
		}
		if($row->email_cust == "Y"){
			send_mail($se_name, $se_email, $re_info[name], $re_info[email], $subject, $email_msg);
		}
		if($row->email_oper == "Y"){
			send_mail($se_name, $se_email, $se_name, $se_email, $subject, $email_msg);
		}
		
	}

?>
