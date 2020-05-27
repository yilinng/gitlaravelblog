<template>
    <div>
        <button @click="btnClick"></button>
        <h3 v-show="result">oldestpost list</h3>

    </div>

</template>

<script>
    export default {
        mounted(){
            console.log('Component mounted.')
        },
        data:function (){
            return{
                result:true
            };

        },
        methods: {
            btnClick: function(){
                this.result = !this.result;
        },
    },

}




</script>

<style>



</style>
