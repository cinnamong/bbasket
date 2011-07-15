<?
/******************************************************************************
 * Wizshop library
 *
 * ������ �������� : 2005. 6. 15
 *
 * by FEEL (feel@wizshop.net)
 *
 ******************************************************************************/
	
	// ���ڿ� ���� (�̻��� �����϶��� ... �� ǥ��)
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



	// ȸ��������
	function user_level($level) {
		
		if($level == "AM") $level = "������";
		else if($level == "BM") $level = "�ΰ�����";
		else if($level == "CM") $level = "���ȸ��";
		else if($level == "DM") $level = "��ȸ��";
		else if($level == "EM") $level = "�Ϲ�ȸ��";
		else $level = "��ȸ��";
		
		return $level;
	}

	// �������
	function pay_method($pay_method) {
	   
	   if($pay_method == "PB") $pay_method = "�������Ա�";
	   else if($pay_method == "PC") $pay_method = "�ſ�ī��";
	   else if($pay_method == "PH") $pay_method = "�޴���";
	   
	   return $pay_method;
	}

	// ��ۻ���
	function order_status($status){
	   
	   if($status == "OR") $status = "�ֹ�����";
	   else if($status == "OY") $status = "�����Ϸ�";
	   else if($status == "DR") $status = "����غ���";
	   else if($status == "DI") $status = "�����";
	   else if($status == "DC") $status = "��ۿϷ�";
	   else if($status == "OC") $status = "�ֹ����";
	   else if($status == "RD") $status = "ȯ�ҿ�û";
	   else if($status == "RC") $status = "ȯ�ҿϷ�";
	   else if($status == "CD") $status = "��ȯ��û";
	   else if($status == "CC") $status = "��ȯ�Ϸ�";

	   return $status;
	}

	// ����, �弳üũ
	function check_abuse($str){
		
		global $bbs_info;
	
		$abuse_list = explode(",",$bbs_info->abtxt);
		for($ii=0; $ii < count($abuse_list); $ii++){
			$abuse_list[$ii] = trim($abuse_list[$ii]);
			if(!empty($abuse_list[$ii])){
				if( strpos($str, $abuse_list[$ii]) !== false){
					error("'$abuse_list[$ii]' �ܾ�� ����Ͻ� �� �����ϴ�.");
				}
			}
		}
	
	}

	// ��ǰ�̹��� ��������
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

	
	// ����Խ��� �̹��� ��������
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
	
	// ������ �̹�������
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
	
	// ������ ����Ʈ ���
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


	// �̸��� �߼�
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


	// SMS �߼�(DACOM�ΰ�� emma ��� �޼����ۼ�)
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
		
		$date = date('Y')."�� ".date('m')."�� ".date('d')."��";
		
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
	
	// ���ϳ��� ����
	function send_mailsms($type, $re_info, $addmsg) {
		
		global $DOCUMENT_ROOT;
		
		// ������ ���� ��������
		include "$DOCUMENT_ROOT/inc/shop_info.inc";
	
		$se_name = $shop_info->shop_name;
		$se_email = $shop_info->shop_email;
		$se_hand = $shop_info->shop_hand;
		$se_tel = $shop_info->com_tel;
		
		// ����/sms �߼۳��� ��������
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