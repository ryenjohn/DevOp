<template>
    <div class="container">
        <h1>Student Request </h1>
        <div class="student-card">
            <div class="card" v-for="user in users" :key="user">
                <div class="card-left">
                    <span class="material-icons"> person </span>
                    <!-- <img src="https://o.remove.bg/downloads/73a87ac7-bf34-4516-afdb-19f67939951a/image-removebg-preview.png" alt="" style="width:50px"> -->
                    <h3>{{user.name}}</h3>
                </div>
                <div class="card-right">
                    <!-- https://vuetifyjs.com/en/components/dialogs/ -->
                    <v-row justify="center">
                        <v-dialog
                        v-model="dialog"
                        persistent
                        width="1024"
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
                        <v-card>
                            <v-card-title>
                                <span class="text-h5">User Profile</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <h4>{{user.name}}</h4>
                                    <p>{{user.email}}</p>
                                    <p>{{user.phone}}</p>
                                    <p>{{user.gender}}</p>
                                    <!-- <v-row>4
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                            label="Legal first name*"
                                            required
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                            label="Legal middle name"
                                            hint="example of helper text only on focus"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row> -->
                                </v-container>
                                <small>*indicates required field</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="blue-darken-1"
                                    variant="text"
                                    @click="dialog = false"
                                >
                                    Close
                                </v-btn>
                                <v-btn
                                    color="blue-darken-1"
                                    variant="text"
                                    @click="dialog = false"
                                >
                                    Save
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </v-row>

                    <v-btn color="#634B7A" v-bind="props" style="color:white" >Accept</v-btn>
                    <v-btn color="#EFAA1D" v-bind="props" style="color:white">Reject</v-btn>
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
        axios.get(`${ process.env.VUE_APP_API_URL}users`)
        .then((response)=>{
            this.users = response.data.data

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
.student-card{
    display: flex;
    flex-direction: column;
    gap: 20px;
}
h1{
    margin-left: 20%;
    margin-bottom: 3%
    ;
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
/* .btn{
    width: 120px;
    padding: 0px 15px;
    border-radius: 15px;
    color: white;
    box-shadow: rgba(24, 24, 24, 0.25) 0px 14px 28px, rgba(49, 49, 49, 0.22) 0px 10px 10px;
}
.one{
    background-color: white;
    color: black;

}
.two{
    background-color: #634B7A;

}
.three{
    background-color:#EFAA1D;

} */

</style>
