import IMask from 'imask';

const body = document.querySelector('body');

// Секция Отвечаем на вопросы аккордеон
const faqSection = document.querySelector('.faq-section');

if (faqSection) {
  const questionsItems = faqSection.querySelectorAll('.questions-item');

  questionsItems.forEach((item) => {
    item.onclick = function() {
      item.classList.toggle('active');
    }
  });
}


// Current year
const now = new Date();
const year = now.getFullYear();

const currentYear = document.getElementById('current-year');
currentYear.innerText = year;


// Input phone mask
function inputPhoneMask() {
  const elementPhone = document.querySelectorAll('.js-input-phone-mask');

  const maskOptionsPhone = {
    mask: '+{7} (000) 000 00 00'
  };

  elementPhone.forEach((item) => {
    const mask = IMask(item, maskOptionsPhone);
  });
}

inputPhoneMask();


// Окна
const modalWindows = document.querySelectorAll('.modal-window');
const callbackModalBtns = document.querySelectorAll('.js-callback-modal-btn');
const callbackModal = document.querySelector('#callback-modal');
const testimonialModalBtns = document.querySelectorAll('.js-testimonial-modal-btn');
const testimonialModal = document.querySelector('#testimonial-modal');
const modalCloseBtns = document.querySelectorAll('.modal-window .modal-close');

callbackModalBtns.forEach((item) => {
  item.onclick = function () {
    modalWindowOpen(callbackModal);
  }
});

testimonialModalBtns.forEach((item) => {
  item.onclick = function () {
    modalWindowOpen(testimonialModal);
  }
});

function modalWindowOpen(win) {
  // Открытие окна
  body.classList.add('overflow-hidden');
  win.classList.add('active');
  setTimeout(function(){
    win.childNodes[1].classList.add('active');
  }, 200);
}

for (let i=0; i < modalCloseBtns.length; i++) {
  modalCloseBtns[i].onclick = function() {
    modalWindowClose(modalWindows[i]);
  }
}

for (let i = 0; i < modalWindows.length; i++) {
  modalWindows[i].onclick = function(event) {
    let classList = event.target.classList;
    for (let j = 0; j < classList.length; j++) {
      if (classList[j] == "modal" || classList[j] == "modal-wrapper" || classList[j] == "modal-window") {
        modalWindowClose(modalWindows[i])
      }
    }
  }
}

function modalWindowClose(win) {
  body.classList.remove('overflow-hidden');
  win.childNodes[1].classList.remove('active');
  setTimeout(() => {
    win.classList.remove('active');
  }, 300);
}


// Set cookie
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/" + "; sameSite=Lax;";
}

function getCookie(name) {
  let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function checkCookies() {
  let cookieNote = document.querySelector('#cookie_note');
  let cookieBtnAccept = cookieNote.querySelector('#cookie_accept');

  // Если куки we-use-cookie нет или она просрочена, то показываем уведомление
  if (!getCookie('we-use-cookie')) {
    cookieNote.classList.add('active');
  }

  // При клике на кнопку устанавливаем куку we-use-cookie на один год
  cookieBtnAccept.addEventListener('click', function () {
    setCookie('we-use-cookie', 'true', 365);
    cookieNote.classList.remove('active');
  });
}

checkCookies();