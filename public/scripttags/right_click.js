$.ajax({
    url: "test.html",
    context: document.body
}).done(function() {
    $( this ).addClass( "done" );
});
// right click disabled
document.addEventListener('contextmenu', event => event.preventDefault());
// console.log('hello');
// document.addEventListener('copy paste cut', event => event.preventDefault());

document.onkeydown = function (e) {
    return false; // shortcut-keys disabled
}

document.ondragstart = function () {
    return false; //disable draggable
}
