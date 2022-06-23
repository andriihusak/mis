const btnToggle=document.querySelector(".toogle_bar"),
      arrow=document.querySelector(".bxs-chevron-down"),
      dropdown=document.querySelector(".dropmenu");

    btnToggle.addEventListener("click", ()=>{
        dropdown.classList.toggle("dropmenu_active");
        if (dropdown.classList.contains("dropmenu_active")){
            arrow.classList.replace("bxs-chevron-down" , "bxs-chevron-up");
        }else{
            arrow.classList.replace("bxs-chevron-up" , "bxs-chevron-down");
        }
    });