<template>
  <div class="inputBox shadow">
    <input type="text" v-model="newTodoItem" @keyup.enter="addTodo" placeholder="Type what you have to do">
    <span class="addContainer" @click="addTodo">
      <i class="addBtn fas fa-plus" aria-hidden="true"></i>
    </span>
  </div>
</template>

<style scoped>
  input:focus { outline: none; }
  .inputBox { 
      background-color: white; height: 50px; line-height: 50px;
      border-radius: 5px;
      display: flex;
      padding-left: 5px;
    }
  .inputBox input { 
    border-style: none; font-size: 0.9rem; 
    flex-grow: 1; padding: 0 10px;
  }
  .addContainer { 
    background: linear-gradient(to right, #6478fb, #8763fb);
    width: 3rem;
    border-radius: 0 5px 5px 0;
  }
  .addContainer > .addBtn { color: white;}
</style>

<script>
export default {
  data() {
    return {
      newTodoItem: ''
    }
  },
  methods: {
    addTodo() {
      if(this.newTodoItem.trim() !== '') {
        const value = this.newTodoItem.trim();//양쪽의 빈칸을 지우는 메소드(trim)
        localStorage.setItem(value, value);
        this.$emit('childAddTodo', this.newTodoItem);//app.vue와연결 값은, 하고 추가가능
      }else {
        this.$emit('modal');
      }
      this.newTodoItem = '';
    }
  }
}
</script>

