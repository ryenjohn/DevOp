import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
const vuetify = createVuetify({
  components,
  directives,
})

// Include globaly all widgets
import BaseCard from './components/widgets/card/BaseCard.vue';
import CardInfo from './components/widgets/card/CardInfo.vue';
import CardContainer from './components/widgets/card/CardContainer.vue';
import CardItemDetail  from './components/widgets/card/CardDetail.vue';
import BaseButton from './components/widgets/button/BaseButton.vue';
import BaseDialog from './components/widgets/dialog/BaseDialog.vue';

// Include globaly all components
import SkillDetail from './components/SkillDetail.vue';
import ListSkill from './components/ListSkill.vue';
import ListWorkshop from './components/ListWorkshop.vue';
import ListScholarship from './components/ListScholarship.vue';
import ListUniversity from './components/ListUniversity.vue';
import CardDetail from './components/CardDetail.vue';
import TitleView from './components/TitleView.vue';
import UniversityInSkill from './components/UniversityInSkill.vue';

const app = createApp(App);

app.component('list-university', ListUniversity);
app.component('list-workshop', ListWorkshop);
app.component('list-scholarship', ListScholarship);
app.component('list-skill', ListSkill);
app.component('card-detail', CardDetail);
app.component('card-item', CardItemDetail);
app.component('base-card', BaseCard);
app.component('card-info', CardInfo);
app.component('card-container', CardContainer);
app.component('base-button', BaseButton);
app.component('base-dialog', BaseDialog);
app.component('title-text', TitleView);
app.component('skill-detail', SkillDetail);
app.component('university-skill', UniversityInSkill);
// app.component('card-container', CardContainer);

app.use(router);
app.use(vuetify);
app.mount('#app');

