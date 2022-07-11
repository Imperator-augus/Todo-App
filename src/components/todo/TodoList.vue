<template>
  <section>
    <ul>
        <li :key="todoItem" v-for="(todoItem, index) in propsItems" class="shadow">
            <i class="checkBtn fas fa-check" aria-hidden="true"></i>
            {{ todoItem }}
            <span class="removeBtn" type="button" @click="removeTodo(todoItem, index)">
                <i class="far fa-trash-alt" aria-hidden="true"></i>
            </span>
        </li>
    </ul>
  </section>
</template>

<script>
export default {
    props: {
        propsItems: Array
    },
    methods: {
        removeTodo(todoItem, index) {
            this.$emit('childRemoveTodo', todoItem, index);
        }
    },
    
}
</script>

<style>
    ul{ list-style-type: none; padding-left: 0; margin-top: 0; text-align: left; }
    li { 
        display: flex; min-height: 50px; height: 50px; line-height: 50px; margin: 0.5rem 0;
        padding: 0 0.9rem; background-color: white; border-radius: 5px;
    }
    .checkBtn { line-height: 50px; color: #62acde; margin-right: 5px; }
    .removeBtn { margin-left: auto; color: #de4343;}
</style>