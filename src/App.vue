<template>
    <div id="app">
      <TodoHeader></TodoHeader>
      <TodoInput @childAddTodo="addTodo" @modal="showModal"></TodoInput>
      <TodoList @childRemoveTodo="removeTodo" v-bind:propsItems="todoItems"></TodoList>
      <TodoFooter @clearTodo="clearTodo"></TodoFooter>
    </div>
    <AlertModal @modalClose="closeModal" @close="closeModal" :show="modalShow" header="알림창" body="내용을 입력해 주세요." ></AlertModal>
</template>

<script>
import TodoHeader from './components/todo/TodoHeader.vue';
import TodoInput from './components/todo/TodoInput.vue';
import TodoList from './components/todo/TodoList.vue';
import TodoFooter from './components/todo/TodoFooter.vue';
import AlertModal from './components/common/AlertModal.vue';

export default {
  name: 'App',
  data() {
    return {
      todoItems: [],
      cnt: 0,
      modalShow: false,
    }
  },
  methods: {
    addTodo(todoItem) {
      this.todoItems.push({
        key: this.cnt++,
        value: todoItem,
      });
    },
    removeTodo(key) {
      // this.todoItems.splice(idx, 1);
      this.todoItems.forEach((item, idx) => {
        if(item.key === key) {
          this.todoItems.splice(idx, 1);
        }
      })
    },
    clearTodo(){
      this.todoItems.splice(0);
      this.cnt = 0;
    },
    changeValue() {
      const json = JSON.stringify(this.todoItems);
      localStorage.setItem('todoItems', json);
      localStorage.setItem('cnt', this.cnt);
    },
    closeModal() {
      this.modalShow = false;
    },
    showModal() {
      this.modalShow = true;
    } 
  },
  components: {
    TodoHeader,
    TodoInput,
    TodoList,
    TodoFooter,
    AlertModal
  },
  watch: {
    todoItems: {
      deep: true,//todoItems배열안의 값이 변하는걸 감지 (레퍼런스타입) .이두개 /주소값이 바뀌는걸 감지하는건 false 문자,숫자 (프라모티브타입) .이 한개/
      handler() {
        this.changeValue();
      }
    }
  },
  created() {
    const json = localStorage.getItem("todoItems");
    if(json) {
      const todoItems = JSON.parse(json);
      todoItems.forEach(item => {
        this.todoItems.push(item);
      });
      const cnt = localStorage.getItem("cnt");
      this.cnt = cnt;
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
