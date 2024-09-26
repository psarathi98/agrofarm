const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {

    toggleRootClass();
    toggleLocalStorage();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'light' ? 'dark' : 'light';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("dark");
    }else{
        localStorage.setItem("dark","set");
    }
}

function isLight(){
    return localStorage.getItem("dark");
}

if(isLight()){
    toggleRootClass();
}