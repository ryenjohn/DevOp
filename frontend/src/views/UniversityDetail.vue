<template>
  <div class="home">
    <card-detail></card-detail>
    <title-text>Choose Skills</title-text>
    <list-skill></list-skill>
    <title-text>Choose Workshops</title-text>
    <list-workshop></list-workshop>
    <title-text>Choose Scholarships</title-text>
    <list-scholarship></list-scholarship>
  </div>
</template>

<script>
import ListScholarship from '../components/ListScholarship.vue'
import ListWorkshop from '../components/ListWorkshop.vue'
export default {
  components: { ListWorkshop, ListScholarship },
}
</script>