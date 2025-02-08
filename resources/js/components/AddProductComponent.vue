<template>
  

  <table class="table table-striped">
    <tbody>
      <tr
        v-for="item in products"
      >
        <td>
          <input
            type="text"
            v-bind:name="'products[' + item.id + ']'"
            class="input-product"
            v-bind:value=item.title
          >
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
      class="form-control">
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
  

  data() {
    return {
      // search: false,
      close: false, // крестик очистки строки поиска и результатов
      searchInput: '', // строка поиска
      searchResults: [], // результаты поиска
      searchMessage: false, // сообщение результатов более 5
      searchNotFound: false, // сообщение не найдено
      products: [], // товары
    }
  },

  methods: {
    // Добавление строки поиска
    // addSearchInput() {
    //   this.search = true;
    // },

    addProduct(event) {
      // this.search = false;
      this.searchInput = '';
      this.searchResults = [];
      this.searchMessage = false;
      this.products.push({'id': event.target.getAttribute('data-id'), 'title': event.target.innerText});
      this.close = false;
      this.searchNotFound = false;
    },

    searchClose() {
      // this.search = false;
      this.searchInput = '';
      this.searchResults = [];
      this.searchMessage = false;
      this.close = false;
      this.searchNotFound = false;
    },

    // Метод отправки запроса через axios
    sendData() {
      if (this.searchInput.length > 0) {
        this.close = true;
      } else {
        this.close = false;
      }
      if (this.searchInput.length > 3 && this.searchInput.length < 40) {
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

            // this.cnts = response.data;
            // this.pagination = [];
            // this.addClickDelBtn();
            // console.log(response);
          })
          .catch(error => {
            console.log(error)
          });
      }
      // this.addClickDelBtn();
      
    },
  },
  
};
</script>