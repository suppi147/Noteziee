function deleteID (id) {
  var form = document.createElement('form');
  form.setAttribute('method', 'post');
  form.setAttribute('action', 'http://localhost/Noteziee/ZieeAPI/ZieeAPI.php');
  
  var input=document.createElement('input');
  input.hidden=true;
  input.setAttribute('name','id');
  input.setAttribute('value',id);
  form.appendChild(input);

  var input2=document.createElement('input');
  input2.hidden=true;
  input2.setAttribute('name','control_flag');
  input2.setAttribute('value','delete');
  form.appendChild(input2);

  
  document.body.appendChild(form);
  form.submit();
  
}

function ReceiveEnter(){
  var input = document.getElementById("commentContent");
  input.addEventListener("keypress", function(event) {
  if (event.key === "Enter" && !event.shiftKey) {
      event.preventDefault();
      document.getElementById("submit").click();
  }
  });
}
function ToggleOn1(checkID){
  var checkboxes = document.querySelectorAll('input[id="'+checkID+'"]');
  if(checkboxes[0].checked==false){
    checkboxes[0].checked=true;
  }

}
function UntoggleOn1(checkID){
  var checkboxes = document.querySelectorAll('input[id="'+checkID+'"]');
  if(checkboxes[0].checked==true){
    checkboxes[0].checked=false;
  }
  const xhttp= new XMLHttpRequest();
  xhttp.open("POST","http://localhost/Noteziee/ZieeAPI/ZieeAPI.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("control_flag=select&id="+checkID+"&checker="+checkboxes[0].checked);
}

function SelectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var allCheckFlag=false;
    for (var i = 0; i < checkboxes.length; i++) {
      if(checkboxes[i].checked == true)
        continue;
      allCheckFlag=true;
      break;
  }
    for (var i = 0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked == true&&allCheckFlag==true)
          continue;  
        if (checkboxes[i].checked == false)
            checkboxes[i].checked = true;
        else
            checkboxes[i].checked = false;
    }

  const xhttp= new XMLHttpRequest();
  xhttp.open("POST","http://localhost/Noteziee/ZieeAPI/ZieeAPI.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("control_flag=selectAll&checker="+checkboxes[0].checked);
}

function ChecklistArray(checkID){
  const xhttp= new XMLHttpRequest();
  var checkboxes = document.querySelectorAll('input[id="'+checkID+'"]');
  
    xhttp.open("POST","http://localhost/Noteziee/ZieeAPI/ZieeAPI.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("control_flag=select&id="+checkID+"&checker="+checkboxes[0].checked);
}

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("class","alert alert-success");
 el.setAttribute("style","position:fixed;top:80%;left:1%;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
function CopyToClipboard(element) {
  var $temp = $("<textarea>");
  var brRegex = /<br\s*[\/]?>/gi;
  $("body").append($temp);
  $temp.val($(element).html().replace(brRegex, "\r\n")).select();
  document.execCommand("copy");
  $temp.remove();
}


function emptyAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("class","alert alert-warning");
 el.setAttribute("style","position:fixed;top:80%;left:1%;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
function IsEmpty() {
  if (document.getElementById('commentContent').value === "") {
    emptyAlert("No comment entered!!!",1000);
    return false;
  }
  return true;
}

function changeText(element) {
  var disappear = $("#disappear");
$("#text").hover(function(){
	disappear.hide();
}, function() {
	disappear.show();
});
}
function CustomAlert(){
  this.alert = function(message,title){
    document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';

    let dialogoverlay = document.getElementById('dialogoverlay');
    let dialogbox = document.getElementById('dialogbox');
    
    let winH = window.innerHeight;
    dialogoverlay.style.height = winH+"px";
    
    dialogbox.style.top = "100px";

    dialogoverlay.style.display = "block";
    dialogbox.style.display = "block";
    
    document.getElementById('dialogboxhead').style.display = 'block';

    if(typeof title === 'undefined') {
      document.getElementById('dialogboxhead').style.display = 'none';
    } else {
      document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
    }
    document.getElementById('dialogboxbody').innerHTML = message;
    document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
  }
  
  this.ok = function(){
    document.getElementById('dialogbox').style.display = "none";
    document.getElementById('dialogoverlay').style.display = "none";
  }
}

let customAlert = new CustomAlert();