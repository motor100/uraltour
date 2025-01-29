// Common
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


// Функция отключения скролла у input type=number
function disableScrollInputNumber() {

  let numberInputs = document.querySelectorAll('.input-number');

  numberInputs.forEach((item) => {
    item.onwheel = function(e) {
      e.preventDefault();
    }
  });

  return false;
}

// Отключение скролла у input type=number
disableScrollInputNumber();


// Input phone mask
let phoneElements = document.querySelectorAll('.phone-mask');

phoneElements.forEach((item) => {
  let maskOptionsPhone = {
    mask: '+{7} (000) 000 00 00'
  };
  let mask = IMask(item, maskOptionsPhone);
});

// Input birthdate mask
let birthdateElement = document.querySelector('#birthdate');

if (birthdateElement) {
  let maskOptionsBirthdate = {
    mask: '00.00.0000'
  };
  let mask = IMask(birthdateElement, maskOptionsBirthdate);
}


// Input series and passport mask
let passElement = document.querySelector('#pass');

if (passElement) {
  let maskOptionsPass = {
    mask: '0000 000000'
  };
  let mask = IMask(passElement, maskOptionsPass);
}

// Input years old mask
let yearsoldElement = document.querySelector('#years_old');

if (yearsoldElement) {
  let maskOptionsYearsold = {
    mask: '00'
  };
  let mask = IMask(yearsoldElement, maskOptionsYearsold);
}

// Input number only
const inputDigitsOnly = document.querySelectorAll('.digits-only');

inputDigitsOnly.forEach((item) => {
  item.oninput = function() {
    this.value = this.value.replace(/[^0-9\.]/g, '');
  }
});


// Сurrent notifications read and delete
let currentNotifications = document.querySelector('.current-notifications');

if (currentNotifications) {

  let readBtns = document.querySelectorAll('.js-read-btn');

  function updateElement(el) {
    // Добавляю класс disabled, делаю текст серым цветом и меняю на Прочитано
    el.parentElement.classList.add('disabled');
    el.innerText = 'Прочитано';
    return false;
  }

  function updateCounter(el) {
    // Уменьшаю счетчик уведомлений
    let notificationsCounter = document.querySelector('#notifications-counter'),
        notificationsCounterNumber = Number(notificationsCounter.innerText);
    if (notificationsCounterNumber > 0) {
      notificationsCounterNumber = notificationsCounterNumber - 1
      notificationsCounter.innerText = notificationsCounterNumber;
    }
    if (notificationsCounterNumber == 0) {
      notificationsCounter.classList.add('hidden');
    }
    return false;
  }

  function updateNotificationsTable(id) {
    // fetch ajax
    fetch('/api/notification-update', {
      method: 'POST',
      headers: {'Content-Type':'application/x-www-form-urlencoded'},
      cache: 'no-cache',
      body: 'id=' + encodeURIComponent(id),
    })
    .catch((error) => {
      alert(error);
    })
  }

  readBtns.forEach((item) => {
    item.addEventListener('click', function() {
      updateElement(this);
      updateCounter();
      updateNotificationsTable(this.dataset.id);
    }, {once: true}); // Свойство once: true в объекте options событие 1 раз
  });

}


// Init air datepicker
// Date picker
let datepickers = document.querySelectorAll('.datepicker');

datepickers.forEach((item) => {
  const dp = new AirDatepicker(item, {
    minDate: new Date(),
    autoClose: true
  });
});

// Date and time picker
let datetimepickers = document.querySelectorAll('.datetimepicker');
let startDate = new Date('2023-07-20');

datetimepickers.forEach((item) => {
  const dp = new AirDatepicker(item, {
    timepicker: true,
    minutesStep: 15,
    // minDate: new Date(),
    autoClose: true
  });
});


// fade out success message
let alertSuccess = document.querySelector('.alert-success');

if (alertSuccess) {
  fadeOut(alertSuccess, 3000);
}

function fadeOut (el, timeout) {
  el.style.opacity = 1;
  el.style.transition = `opacity ${timeout}ms`;
  el.style.opacity = 0;

  setTimeout(() => {
    el.style.display = 'none';
  }, timeout);

  return false;
};


// Translate route to confirmDeleteModal
const confirmDeleteModal = document.getElementById('confirmDeleteModal');

if (confirmDeleteModal) {
  const cancelBtn = document.getElementById('cancel-btn'),
        delBtn = document.querySelectorAll('.del-btn'),
        deleteForm = document.getElementById('delete-form');

  delBtn.forEach((item) => {
    item.addEventListener('click', () => {
      deleteForm.action = item.dataset.route;
      confirmDeleteModal.onfocus = function() {
        cancelBtn.focus();
      }
    });
  });
}


// Notification name search
// Notification create page

// Функция описывает действия при событии click на результатах поиска
// Параметр searchItem это объект из .then
function rezultElementNotificationClick(searchItem, obj) {
  const nameInput = document.getElementById('name_input');
  const clientId = document.getElementById('client_id');
  nameInput.innerText = obj.name;
  clientId.value = obj.id;
  return false;
}


// Notification create
const notificationsCreate = document.querySelector('.notifications-create');

if (notificationsCreate) {

  // Поиск по имени
  const nameSearchElement = document.querySelector('.js-name-search-element');

  const url = '/api/clients-search?search_query=';

  nameSearch(nameSearchElement, rezultElementNotificationClick, url);

}


// Company create
const companiesCreate = document.querySelector('.companies-create');

if (companiesCreate) {

  // Поиск по имени
  const nameSearchElement = document.querySelector('.js-name-search-element');

  const url = '/api/clients-search?search_query=';

  nameSearch(nameSearchElement, rezultElementNotificationClick, url);

}


// Client create
const clientsCreate = document.querySelector('.clients-create');

if (clientsCreate) {
  console.log(clientsCreate);
}


// Company name search
// Company create page

// Функция описывает действия при событии click на результатах поиска
// Параметр searchItem это объект из .then
function rezultElementCompanyClick(searchItem, obj) {
  const companyInput = document.getElementById('company_input');
  const companyId = document.getElementById('company_id');
  companyInput.innerText = obj.name;
  companyId.value = obj.id;
  return false;
}

// Contract create
const contractsCreate = document.querySelector('.contracts-create');

if (contractsCreate) {

  // Поиск по названию компании
  // const companySearchElement = document.querySelector('.js-company-search-element');

  // const url = '/api/company-search?search_query=';

  // nameSearch(companySearchElement, rezultElementCompanyClick, url);
}


/*
* ajax поиск, вывод результатов в выпадающем меню
* el - DOM элемент строка поиска
* clickFunc - функция добавления клика на результаты поиска
* url - url для ajax запроса
*/
function nameSearch(el, clickFunc, url) {
  const searchInput = el.querySelector('.js-search-input');
  const autocompleteDropdown = el.querySelector('.autocomplete-dropdown');

  searchInput.oninput = function() {

    const searchRezult = el.querySelector('.js-search-rezult'),
          searchMessage = el.querySelector('.search-message');

    function clearSearch() {
      searchRezult.innerHTML = '';
      searchMessage.innerText = '';
      autocompleteDropdown.classList.remove('active');
      return false;
    }

    // Если количество символов <= 3 или > 40
    // Очищаю результаты поиска и возвращаю false
    if (searchInput.value.length <= 3 || searchInput.value.length > 40) {
      clearSearch();
      return false;
    }

    // fetch ajax
    fetch(url + encodeURIComponent(searchInput.value))
    .then((response) => response.json())
    .then(json => {

      // Очистка старых результатов
      clearSearch();

      // Добавление селектора active для autocomplete-dropdown
      autocompleteDropdown.classList.add('active');

      // Если результатов нет или менее 5, то кнопка Добавить и создание URL
      if (json.length <=5) {
        searchMessage.innerHTML = '<a href="/dashboard/clients/create?name=' + searchInput.value + '" class="search-message__link">Добавить</a>';
      }

      // Ограничение количества выводимых результатов
      if (json.length > 5) {
        json.length = 5; 
        searchMessage.innerText = 'Результатов более 5';
      }

      json.forEach((item) => {
        let tmpEl = document.createElement('li');
        tmpEl.className = "autocomplete-list-item";
        tmpEl.innerText = item.name;

        // Событие click на найденные элементы
        // Сначала вызов функции clickFunc переданной как параметр
        // Потом вызов функции очистки результатов поиска
        tmpEl.onclick = function () {
          clickFunc(el, item);
          clearSearch();
          searchInput.value = '';
        }

        searchRezult.append(tmpEl);
      });
      
    })
    .catch((error) => {
      console.log(error);
    })

    return false;

  }

  // Закрытие выпадающего поиска если клик за его пределами
  document.addEventListener('click', (e) => {
    const withinBoundaries = e.composedPath().includes(autocompleteDropdown);
  
    if (!withinBoundaries) {
      autocompleteDropdown.classList.remove('active');
    }
  });

  return false;
}
