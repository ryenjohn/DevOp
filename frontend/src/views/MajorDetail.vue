<template>
    <div class="cardMajor">
        <h1>{{showMajor.name}}</h1>
        <div class="card">
            <img :src="showMajor.image" alt="">
            <div class="text">
                <p><span>Description:</span> {{showMajor.description}}</p>
                <p><span>Name:</span> {{showMajor.name}}</p>
            </div>
        </div>
    </div>
   
</template>

<script>

import axios from 'axios';
export default ({

    data(){
        return {
            showMajor:{},
            url: 'http://127.0.0.1:8000/api/majors/',
           
            
        }
    },

    methods:{
        Detail(){
            const id = this.$route.params.id;
            console.log(id);
            axios.get(`http://127.0.0.1:8000/api/majors/${id}`).then((response) =>{
                this.showMajor = response.data.data;
                console.log(response.data.data)
            })
        },
        
    
        
    },
    mounted() {
        this.Detail();
    }
    
})

</script>


<style scoped>
img{
    width: 100%;
    height: 400px;
}
span{
    font-weight: bold;
}
.cardMajor{
    display: flex;
    flex-direction: column;
    align-items: center;
}
h1{
    color: white;
}
.card{
    background:white;
    width: 80%;
}
p{
    text-align: start;
    padding: 5px 50px;
}
</style>
