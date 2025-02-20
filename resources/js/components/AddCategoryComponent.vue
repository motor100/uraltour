<template>
  <table
    v-if=cats.length
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
        v-for="item, index in cats"
      >
        <th>{{ index + 1 }}</th>
        <td>
          <input
            type="text"
            v-bind:name="'categories[' + item.id + ']'"
            class="input-product"
            v-bind:value=item.title
          >
        </td>
        <td class="button-group">
          <button
            v-on:click="removeCats"
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

  <select name="category" id="category" class="form-select mb-3">
    <option value="" selected disabled></option>
    <option 
      v-for="category in ctrs"
      v-bind:key="category"
      v-bind:value=category.id
      v-on:click=addCategory>
      {{ category.title }}
    </option>
  </select>
  
</template>

<script>
export default {
  name: "AddCategoryComponent",
  props: {
    categories: Object
  },

  data() {
    return {
      ctrs: this.categories, // массив с категориями
      cats: [], // категории
    }
  },

  methods: {

    addCategory(event) {
      this.cats.push({'id': event.target.value, 'title': event.target.innerText});
      
      // Удаление из массива категорий 
      let resultArray = new Array();

      // Создание нового массива this.ctrs
      for (let i = 0; i < this.ctrs.length; i++) {
        if (this.ctrs[i].id != Number(event.target.value)) {
          // Добавление значения в новый массив
          resultArray.push(this.ctrs[i]);
        }
      }
      this.ctrs = resultArray;

      document.getElementById('category').selectedIndex = 0;
     
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

    removeCats(event) {

      let resultArray = new Array();

      // Создание нового массива
      for (let i = 0; i < this.cats.length; i++) {
        if (i != event.target.getAttribute('data-id')){
          // Добавление значения в новый массив
          resultArray.push(this.cats[i]);
        }
      }
      this.cats = resultArray;
    },
  },
  
};
</script>