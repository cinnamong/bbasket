<DIV id=D1 
style="Z-INDEX: 1; LEFT: 914px; VISIBILITY: visible; WIDTH: 74px; POSITION: absolute; TOP: 148px; HEIGHT: 268px" 
name="D1">
<TABLE height=250 cellSpacing=0 cellPadding=0 width=63 border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width=63 height=202>
      <TABLE style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%" 
      cellSpacing=0 borderColorDark=black cellPadding=0 width=75 
      borderColorLight=black>
        <TBODY>
        <TR>
          <TD vAlign=top width=65>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><FONT 
            color=black>
            <DIV id=scroll_recent_p>
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <tr> 
    <td align="center" style="padding:0 0 7 0">

                      <?=$right_banner?></td>
  </tr>
 
                    
                    <TR>
                      <TD>
                    <TR>
                      <TH style="FONT-FAMILY: " align=middle colSpan=2 
                        height=22><IMG id=rviewpdt_img src="/images/54.jpg" 
                        border=0></TH></TR>
                     
                    <TR>
                      <TD vAlign=top align=middle height=1><IMG 
                        style="CURSOR: hand" onclick=ScrollUp() 
                        src="/img/quick_click_up.gif" border=0> </TD></TR></TD></TR>
                    <TR>
                      <TD align=left>
                        <DIV id=cont style="BORDER-RIGHT: #006699 0px solid; BORDER-TOP: #006699 0px solid; LEFT: 0px; OVERFLOW: hidden; BORDER-LEFT: #006699 0px solid; BORDER-BOTTOM: #006699 0px solid; TOP: 0px">
                        <DIV id=inner_row style="Z-INDEX: 1; LEFT: 0px; VISIBILITY: hidden; WIDTH: 200px; POSITION: absolute; TOP: 0px; HEIGHT: 200px">
			<?=$prd_view?>
						<DIV id=inner_line style="VISIBILITY: hidden">
                        <TABLE cellSpacing=0 cellPadding=0 width="80%" 
                        align=center border=0>
                          <TBODY>
                          <TR height=1>
                            <TD style="BACKGROUND-REPEAT: no-repeat" 
                            align=middle></TD></TR></TBODY></TABLE></DIV></DIV></DIV></TD></TR>
                    <TR>
                      <TD height=11>
                    <TR>
                      <TD style="PADDING-TOP: 1px" vAlign=top align=middle height=1><IMG 
                        style="CURSOR: hand" onclick=ScrollDown() 
                        src="/img/quick_click_down.gif" border=0> </TD></TR>
            <SCRIPT language=javascript>
				ScrollPageInit(<?=$viewtotal?>, 4);
			</SCRIPT>
                    </TD></TR>
                    <TR>
                      <TD vAlign=top>
                        <P><IMG height=30 src="/images/57.jpg" width=77 
                        useMap=#ImageMap15 
              border=0></P></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><MAP 
            name=ImageMap14><AREA shape=RECT coords=4,5,74,46 
              href="/center/guide.php"><AREA shape=RECT 
              coords=4,49,73,96 
              href="/bbs/list.php?code=qna"></MAP><MAP 
            name=ImageMap15><AREA shape=RECT coords=19,7,54,23 
              href="/"></MAP></FONT></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<SCRIPT language=JavaScript>
			function CheckUIElements()
			{
			        var yMenu1From, yMenu1To, yOffset, timeoutNextCheck;
			        var wndWidth = parseInt(document.body.clientWidth);
	
		                yMenu1From   = parseInt (D1.style.top, 10);
		                yMenu1To     = document.body.scrollTop + 141; // 위쪽 위치

			        timeoutNextCheck = 500;

			        if ( yMenu1From != yMenu1To ) {
 			               yOffset = Math.ceil( Math.abs( yMenu1To - yMenu1From ) / 20 );
		                if ( yMenu1To < yMenu1From )
		                        yOffset = -yOffset;
		
				D1.style.top = parseInt (D1.style.top, 10) + yOffset;

		                timeoutNextCheck = 10;
		        }

		        setTimeout ("CheckUIElements()", timeoutNextCheck);
			}

			function MovePosition()
			{
		        var wndWidth = parseInt(document.body.clientWidth);
        
		        // 페이지 로딩시 포지션

		                D1.style.top = document.body.scrollTop + 141;

		                D1.style.visibility = "visible";

		        // initializing UI update timer
		        CheckUIElements();

		        return true;
			}

			</SCRIPT>

<SCRIPT language=JavaScript>MovePosition();</SCRIPT>
</DIV>