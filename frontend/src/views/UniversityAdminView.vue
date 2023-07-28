<template>
    <side-bar class="side-bar" @show="show"></side-bar>
    <student-request v-if="content=='student'" @show="show"></student-request>
    <list-scholarship v-if="content=='scholarship'" @edit="edit" @add="add"></list-scholarship>
    <add-scholarship v-if="addScholarship" @show="show"> </add-scholarship>
    <edit-scholarship v-if="editScholarship" :editID="editID" @show="show"></edit-scholarship>

    <list-workshop v-if="content=='workshop'" @updateWorkshop="updateWorkshop" @createWorkshop="createWorkshop"></list-workshop>
    <add-workshop v-if="addWorkshop" @show="show"></add-workshop>
    <edit-workshop v-if="editWorkshop" :workshopId="workshopId"  @show="show"></edit-workshop>

    <list-major v-if="content=='major'" @createMajor="createMajor"></list-major>
    <add-major v-if="addMajor"></add-major>
</template>

<script>
export default {
    data(){
        return{
            editScholarship:false,
            addScholarship:false,
            addWorkshop:false,
            editWorkshop: false,
            addMajor: false,
            studentRequest: false,
            content:'',
            editID:'',
            workshopId: ''
        }
    },
    methods:{
        show(contentName){
            this.editScholarship=false
            this.addScholarship = false
            this.addWorkshop = false
            this.editWorkshop = false
            this.addMajor = false
            this.content = contentName
        },
        edit(id){
            this.editScholarship=true
            this.editWorkshop = false;
            this.content=''
            this.editID = id 
        },
        add(){
           this.addScholarship = true;
           this.addWorkshop = false;
           this.content='';
        },
        createWorkshop(){
           this.addScholarship = false;
           this.addWorkshop = true;
           this.content='';
        },
        updateWorkshop(id){
            this.editScholarship=false;
            this.editWorkshop = true;
            this.content='';
            this.workshopId = id 
        },
        createMajor(){
           this.addScholarship = false;
           this.addWorkshop = false;
           this.addMajor = true;
           this.content='';
        },
       
    },
    mounted(){
        this.content='student'
    }

}
</script>

<style>

</style>