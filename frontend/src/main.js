import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'vuetify/dist/vuetify.min.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
const vuetify = createVuetify({
  components,
  directives,
})

const app = createApp(App);
// Search bar
import SearchBar from './components/searchbar/SearchBar.vue'
app.component('search-bar', SearchBar);

// HidedeLimiter
import HidedeLimiter from './components/hidedelimiters/HidedeLimiter.vue'

// Footer bar
// import FooterBar from './components/footer/FooterBar.vue'
// import FooterIcon from './components/footer/FooterIcon.vue'
// import FooterAvatar from './components/footer/FooterAvatar.vue'
// import FooterDetails from './components/footer/FooterDetails.vue'


// Navigation bar
import NavigationBar from './components/navbar/NavigationBar.vue'
import NavigationBarRight from './components/navbar/NavigationBarRight.vue'
import NavigationBarLink from './components/navbar/NavigationBarLink.vue'


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

//university detail


app.component('hidede-limiter', HidedeLimiter);
app.component('navigation-bar', NavigationBar);
app.component('navigationbar-right', NavigationBarRight);
app.component('navigationbar-link', NavigationBarLink);

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
