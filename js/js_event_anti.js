//========================================*/ 
//==== ������ ���콺 ��ư ���� 
function js_event_anti_right(e) { 
 evt = e || event; 
    try{ 
  if (document.all){ 
  if(evt.button == 2 || evt.button == 3) {    
 alert('�ູ�� ���ϴ� ���θ� ���� �ٽ���!');  
    js_event_anti_stop_event(evt); 
    return false;    } 
  }else { 
  if(evt.which == 3 || evt.which == 2) {  
 alert('�ູ�� ���ϴ� ���θ� ���� �ٽ���!');  
    js_event_anti_stop_event(evt); 
    return false; } 
  } 
    }catch(ex){ 
  return false; 
    } 
} 
//==== Ű���� �Է� ���� 
function js_event_anti_processKey(e){ 
 evt = e || event; 
 alert('�ູ�� ���ϴ� ���θ� ���� �ٽ���!'); 
  try{ 
  js_event_anti_stop_event(evt); 
  return false; 
    }catch(ex){ 
  return false; 
    } 
} 
//==== �̺�Ʈ ���� ����! 
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
//==== �⺻��Ƽ �̺�Ʈ ���(�����ʸ��콺,�巡��,Ű�Է�) 
function js_event_anti(this_s){ 
//������ : FF������ �巡�� �̺�Ʈ�� ������ �� ����. 
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
 this_s.addEventListener("dragstart", js_event_anti_stop_event , false);  //FF���� �������� �ʴ´�. 
 this_s.addEventListener("selectstart", js_event_anti_stop_event , false);  //FF���� �������� �ʴ´�. 
 this_s.addEventListener("contextmenu", js_event_anti_stop_event , false); 
 //��� ��� ��Ʈ�� ����
 window.document.body.style.MozUserFocus='ignoure';
 window.document.body.style.MozUserInput='disabled';
 window.document.body.style.MozUserSelect='none';
 this_s.addEventListener("contectmenu",js_event_anti_stop_event,false);
 
 } 
} 