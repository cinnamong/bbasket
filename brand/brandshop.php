<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; <b>브랜드 샵</b>";
$page_type = "brand shop";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
<!-- ImageReady Slices (brandshop.psd) -->
<TABLE WIDTH=700 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD COLSPAN=3>
			<IMG SRC="images/brandshop_01.gif" WIDTH=700 HEIGHT=62 ALT=""></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='최고만을 고집하는 엄마와 아기의 유모차, 맥클라렌';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_02.gif" WIDTH=263 HEIGHT=65 BORDER=0 ALT="최고급 명품 유모차, 맥클라렌, 핸들링, 한손으로 접고 펴는 유모차"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='이탈리아 명품 유모차, 잉글레시나';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_03.gif" WIDTH=178 HEIGHT=65 BORDER=0 ALT="이태리 명품 유모차, 한손으로 접고 펴는 유모차, 지피"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='이탈리아 명품 유모차, 뻬그뻬레고';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_04.gif" WIDTH=259 HEIGHT=65 BORDER=0 ALT="이태리 명품 유모차, 초경량 유모차, 안정성, 한손으로 접고 펴는 유모차"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='DHA와 ARA를 함유하여 모유에 가까운 분유, 엔파밀';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_05.gif" WIDTH=263 HEIGHT=65 BORDER=0 ALT="엔파밀 리필, 미국내수용분유, 미국직배송, 유기농분유, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='균형잡힌 내아기의 영양식, 씨밀락';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_06.gif" WIDTH=178 HEIGHT=65 BORDER=0 ALT="씨밀락, 미국내수용분유, 미국직배송, 유기농분유, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='이유식에서 수유용품까지 건강한 시작, 거버베이비';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_07.gif" WIDTH=259 HEIGHT=65 BORDER=0 ALT="거버, 이유식, 유기농 이유식, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='내 아기의 연약한 피부를 위한 스킨케어, 캘리포니아 베이비';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_08.gif" WIDTH=263 HEIGHT=64 BORDER=0 ALT="식물성 대체원료, 유기농, 천연원료, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='현명한 엄마들의 이유있는 사치, 페투니아 피클 바톰';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_09.gif" WIDTH=178 HEIGHT=64 BORDER=0 ALT="명품 기저귀 가방, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='베이비 비욘';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_10.gif" WIDTH=259 HEIGHT=64 BORDER=0 ALT="신생아, 수유세트, 유아용품의 선두주자, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, IQ, EQ 증진, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='75년 명성의 장난감 브랜드, 피셔프라이스';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_11.gif" WIDTH=263 HEIGHT=66 BORDER=0 ALT="아기장난감, 러닝홈, 바운서, 학습 장난감, IQ, EQ 증진, 배우는 놀이기구, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='내아이를 아인슈타인으로 키우자, 베이비 아인슈타인';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_12.gif" WIDTH=178 HEIGHT=66 BORDER=0 ALT="아기장난감, 러닝홈, 바운서, 학습 장난감, IQ, EQ 증진, 배우는 놀이기구, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='작은 사랑의 시작, 타이니 러브';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_13.gif" WIDTH=259 HEIGHT=66 BORDER=0 ALT="아기장난감, 러닝홈, 바운서, 학습 장난감, IQ, EQ 증진, 배우는 놀이기구, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='바비같은 내딸의 장난감, 바비';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_14.gif" WIDTH=263 HEIGHT=65 BORDER=0 ALT="어린이 장난감, 바비인형, 드레스, 외출, 화장, 악세서리, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='신생아부터 청소년기까지 성장발달을 도와주는 명품 장난감, 립프로그';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_15.gif" WIDTH=178 HEIGHT=65 BORDER=0 ALT="수상, 아기장난감, 러닝홈, 바운서, 학습 장난감, IQ, EQ 증진, 배우는 놀이기구, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='아기와 엄마의 행복한 세상, 아벤트';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_16.gif" WIDTH=259 HEIGHT=65 BORDER=0 ALT="아벤트 와이드젖병, 와이드 젖꼭지, 배앓이 방지 젖병, 젖병소독, 유아용품의 선두주자, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, IQ, EQ 증진, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='젖병도 과학이다! 명품수유용품, 닥터브라운';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_17.gif" WIDTH=263 HEIGHT=65 BORDER=0 ALT="과학적인 젖병, 배앓이 방지 젖병, 젖병소독, 유아용품의 선두주자, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, IQ, EQ 증진, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='명품 수유용품, 플레이텍스';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_18.gif" WIDTH=178 HEIGHT=65 BORDER=0 ALT="신생아, 수유세트, 벤트에어, 배앓이 방지 젖병, 젖병소독, 유아용품의 선두주자, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, IQ, EQ 증진, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='유리젖병의 명품, 이븐플로';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_19.gif" WIDTH=259 HEIGHT=65 BORDER=0 ALT="유리젖병, 신생아, 수유세트, 배앓이 방지 젖병, 젖병소독, 유아용품의 선두주자, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, IQ, EQ 증진, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
	</TR>
	<TR>
		<TD>
			<A HREF="#"
				ONMOUSEOVER="window.status='가장 소중한 내아기의 첫 일년, 퍼스트 이어스와 함께 하세요!';  return true;"
				ONMOUSEOUT="window.status='';  return true;">
				<IMG SRC="images/brandshop_20.gif" WIDTH=263 HEIGHT=67 BORDER=0 ALT="유아용품, 장난감, 수유용품, 엄마들이 가장 사랑하는, 아기들이 가장좋아하는 젖병, 젖꼭지, 러닝홈, 바운서, 학습 장난감, IQ, EQ 증진, 배우는 놀이기구, 학습, 발달, 성장, 미국내수용, 미국직배송, 빠른배송, 3일배송보장"></A></TD>
		<TD>
			<IMG SRC="images/brandshop_21.gif" WIDTH=178 HEIGHT=67 ALT=""></TD>
		<TD>
			<IMG SRC="images/brandshop_22.gif" WIDTH=259 HEIGHT=67 ALT=""></TD>
	</TR>
	<TR>
		<TD COLSPAN=3>
			<IMG SRC="images/brandshop_23.gif" WIDTH=700 HEIGHT=80 ALT=""></TD>
	</TR>
</TABLE>
<!-- End ImageReady Slices -->
<?

include "../inc/footer.inc"; 		// 하단디자인

?>
