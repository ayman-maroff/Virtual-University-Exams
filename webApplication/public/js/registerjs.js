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
    password1 = form.password1.value;
    password2 = form.password2.value;
  
    for (i = 0; i < ele.length; i++) {
        if ((ele[i].type == 'text'|| ele[i].type == 'password'||ele[i].type == 'email') && ele[i].value == '') {
            bt.disabled = true;    
            return false;
        }
        else {
         
           if (password1 != password2) {
            document.getElementById('submit').title="check retype password!";
            bt.disabled = true;
          }
           else{ 
             if(password1 !="")
            document.getElementById('submit').title="";
             bt.disabled = false;}  
        }
    }
  }
  
  
  
  
  function getPasswordStrength(password) {
    let s = 0;
    if (password.length > 6) {
      s++;
    }
    if (password.length > 10) {
      s++;
    }
    if (/[A-Z]/.test(password)) {
      s++;
    }
    if (/[0-9]/.test(password)) {
      s++;
    }
    if (/[^A-Za-z0-9]/.test(password)) {
      s++;
    }
    return s;
  }
  document.querySelector(".pw-meter #password").addEventListener("focus", function () {
    document.querySelector(".pw-meter .pw-strength").style.display = "block";
  });
  document.querySelector(".pw-meter .pw-display-toggle-btn").addEventListener("click", function () {
    let el = document.querySelector(".pw-meter .pw-display-toggle-btn");
    if (el.classList.contains("active")) {
      document.querySelector(".pw-meter #password").setAttribute("type", "password");
      el.classList.remove("active");
    } else {
      document.querySelector(".pw-meter #password").setAttribute("type", "text");
      el.classList.add("active");
    }
  });
  
  document.querySelector(".pw-meter #password").addEventListener("keyup", function (e) {
    let password = e.target.value;
    let strength = getPasswordStrength(password);
    let passwordStrengthSpans = document.querySelectorAll(".pw-meter .pw-strength span");
    strength = Math.max(strength, 1);
    passwordStrengthSpans[1].style.width = strength * 20 + "%";
    if (strength < 2) {
      passwordStrengthSpans[0].innerText = "Weak";
      passwordStrengthSpans[0].style.color = "#111";
      passwordStrengthSpans[1].style.background = "#d13636";
    } else if (strength >= 2 && strength <= 4) {
      passwordStrengthSpans[0].innerText = "Medium";
      passwordStrengthSpans[0].style.color = "#111";
      passwordStrengthSpans[1].style.background = "#e6da44";
    } else {
      passwordStrengthSpans[0].innerText = "Strong";
      passwordStrengthSpans[0].style.color = "#fff";
      passwordStrengthSpans[1].style.background = "#20a820";
    }
  });
  