const name = document.getElementById('name')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
  let messages = [];
  let passwordStrengthSpans = document.querySelectorAll(".pw-meter .pw-strength span");

  if(passwordStrengthSpans[0].innerText == 'Strong'){
    messages.push('Log-in succeeded');
  }
  else{
    messages.push('Log-in failed');
  }
  if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
  }
})


function swap_eye(){
  var img1,img2;
  img1=document.getElementById('eye-slash-img').src;
  img2=document.getElementById('eye-img').src;
  document.getElementById('eye-img').src =img1;
  document.getElementById('eye-slash-img').src=img2;

}


function getPasswordStrength(password){
  let s = 0;
  if(password.length > 6){
    s++;
  }
  if(password.length > 10){
    s++;
  }
  if(/[A-Z]/.test(password)){
    s++;
  }
  if(/[0-9]/.test(password)){
    s++;
  }
  if(/[^A-Za-z0-9]/.test(password)){
    s++;
  }
  return s;
}
document.querySelector(".pw-meter #password").addEventListener("focus",function(){
  document.querySelector(".pw-meter .pw-strength").style.display = "block";
});
document.querySelector(".pw-meter .pw-display-toggle-btn").addEventListener("click",function(){
  let el = document.querySelector(".pw-meter .pw-display-toggle-btn");
  if(el.classList.contains("active")){
    document.querySelector(".pw-meter #password").setAttribute("type","password");
    el.classList.remove("active");

    swap_eye();
    
    
  } else {
    document.querySelector(".pw-meter #password").setAttribute("type","text");
    el.classList.add("active");
    
    swap_eye();
  }
});

document.querySelector(".pw-meter #password").addEventListener("keyup",function(e){
  let password = e.target.value;
  let strength = getPasswordStrength(password);
  let passwordStrengthSpans = document.querySelectorAll(".pw-meter .pw-strength span");
  strength = Math.max(strength,1);
  passwordStrengthSpans[1].style.width = strength*20 + "%";
  if(strength < 2){
    passwordStrengthSpans[0].innerText = "Weak";
    passwordStrengthSpans[0].style.color = "#111";
    passwordStrengthSpans[1].style.background = "#d13636";
  } else if(strength >= 2 && strength <= 4){
    passwordStrengthSpans[0].innerText = "Medium";
    passwordStrengthSpans[0].style.color = "#111";
    passwordStrengthSpans[1].style.background = "#e6da44";
  } else {
    passwordStrengthSpans[0].innerText = "Strong";
    passwordStrengthSpans[0].style.color = "#fff";
    passwordStrengthSpans[1].style.background = "#20a820";
  }
});