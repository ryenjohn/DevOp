<template>
    <card-item>
        <!-- <template #title><v-card-title>Royal University of Phnom Penh</v-card-title></template> -->
        <template #img>    <v-img
            class="align-end text-white"
            height="200"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            cover
            >
            </v-img>
        </template>
        <template #info>    
            <v-card-text>
                <div> <strong>Name: </strong>Whitehaven Beach stro</div>
                <div> <strong>Description: </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas fugit alias harum voluptatum voluptas veritatis tenetur expedita consequuntur delectus, nulla at quia blanditiis ea. Velit reiciendis suscipit harum ipsum labore.</div>
                <iframe class="mt-8" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15636.102953370799!2d104.92916978110985!3d11.550011341730425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310956d330da8527%3A0x7eff3ca8d12ecc0f!2sKoh%20Pich!5e0!3m2!1sen!2snl!4v1688563080575!5m2!1sen!2snl"></iframe>
            </v-card-text>
        </template>
    </card-item>
</template>
<style scoped>
 iframe{
  width:100%; height:200px;
 }
</style>