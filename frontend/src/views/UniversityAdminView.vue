<template>
    <side-bar class="side-bar" @show="show"></side-bar>
    <student-request v-if="content=='student'" @show="show"></student-request>
    <list-scholarship v-if="content=='scholarship'" @edit="edit" :school_id="school_id" @add="add"></list-scholarship>
    <add-scholarship v-if="addScholarship" @show="show" :school_id="school_id"> </add-scholarship>
    <edit-scholarship v-if="editScholarship" :editID="editID" :school_id="school_id" @show="show"></edit-scholarship>

    <list-workshop v-if="content=='workshop'" :school_id="school_id" @updateWorkshop="updateWorkshop" @createWorkshop="createWorkshop"></list-workshop>
    <add-workshop v-if="addWorkshop" @show="show" :school_id="school_id"></add-workshop>
    <edit-workshop v-if="editWorkshop" :workshopId="workshopId" :school_id="school_id"  @show="show"></edit-workshop>

    <list-major v-if="content=='major'" :school_id="school_id" @createMajor="createMajor"></list-major>
    <add-major v-if="addMajor" @show="show" :school_id="school_id"></add-major>
</template>

<script>
import Cookies from 'js-cookie';
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
            workshopId: '',
            school_id:''
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
        schoolID(){
           
            const userData = Cookies.get('userData');
            if (userData) {
                const userDataObj = JSON.parse(userData);
                this.school_id= userDataObj.data.school_id
             }
        }
       
    },
    mounted(){
        this.schoolID()
    }

}
</script>

<style>

</style>