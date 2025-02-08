<template>
  
  <div class="products">
    <input
      v-for="item in products"
      type="text"
      name="products[]"
      class="products-item"
      :value=item.title
    >
  </div>

  <div
    v-if="search"
    class="form-group mb-1">
    <label class="form-label">Поиск</label>
    <input
      v-model="searchInput"
      v-on:input="sendData"
      type="text"
      class="form-control">
  </div>
  <div
    v-else="search"
    class="form-group mb-5">
    <button
      v-on:click="addSearchInput"
      type="button"
      class="btn btn-success">
      <i class="fas fa-plus"></i>
    </button>
  </div>
  <div
    v-if="search"
    class="search-dropdown">
    <ul class="dropdown">
      <li
        v-for="item in searchResults"
        v-on:click="addProduct"
        class="dropdown-item">
        {{ item.title }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "AddProductComponent",
  

  data() {
    return {
      search: false,
      searchInput: '', // строка поиска
      searchResults: [], // результаты поиска
      products: [], // товары
    }
  },

  methods: {
    // Добавление строки поиска
    addSearchInput() {
      this.search = true;
    },

    addProduct() {
      this.search = false;
      this.searchInput = '';
      this.searchResults = [];
      this.products = [];
    },

    // Метод отправки запроса через axios
    sendData() {
      if (this.searchInput.length > 3 && this.searchInput.length < 40) {
        axios
          .get(`/ajax-product-search?search_query=${this.searchInput}`)
          .then(response => {
            if(response.data.length > 0) {
              this.searchResults = response.data;
            } else {
              this.searchResults = ['не найдено'];
            }

            // this.cnts = response.data;
            // this.pagination = [];
            // this.addClickDelBtn();
            console.log(response);
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