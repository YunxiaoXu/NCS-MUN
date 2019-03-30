var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);

function show(c) {
    $$("."+c+".hidden").forEach(e=>{
        e.classList.remove("hidden");
    })
}
function hide(c) {
    $$("."+c).forEach(e=>{
        e.classList.add("hidden");
    });
}