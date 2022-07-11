<template>
    <div id="app">
      <TodoHeader></TodoHeader>
      <TodoInput @childAddTodo="addTodo"></TodoInput>
      <TodoList @childRemoveTodo="removeTodo" v-bind:propsItems="todoItems"></TodoList>
      <TodoFooter @clearTodo="clearTodo"></TodoFooter>
    </div>
</template>

<script>
import TodoHeader from './components/todo/TodoHeader.vue'
import TodoInput from './components/todo/TodoInput.vue'
import TodoList from './components/todo/TodoList.vue'
import TodoFooter from './components/todo/TodoFooter.vue'

export default {
  name: 'App',
  data() {
    return {
      todoItems: []
    }
  },
  methods: {
    addTodo(todoItem) {
      if(todoItem in localStorage){
        alert('중복된값은 입력할 수 없습니다.');
      } else {
        this.todoItems.push(todoItem);
      }
      localStorage.setItem(todoItem, todoItem);
    },
    removeTodo(todoitem, idx) {
      localStorage.removeItem(todoitem, idx);
      this.todoItems.splice(idx, 1);
    },
    clearTodo(){
      this.todoItems.splice(0);
      localStorage.clear();
    }
  },
  components: {
    TodoHeader,
    TodoInput,
    TodoList,
    TodoFooter
  },
  created() {
    if(localStorage.length > 0) {
        for(let i=0; i<localStorage.length; i++) {
            this.todoItems.push(localStorage.key(i));
        }
    }
  }
}
</script>

<style>
body { text-align: center; background-color: #f6f6f8;}
input { border-style: groove; width: 200px;}
button { border-style: groove;}
.shadow { box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.03); }
</style>
