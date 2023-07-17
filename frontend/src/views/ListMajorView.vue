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
    </div></template>

<script>
export default ({
    props:['listMajor'],
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