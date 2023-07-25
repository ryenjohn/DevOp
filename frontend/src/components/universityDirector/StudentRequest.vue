<template>
    <div class="container">
        <h1>Student Request </h1>
        <div class="student-card" >
            <div class="card" v-for="(user,index) in users" :key="index"  :user="user">
                <div class="card-left">
                    <span class="material-icons"> person </span>
                    <h3>{{user.user_id.name}}</h3>
                </div>
                <div class="card-right">
                    <!--code from https://vuetifyjs.com/en/components/dialogs/ -->
                    <v-row justify="center">
                        <v-dialog
                        class="dialog"
                        v-model="dialog"
                        persistent
                        width="400"
                    
                        >
                        <template v-slot:activator="{ props }">
                            <v-btn
                            color="#ffffff"
                            v-bind="props"
                            style="margin-top:11px; margin-right:10px"
                            >
                            Student Info
                            </v-btn>
                        </template>
                        <v-card style="border-radius: 20px; border:2px solid orange" >
                            <v-card-text class="contenter-card">
                                <v-container style="padding: 25px; display: flex; flex-direction: column; gap:10px; ">
                                    <div class="profile" style="display:flex; gap:20px; align-items:center">
                                        <span class="material-icons" style="font-size: 100px; margin-bottom:20px; ">person</span>
                                        <div class="name" >
                                            <h2>{{user.user_id.name}}</h2>
                                            <span>({{user.user_id.gender}})</span> 
                                        </div>   
                                    </div>
                                    <h4>{{user.user_id.email}}</h4>
                                    <p>{{user.user_id.phone}}</p>
                                    <p>Address: {{user.user_id.address.name}} </p>
                                    <p>street: {{user.user_id.address.street}}</p>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="#EFAA1D"
                                    variant="text"
                                    @click="dialog = false"
                                >
                                    Close
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </v-row>

                    <v-btn 
                        color="#634B7A" 
                        v-bind="props" 
                        style="color:white" 
                        @click="isAccept(user.id)"
                    >Accept</v-btn>
                    <v-btn 
                        color="#EFAA1D" 
                        v-bind="props" 
                        style="color:white" 
                        @click="isReject(user.id)"
                    >Reject</v-btn>
                </div>
            </div>
        </div>
    </div>
  
</template>



<script>
import axios from 'axios'

export default{
    data(){
        return{
            email: '',
            errors: null,
            users:[],
            dialog: false,
        }
    },
    methods:{
        
        getUser() {
            axios.get(`${ process.env.VUE_APP_API_URL}getSchoolUser`)
            .then((response)=>{
                this.users = response.data.data
                console.log(response.data.data)

            })
        },
        isAccept(id) {
            console.log(id)
            axios.put(`${process.env.VUE_APP_API_URL}acceptStudent/`+id)
            .then((response)=>{
                console.log(response.data.data);
                location.reload();

            })
        },

        isReject(id) {
            console.log(id)
            axios.delete(`${process.env.VUE_APP_API_URL}studentReject/`+id)
            .then((response)=>{
                console.log(response.data.data);
                location.reload();
            })
        }
    },

    mounted(){
        this.getUser();
    }
}
</script>




<style scoped>
.container{
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 3% 0%;
}
.dialog{
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
    display:flex; 
    border:1px solid grey;

}
.material-icons{
    border-radius: 50px;
    border: 1px solid grey;
}
.student-card{
    display: flex;
    flex-direction: column;
    gap: 20px;
}
h1{
    margin-left: 20%;
    margin-bottom: 3%;
}
.card{
    width: 75%;
    background:#ebeaea;
    margin-left: 20%;
    display: flex;
    justify-content: space-between;
    padding: 20px;
    border-radius: 10px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;

}
.card-left{
    display: flex;
    align-items: center;
    gap: 10px;

}
.card-right{
    padding: 5px;
    display: flex;
    gap: 20px;
}
</style>
