<template>

  <table
    v-if=prds.length
    class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="item, index in prds"
      >
        <th>{{ index + 1 }}</th>
        <td>
          <input
            type="text"
            v-bind:name="'products[' + item.id + ']'"
            class="input-product"
            v-bind:value=item.title
          >
        </td>
        <td class="button-group">
          <button
            v-on:click="removePrd"
            v-bind:data-id=index
            type="button" class="btn btn-danger">
            <i
              v-bind:data-id=index
              class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <table
    v-if=products.length
    class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="item, index in products"
      >
        <th>{{ index + 1 }}</th>
        <td>
          <input
            type="text"
            v-bind:name="'products[' + item.id + ']'"
            class="input-product"
            v-bind:value=item.title
          >
        </td>
        <td class="button-group">
          <button
            v-on:click="removePrduct"
            v-bind:data-id=index
            type="button" class="btn btn-danger">
            <i
              v-bind:data-id=index
              class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="form-group mb-1 position-relative">
    <label for="product-search" class="form-label">Поиск</label>
    <input
      v-model="searchInput"
      v-on:input="sendData"
      type="text"
      id="product-search"
      name="product-search"
      class="form-control"
      autocomplete="off">
    <div
      v-if="close"
      v-on:click="searchClose"
      class="search-close">
    </div>
    <div
      class="search-dropdown">
      <div class="dropdown">
        <div
          v-for="item in searchResults"
          v-on:click="addProduct"
          class="dropdown-item"
          v-bind:data-id=item.id
          >{{ item.title }}
        </div>
      </div>
      <div 
        v-if="searchMessage"
        class="search-message">Результатов более 5
      </div>
      <div 
        v-if="searchNotFound"
        class="search-not-found">Не найдено
      </div>
    </div>
  </div>
  
</template>

<script>
export default {
  name: "AddProductComponent",
  props: {
    ps: Object
  },

  data() {
    return {
      prds: this.ps,
      close: false, // крестик очистки строки поиска и результатов
      searchInput: '', // строка поиска
      searchResults: [], // результаты поиска
      searchMessage: false, // сообщение результатов более 5
      searchNotFound: false, // сообщение не найдено
      products: [], // товары
    }
  },

  methods: {

    addProduct(event) {
      this.searchInput = '';
      this.searchResults = [];
      this.searchMessage = false;
      this.products.push({'id': event.target.getAttribute('data-id'), 'title': event.target.innerText});
      this.close = false;
      this.searchNotFound = false;
    },

    searchClose() {
      this.searchInput = '';
      this.searchResults = [];
      this.searchMessage = false;
      this.close = false;
      this.searchNotFound = false;
    },

    removeProduct(event) {

      let resultArray = new Array();

      // Создание нового массива
      for (let i = 0; i < this.products.length; i++) {
        if (i != event.target.getAttribute('data-id')){
          // Добавление значения в новый массив
          resultArray.push(this.products[i]);
        }
      }
      this.products = resultArray;
    },

    removePrd(event) {

      let resultArray = new Array();

      // Создание нового массива
      for (let i = 0; i < this.prds.length; i++) {
        if (i != event.target.getAttribute('data-id')){
          // Добавление значения в новый массив
          resultArray.push(this.prds[i]);
        }
      }
      this.prds = resultArray;

    },

    // Метод отправки запроса через axios
    sendData() {
      if (this.searchInput.length > 0) {
        this.close = true;
      } else {
        this.close = false;
      }
      if (this.searchInput.length > 3 && this.searchInput.length < 100) {
        axios
          .get(`/ajax-product-search?search_query=${this.searchInput}`)
          .then(response => {
            if (response.data.length > 0) {
              if (response.data.length > 5) {
                response.data.length = 5;
                this.searchResults = response.data;
                this.searchMessage = true;
              } else {
                this.searchResults = response.data;
                this.searchMessage = false;
              }
            } else {
              this.searchNotFound = true;
            }
          })
          .catch(error => {
            console.log(error)
          });
      }
    },
  },
  
};
</script>