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


// Fade out success message
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


// Client create and Client edit
const clientsCreate = document.querySelector('.clients-create');
const clientsEdit = document.querySelector('.clients-edit');

if (clientsCreate || clientsEdit) {
  const birthdate = document.querySelector('#birthdate');
  const yearsOld = document.querySelector('#years_old');

  function getAge() {
    if (birthdate.value.length == 10) {
      let year = Number(birthdate.value.slice(6, 10));
      let now = new Date();
      yearsOld.placeholder = now.getFullYear() - year;
    }
    return false;
  }

  getAge();

  birthdate.oninput = getAge;
}


// Export clients, events, copmanies 
let exportAll = document.querySelector('.export-all');

if (exportAll) {

  const exportAllBtn = document.querySelector('#export-all-btn');

  exportAllBtn.onclick = () => {
    // fetch ajax
    fetch('/api/export-all')
    .catch((error) => {
      alert(error);
    })

    alert('Ссылка для скачивания архива будет отправлена на почту 9123080608@mail.ru');
  }
  
}