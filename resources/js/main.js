import IMask from 'imask';

const body = document.querySelector('body');


// Слайдер на главной странице
const homePage = document.querySelector('.home-page')

if (homePage) {
  const selectionSlider = new Swiper('.selection-slider', {
    // modules: [Navigation],
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 15,
    /*
    breakpoints: {
      // mobile 320-991
      320: {
        spaceBetween: 15,
      },
    },
    */
  });

  const testimonialsSlider = new Swiper('.testimonials-slider', {
    // modules: [Navigation],
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 15,
    /*
    breakpoints: {
      // mobile 320-991
      320: {
        spaceBetween: 15,
      },
    },
    */
  });
}


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


// Mobile menu
const burgerMenuWrapper = document.querySelector('.burger-menu-wrapper');
const mobileMenu = document.querySelector('.mobile-menu');

function openMobileMenu() {
  body.classList.add('overflow-hidden');
  mobileMenu.classList.add('active');
  burgerMenuWrapper.classList.add('menu-is-open');
}

function closeMobileMenu() {
  body.classList.remove('overflow-hidden');
  burgerMenuWrapper.classList.remove('menu-is-open');
  mobileMenu.classList.remove('active');
}

burgerMenuWrapper.onclick = function() {
  if (burgerMenuWrapper.classList.contains('menu-is-open')) {
    closeMobileMenu();
  } else {
    openMobileMenu();
  }
}

const listParentClick = document.querySelectorAll('.mobile-menu li.menu-item a');

for (let i=0; i < listParentClick.length; i++) {
  listParentClick[i].onclick = function (event) {
    event.preventDefault();
    closeMobileMenu();
    let hrefClick = this.href;
    setTimeout(function() {
      location.href = hrefClick
    }, 500);
  }
}


// Filter menu
const filterMenuBtn = document.querySelector('#filter-menu-btn');
const filterMenu = document.querySelector('.filter-menu');
const filterMenuClose = document.querySelector('.filter-menu-close');

function openFilterMenu() {
  body.classList.add('overflow-hidden');
  filterMenu.classList.add('active');
}

function closeFilterMenu() {
  body.classList.remove('overflow-hidden');
  filterMenu.classList.remove('active');
}

if (filterMenuBtn) {
  filterMenuBtn.onclick = openFilterMenu;
}

filterMenuClose.onclick = closeFilterMenu;


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


// Выбор файлов Галерея
const inputGalleryFile = document.querySelector('#input-gallery-file');
const galleryFileText = document.querySelector('.gallery-file-text');

if (inputGalleryFile) {
  inputGalleryFile.onchange = function() {
    let filesName = '';
    for (let i = 0; i < this.files.length; i++) {
      filesName += this.files[i].name + ' ';
    }
    galleryFileText.innerHTML = filesName;
  }
}


// Поиск товаров
// Search поиск товаров в хэдере
let searchForm = document.querySelector('.search-form');
let searchInput = document.querySelector('.search-input');
let searchClose = document.querySelector('.search-close');
let searchDropdown = document.querySelector('.search-dropdown');
let searchResult = document.querySelector('.js-search-result');

function searchDropdownClose() {
  searchDropdown.classList.remove('active');
  searchClose.classList.remove('active');
  searchInput.classList.remove('search-input-dp');
}

function searchResetForm() {
  searchForm.reset();
  searchDropdown.classList.remove('active');
  searchClose.classList.remove('active');
  searchInput.classList.remove('search-input-active');
  searchInput.classList.remove('search-input-dp');
}

searchInput.onfocus = function() {
  searchInput.classList.add('search-input-active');
}

searchInput.onblur = function() {
  searchInput.classList.remove('search-input-active');
  searchDropdownClose();
}

searchClose.onclick = searchResetForm;

searchInput.oninput = searchOnInput;

function searchOnInput() {

  // Ограничение по количеству символов > 3 и <=100
  if (searchInput.value.length > 3 && searchInput.value.length <= 100) {

    const searchSeeAll = document.querySelector('.search-see-all');

    function searchDropdownRender(json) {
      // Очистка результатов поиска
      searchResult.innerHTML = '';
      searchSeeAll.classList.remove('active');

      // Если товаров 0, то не найдено
      if (json.length == 0) {
        let tmpEl = document.createElement('li');
        tmpEl.className = "no-product";
        tmpEl.innerHTML = 'Товаров не найдено';
        searchResult.append(tmpEl);
      }

      // Вывод результатов поиска
      if (json.length > 0) {

        // Ограничение количества выводимых результатов
        if (json.length > 3) {
          json.length = 3; 
        }

        // Формирую html из массива данных
        json.forEach((item) => {
          let tmpEl = document.createElement('li');
          tmpEl.className = "search-list-item";
          let str = '<div class="search-list-item__image"><img src="' + item.storage_image + '" alt=""></div>';
          str += '<div class="title-wrapper">';
          str += '<div class="search-list-item__title">' + item.title + '</div>';
          str += '<div class="search-list-item__date">' + item.date + '</div>';
          str += '</div>';
          str += '<a href="/catalog/' + item.category.slug + '/' + item.slug + '" class="full-link search-list-item__link"></a>';
          tmpEl.innerHTML = str;
          searchResult.append(tmpEl);
        });

        searchSeeAll.classList.add('active');

        // Добавляю клик на найденные элементы
        let searchListItemLink = document.querySelectorAll('.search-list-item__link');

        searchListItemLink.forEach((item) => {
          item.onclick = searchResetForm;
        });

        // Добавляю клик на ссылку Показать все результаты
        searchSeeAll.classList.add('active');
        searchSeeAll.href = '/poisk?search_query=' + searchInput.value;
        searchSeeAll.onclick = searchResetForm;
      }

      searchClose.classList.add('active');
      searchInput.classList.add('search-input-dp');
      searchDropdown.classList.add('active');
    }

    fetch('/ajax-product-search?search_query=' + searchInput.value, {
      method: 'GET',
      cache: 'no-cache',
    })
    .then((response) => response.json())
    .then((json) => {
      searchDropdownRender(json);        
    })
    .catch((error) => {
      console.log(error);
    })

  } else {
    // Если менее 3 символов, то скрываю результаты поиска
    searchDropdownClose();
  }

}


// Отправка формы ajax
const callbackModalForm = document.querySelector('#callback-modal-form');
const callbackModalSubmitBtn = document.querySelector('#callback-modal-submit-btn');
const callbackForm = document.querySelector('#callback-form');
const callbackSubmitBtn = document.querySelector('#callback-submit-btn');

function ajaxCallback(form) {

  const inputs = form.querySelectorAll('.input-field');
  let arr = [];

  const inputName = form.querySelector('.js-required-name');
  if (inputName.value.length < 3 || inputName.value.length > 20) {
    inputName.classList.add('required');
    arr.push(false);
  }

  const inputPhone = form.querySelector('.js-required-phone');
  if (inputPhone.value.length != 18) {
    inputPhone.classList.add('required');
    arr.push(false);
  }

  const inputCheckboxes = form.querySelectorAll('.js-required-checkbox');

  inputCheckboxes.forEach((item) => {
    if (!item.checked) {
      arr.push(false);
    }
  });

  if (arr.length == 0) {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('required');
    }

    fetch('/ajax-callback', {
      method: 'POST',
      cache: 'no-cache',
      body: new FormData(form)
    })
    .catch((error) => {
      console.log(error);
    })

    alert("Спасибо. Мы свяжемся с вами.");

    form.reset();

  }

  return false;
}

callbackModalSubmitBtn.onclick = () => {
  ajaxCallback(callbackModalForm);
}

if (callbackSubmitBtn) {
  callbackSubmitBtn.onclick = () => {
    ajaxCallback(callbackForm);
  }
}


// Звездный рейтинг в окне Оставить отзыв
const stars = document.querySelectorAll('.testimonial-modal .stars .star');
const inputRating = document.querySelector('.testimonial-modal #input-rating');

inputRating.value = 0;

stars.forEach((item, index) => {
  item.onmouseover = function() {
    addStarActive(index);
  }
  item.onmouseout = function() {
    removeStarActive(index);
  }
  item.onclick = function() {
    fixedStarActive(index);
  }
});


function addStarActive(index) {
  for (let j = 0; j <= index; j++) {
    stars[j].classList.add('active');
  }
}

function removeStarActive(index) {
  for (let j = 0; j <= index; j++) {
    stars[j].classList.remove('active');
  }
}

function fixedStarActive(index) {
  for (let i = 0; i < stars.length; i++) {
    stars[i].classList.remove('click-active');
  }
  for (let j = 0; j <= index; j++) {
    stars[j].classList.add('click-active');
  }
  inputRating.value = index + 1;
}


// Отправка отзывов ajax
const testimonialModalForm = document.querySelector('#testimonial-modal-form');
const testimonialModalSubmitBtn = document.querySelector('#testimonial-modal-submit-btn');

function ajaxTestimonial(form) {

  const inputs = form.querySelectorAll('.input-field');
  let arr = [];

  const inputName = form.querySelector('.js-required-name');
  if (inputName.value.length < 3 || inputName.value.length > 20) {
    inputName.classList.add('required');
    arr.push(false);
  }

  const inputText = form.querySelector('.js-required-text');
  if (inputText.value.length < 3 || inputText.value.length > 1000) {
    inputText.classList.add('required');
    arr.push(false);
  }

  const inputCheckboxes = form.querySelectorAll('.js-required-checkbox');

  inputCheckboxes.forEach((item) => {
    if (!item.checked) {
      arr.push(false);
    }
  });

  if (arr.length == 0) {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('required');
    }

    fetch('/ajaxaddtestimonial', {
      method: 'POST',
      cache: 'no-cache',
      body: new FormData(form)
    })
    .then((response) => response.json())
    .then((json) => {
      if (json.error) {
        alert("Ошибка. Попробуйте еще раз.");
      } else {
        alert("Спасибо за отзыв.");
      }
    })
    .catch((error) => {
      console.log(error);
    })

    form.reset();

    form.querySelector('.gallery-file-text').innerText = 'Прикрепить фото (не более 3)';

    stars.forEach((item) => {
      item.classList.remove('active');
      item.classList.remove('click-active');
    });
  }

  return false;
}

testimonialModalSubmitBtn.onclick = () => {
  ajaxTestimonial(testimonialModalForm);
}


// Закреп нижнего меню на главной странице
const fixedBottomMenu = document.querySelector('.fixed-bottom-menu');

if (fixedBottomMenu) {
  // Показать to-top при скролле
  window.onscroll = () => {
    
    let scrToTop = window.scrollY || document.documentElement.scrollTop;
    
    if (scrToTop > 1000) {
      fixedBottomMenu.classList.add('active');
    } else {
      fixedBottomMenu.classList.remove('active');
    }

  }
}


// Закреп кнопок в карточке товара
const productPage = document.querySelector('.product-page');

if (productPage) {

  const productButtons = document.querySelector('.product-buttons');

  window.onscroll = () => {
    
    let scrToTop = window.scrollY || document.documentElement.scrollTop;
    
    if (scrToTop > 1400) {
      productButtons.classList.add('active');
    } else {
      productButtons.classList.remove('active');
    }

  }
}


// To top
const toTop = document.getElementById("to-top");

if (toTop) {

  toTop.onclick = () => {
    scroll(0, 0);
  }

  // Показать to-top при скролле
  window.onscroll = () => {
    
    let scrToTop = window.scrollY || document.documentElement.scrollTop;
    
    if (scrToTop > 600) {
      toTop.classList.add('active');
    } else {
      toTop.classList.remove('active');
    }

  }
}


// Set cookie
// Запись в куки в обход функционала Laravel
// Через request->cookie() не работает
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
  // Нижнее меню
  let fixedBottomNav = document.querySelector('#fixed-bottom-nav');

  // Если куки we-use-cookie нет или она просрочена, то показываем уведомление
  if (!getCookie('we-use-cookie')) {
    cookieNote.classList.add('active');
    // Нижнее меню
    if (fixedBottomNav) {
      fixedBottomNav.classList.add('with-cookie');
    }
  }

  // При клике на кнопку устанавливаем куку we-use-cookie на один год
  cookieBtnAccept.addEventListener('click', function () {
    setCookie('we-use-cookie', 'true', 365);
    cookieNote.classList.remove('active');
    // Нижнее меню
    if (fixedBottomNav) {
      fixedBottomNav.classList.remove('with-cookie');
    }
  });
}

checkCookies();