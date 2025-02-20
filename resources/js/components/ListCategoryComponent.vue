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
            v-on:click="removeCat"
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
  
</template>

<script>
export default {
  name: "ListCategoryComponent",
  props: {
    categories: Object
  },

  data() {
    return {
      cats: this.categories, // категории
    }
  },

  methods: {

    removeCat(event) {

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