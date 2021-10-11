function setCookie(cname, cvalue, exdays){
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname){
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function deleteCookie(name){
  if(getCookie(name)){
    document.cookie = name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
  }
}

var elements = document.querySelectorAll('.menu-nav-dropdown-item');

elements.forEach((element, i) => {
  element.onclick = function(){
    var id = element.getAttribute('data-id');

    var dropdown = document.getElementById(id);

    if(!dropdown.classList.contains('active')){
      dropdown.classList.add('active');
      element.classList.add('selected');
    } else {
      dropdown.classList.remove('active');
      element.classList.remove('selected');
    }
  }
});

var viewBtn = document.querySelector('.viewBtn');

if(viewBtn){
  var url = viewBtn.getAttribute('data-url');
  var editBtn = document.getElementById('edit');

  viewBtn.onclick = function(){
    editBtn.click();
    setCookie('viewpage', 'true', 1);
  }

  if(getCookie('viewpage')){
    window.open(url, 'child');
    deleteCookie('viewpage');
  }
}

$('.alert').alert();
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

var canCopy = document.querySelectorAll('.can-copy');

canCopy.forEach((copy, i) => {
  copy.onclick = function(){
    var copyText = copy.getAttribute('data-copy');

    navigator.clipboard.writeText(copyText);
  }
});

var menuActive = false;
var toggler = document.querySelector('.menu-toggler');
var menu = document.querySelector('.menu');

toggler.onclick = function(){
  if(!menuActive){
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
}

// var textareas = document.querySelectorAll('textArea');
//
// textareas.forEach((textarea, i) => {
//   textarea.addEventListener('keydown', function(e) {
//     if (e.key == 'Tab') {
//       e.preventDefault();
//       var start = this.selectionStart;
//       var end = this.selectionEnd;
//
//       this.value = this.value.substring(0, start) +
//         "\t" + this.value.substring(end);
//
//       this.selectionStart =
//         this.selectionEnd = start + 1;
//     }
//   });
// });
