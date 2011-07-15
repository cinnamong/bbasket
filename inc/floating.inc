      <SCRIPT language=JavaScript type=text/javascript>
<!--
   self.onError=null;
	currentX = 0;
	currentY = 0;
	whichIt = null; 
	lastScrollX = 0; lastScrollY = 0;
	NS = (document.layers) ? 1 : 0;
	IE = (document.all) ? 1: 0;
	
	function heartBeat() {
	
	if(document.all.scrollingBanner != null){
		if(IE) { 
			diffY = document.body.scrollTop; 
			diffX = 0; 
		}
		if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }
		if(diffY != lastScrollY) {
			percent = .05 * (diffY - lastScrollY);
			if(percent > 0) percent = Math.ceil(percent);
			else percent = Math.floor(percent);
			if(IE) document.all.scrollingBanner.style.pixelTop += percent;
			if(NS) document.scrollingBanner.top += percent; 
			lastScrollY = lastScrollY + percent;
		}
		if(diffX != lastScrollX) {
			percent = .05 * (diffX - lastScrollX);
			if(percent > 0) percent = Math.ceil(percent);
			else percent = Math.floor(percent);
			if(IE) document.all.scrollingBanner.style.pixelLeft += percent;
			if(NS) document.scrollingBanner.top += percent;
			lastScrollY = lastScrollY + percent;
		}
	}
	} 
	if(NS || IE) action = window.setInterval("heartBeat()",1);
//-->
</SCRIPT>
		  <TD vAlign=top>
            <DIV id=scrollingBanner 
            style="Z-INDEX: 1; ; LEFT: expression(document.body.clientWidth/2+455); POSITION: absolute; TOP: 90px">
            <TABLE cellSpacing=0 cellPadding=0 width=700 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE cellSpacing=0 cellPadding=0 width=80 border=0>
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" 
border=0>
                          <TBODY>
                          <TR>
                            <TD align=middle height=60>클릭한 상품이 
                          없습니다.</TD></TR></TBODY></TABLE>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" 
border=0>
                          <TBODY>
                          <TR>
                            <TD width="25%"><A 
                              href="/?v_page=1"><IMG 
                              src="images/arrow_prew.gif" border=0></A></TD>
                            <TD align=middle width="50%"><A 
                              href="/shop/view_clear.php?prev=/index.php"><FONT 
                              color=red>삭제</FONT></A></TD>
                            <TD align=right width="25%"><A 
                              href="/?v_page=0"><IMG 
                              src="images/arrow_next.gif" 
                          border=0></A></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></TD></TR></TABLE>