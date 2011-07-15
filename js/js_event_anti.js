//========================================*/ 
//==== 오른쪽 마우스 버튼 막기 
function js_event_anti_right(e) { 
 evt = e || event; 
    try{ 
  if (document.all){ 
  if(evt.button == 2 || evt.button == 3) {    
 alert('행복을 전하는 쇼핑몰 브라운 바스켓!');  
    js_event_anti_stop_event(evt); 
    return false;    } 
  }else { 
  if(evt.which == 3 || evt.which == 2) {  
 alert('행복을 전하는 쇼핑몰 브라운 바스켓!');  
    js_event_anti_stop_event(evt); 
    return false; } 
  } 
    }catch(ex){ 
  return false; 
    } 
} 
//==== 키보드 입력 막기 
function js_event_anti_processKey(e){ 
 evt = e || event; 
 alert('행복을 전하는 쇼핑몰 브라운 바스켓!'); 
  try{ 
  js_event_anti_stop_event(evt); 
  return false; 
    }catch(ex){ 
  return false; 
    } 
} 
//==== 이벤트 동작 무시! 
function js_event_anti_stop_event(evt){ 
 if(window.event){ 
 window.event.keyCode = 0; 
 window.event.cancelBubble = true; 
 window.event.returnValue = true;    
 }else{ 
 evt.stopPropagation(); 
 evt.preventDefault(); 
 evt.initEvent; 
 } 
 return false; 
} 
//==== 기본안티 이벤트 등록(오른쪽마우스,드래그,키입력) 
function js_event_anti(this_s){ 
//문제점 : FF에서는 드래그 이벤트를 제어할 수 없다. 
 if(!this_s){this_s = window.document;} 
 if(document.attachEvent){ 
 this_s.attachEvent("onkeydown", js_event_anti_processKey ); 
 this_s.attachEvent("onmousedown", js_event_anti_right ); 
 this_s.attachEvent("onselectstart", js_event_anti_stop_event ); 
 this_s.attachEvent("ondragstart", js_event_anti_stop_event ); 
 this_s.attachEvent("oncontextmenu", js_event_anti_stop_event ); 
 } 
 else{ 
 window.captureEvents(Event.MOUSEDOWN); 
 window.captureEvents(Event.ONKEYDOWN); 
 window.captureEvents(Event.ONCONTEXTMENU);
 this_s.addEventListener("keydown", js_event_anti_processKey , false); 
 this_s.addEventListener("mousedown", js_event_anti_right , false); 
 this_s.addEventListener("dragstart", js_event_anti_stop_event , false);  //FF에서 지원되지 않는다. 
 this_s.addEventListener("selectstart", js_event_anti_stop_event , false);  //FF에서 지원되지 않는다. 
 this_s.addEventListener("contextmenu", js_event_anti_stop_event , false); 
 //대신 사용 사트일 적용
 window.document.body.style.MozUserFocus='ignoure';
 window.document.body.style.MozUserInput='disabled';
 window.document.body.style.MozUserSelect='none';
 this_s.addEventListener("contectmenu",js_event_anti_stop_event,false);
 
 } 
} 