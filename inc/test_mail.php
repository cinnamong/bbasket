<?
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
	