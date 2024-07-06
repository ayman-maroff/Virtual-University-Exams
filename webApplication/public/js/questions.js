let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let table = document.querySelector(".content-table");

sidebar.classList.toggle("open");
menuBtnChange();//calling the function(optional)
questionsFocus();
closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
  tablePosition();
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}
function tablePosition(){
  if(sidebar.classList.contains("open")){
    document.querySelector(".content-table").style.marginLeft = 260+"px" ;    
  }else {
    document.querySelector(".content-table").style.marginLeft = 100+"px" ;    
  }
}
function questionsFocus(){
    document.querySelector("#question").style.color = "#11101D" ; 
    document.querySelector(".sidebar :nth-child(4) a").style.backgroundColor = "#fff" ; 
    document.querySelector(".sidebar :nth-child(4) a i").style.color = "#1e2441" ; 
}