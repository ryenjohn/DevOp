<template>
    <side-bar class="side-bar" @show="show"></side-bar>
    <student-request-container class="student-request-container" v-if="content=='student'"></student-request-container>
    <edit-scholarship v-if="editScholarship" :editID="editID" @show="show"></edit-scholarship>
    <list-scholarship v-if="content=='scholarship'" @edit="edit" @add="add"></list-scholarship>
    <add-scholarship v-if="addScholarship" @show="show"> </add-scholarship>
</template>



<script>
export default {
    data(){
        return{
            editScholarship:false,
            addScholarship:false,
            content:'',
            editData:{},
            editID:''
        }
    },
    methods:{
        show(contentName){
            this.editScholarship=false,
            this.addScholarship = false,
            this.content = contentName
        },
        edit(id){

            this.editScholarship=true
            this.content=''
            this.editID = id 
        },
        add(){
           this.addScholarship = true;
           this.content=''
        }
       
    }

}
</script>

<style>

</style>