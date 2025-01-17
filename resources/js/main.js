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

  // Ограничение по количеству символов > 3 и <=50
  if (searchInput.value.length > 3 && searchInput.value.length <= 50) {

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