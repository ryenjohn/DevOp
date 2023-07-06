<template>
    <div class="cardMajor" v-for="(major, index) in listMajor"  :key="index" >
        <h1>{{major.name}}</h1>
        <div class="card">
            <img :src="major.image" alt="">
            <div class="text">
                <p><span>Description:</span> {{major.description}}</p>
                <p><span>Name:</span> {{major.name}}</p>
            </div>
        </div>
        <button>

            <router-link :to="`/majorDetail/${major.id}`">majorDetail</router-link>
        </button>
    </div>
</template>

<script>


// import axios from 'axios';

export default ({
    props:['listMajor'],
    // data(){
//         return {
//             showMajor:{},
//             url: 'http://127.0.0.1:8000/api/majors',
//         }
//     },

//     methods:{
//         Detail(index){
//             console.log(index);
//             axios.get(this.url+"/"+index).then((response) =>{
//                 this.showMajor = response.data.data;
//                 console.log(response.data.data)
//             })
//             // return  this.$router.currentRoute.value.params.index;
//         },
    
//         mounted() {
//             this.getMajorDetail();
//         },
//     }
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