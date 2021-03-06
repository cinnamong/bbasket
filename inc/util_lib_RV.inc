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

	// 이미지 리사이즈
	function img_resize($srcimg, $dstimg, $imgpath, $rewidth, $reheight)
	{
		
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
