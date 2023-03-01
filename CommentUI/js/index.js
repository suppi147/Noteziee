function deleteID (id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', 'http://localhost/Noteziee/MainController/MainRail.php');
    
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
    