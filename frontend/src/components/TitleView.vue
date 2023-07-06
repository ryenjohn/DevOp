<template>
    <div class="title">
        <slot></slot>
        <hr>
    </div>
</template>
<style scoped>
    .title{
        margin-left: 20px;
        color:var(--secondary-color);
        font-weight: bold;
        text-align: center;
        margin-top:10px;
        margin-bottom:-10px;
    }
</style>