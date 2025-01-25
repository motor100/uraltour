<div class="callback-section">
  <div class="container">
    <div class="callback-form-wrapper">
      <div class="callback-title">Оставьте заявку</div>
      <form id="callback-form" class="form">
        <div class="grid-container">
          <input type="text" name="name" class="input-field js-required-name" placeholder="Имя">
          <input type="text" name="phone" class="input-field js-required-phone js-input-phone-mask" placeholder="Телефон">
          <button type="button" id="callback-submit-btn" class="callback-submit-btn js-submit-btn">Отправить</button>
        </div>
        @csrf
        <div class="agreement-text">
          <input type="checkbox" id="pk-checkbox" name="checkbox-read" class="custom-checkbox js-required-checkbox" checked required onchange="document.getElementById('callback-btn').disabled = !this.checked;">
          <label for="pk-checkbox" class="custom-checkbox-label"></label>
          <span>Ознакомлен с <a href="/privacy-policy">политикой конфиденциальности</a></span>
        </div>
        <div class="agreement-text">
          <input type="checkbox" id="cb-checkbox" name="checkbox-agree" class="custom-checkbox js-required-checkbox" checked required onchange="document.getElementById('callback-btn').disabled = !this.checked;">
          <label for="cb-checkbox" class="custom-checkbox-label"></label>
          <span>Согласен на <a href="/agreement">обработку персональных данных</a></span>
        </div>
      </form>
    </div>
  </div>
</div>