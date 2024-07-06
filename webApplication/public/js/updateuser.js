$("#profileImage").click(function (e) {
    $("#imageUpload").click();
  });
  
  function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
      $('#profileImage').attr('src',
        window.URL.createObjectURL(uploader.files[0]));
    }
  }
  
  $("#imageUpload").change(function () {
    fasterPreview(this);
  });
  
  function getData(e) {
    e.preventDefault();
  }
  
  
  function manage(form) {
    var bt = document.getElementById('submit');
    var ele = document.getElementsByTagName('input'); 
  
    for (i = 0; i < ele.length; i++) {
        if ((ele[i].type == 'text'||ele[i].type == 'email') && ele[i].value == '') {
           bt.disabled = true;    
            return false;
        }
           else{ 
            document.getElementById('submit').title="";
           bt.disabled = false;
        }        
    }
}
  
  