<?
include "../inc/global.inc";

if(empty($_POST[shop_id])) error("아이디를 입력하세요.");

if(empty($_POST[shop_pw])) error("비밀번호를 입력하세요.");

$sql = "select * from wiz_shopinfo where shop_id = '$shop_id' and shop_pw = '$shop_pw'";
//echo $sql;
$result = mysql_query($sql) or error("관리자인증시 에러가 발생하였습니다.");

if($row = mysql_fetch_object($result)){
   
   // 관리자 정보 쿠키저장(세션시 시간경과후 로그아웃됨)
   setcookie("wizadmin_session[shop_id]",$row->shop_id);
   setcookie("wizadmin_session[shop_pw]",$row->shop_pw);
   setcookie("wizadmin_session[shop_name]",$row->shop_name);
   setcookie("wizadmin_session[shop_email]",$row->shop_email);
   setcookie("wizadmin_session[shop_tel]",$row->com_tel);
 
   Header("Location: main/main.php");
   
}else{
   
   error("아이디와 비밀번호가 맞지 않습니다.");
   
}
?>