var $ = document.querySelector.bind(document);

function show(c) {
    $("."+c+".hidden").classList.remove("hidden");
}
function hide(c) {
    $("."+c).classList.add("hidden");
}