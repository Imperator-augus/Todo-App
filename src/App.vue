<template>
    <div id="app">
      <TodoHeader></TodoHeader>
      <TodoInput></TodoInput>
      <TodoList></TodoList>
      <TodoFooter></TodoFooter>
    </div>
</template>

<script>
import TodoHeader from './components/todo/TodoHeader.vue'
import TodoInput from './components/todo/TodoInput.vue'
import TodoList from './components/todo/TodoList.vue'
import TodoFooter from './components/todo/TodoFooter.vue'

export default {
  name: 'App',
  components: {
    TodoHeader,
    TodoInput,
    TodoList,
    TodoFooter
  }
}
</script>

<style>
body { text-align: center; background-color: #f6f6f8;}
input { border-style: groove; width: 200px;}
button { border-style: groove;}
.shadow { box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.03); }
</style>
