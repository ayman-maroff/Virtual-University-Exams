   
    
    
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");
    let table = document.querySelector(".content-table");
    
        
    let toggle = document.querySelector(".toggle");
    let text = document.querySelector(".tg_text");
   
    
    // sidebar.classList.toggle("open");
    // menuBtnChange();//calling the function(optional)
    // usersFocus();

    //////////////////////////////////////////////////////////////////////////

    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();//calling the function(optional)
      tablePosition();
      RegisterButtonPosition();
    });
    
    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });
    //////////////////////////////////////////////////////////////////////////
    
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
    function RegisterButtonPosition(){
      if(sidebar.classList.contains("open")){
        document.querySelector(".main__btn").style.marginLeft = 260+"px" ;    
      }else {
        document.querySelector(".main__btn").style.marginLeft = 100+"px" ;    
      }
    }
    function usersFocus(){
        document.querySelector("#users").style.color = "#11101D" ; 
        document.querySelector(".sidebar :nth-child(5) a").style.backgroundColor = "#fff" ; 
        document.querySelector(".sidebar :nth-child(5) a i").style.color = "#1e2441" ; 
    }
  
  function editt()
    {
      document.getElementById("addform").style.display="block";   
      var Row = document.getElementById("tr");
      var Cells = Row.getElementsById("one");
      const name= document.getElementById("coursename");
      name.value = Cells[0].innerText;
    } 
   
   function addcourse()
  
  {
    document.getElementById("addform").style.display="block";   
  
  }
  function addtopic()
  
  {
    
    document.getElementById("topic").style.display="block";   
  
  }
    
  function closecourse()
  
  {
    alert("The course has been successfully added");
    document.getElementById("submit_btn").style.display="none";   
  
  }
  
 function addcenter()

{
  document.getElementById("addform").style.display="block";   

}

  
function closecenter()

{
 
  document.getElementById("submit_btn").style.display="none";   

}
    
    
     
function animated(){
    toggle.classList.toggle("active");

    if(toggle.classList.contains("active")){
        text.innerHTML = "ON";
    }
    else{
        text.innerHTML = "OFF";
    }

}

function alert_delete(){
    alert("Deleted  ?");
    }
 