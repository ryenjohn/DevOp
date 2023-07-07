import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'vuetify/dist/vuetify.min.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
const vuetify = createVuetify({
  components,
  directives,
})
const app = createApp(App)

// Search bar
import SearchBar from './components/searchbar/SearchBar.vue'
app.component('search-bar', SearchBar);

// HidedeLimiter
import HidedeLimiter from './components/hidedelimiters/HidedeLimiter.vue'
app.component('hidede-limiter', HidedeLimiter);

// Footer bar
import FooterBar from './components/footer/FooterBar.vue'
import FooterIcon from './components/footer/FooterIcon.vue'
import FooterAvatar from './components/footer/FooterAvatar.vue'
import FooterDetails from './components/footer/FooterDetails.vue'
app.component('footer-bar', FooterBar);
app.component('footer-icon', FooterIcon);
app.component('footer-avatar', FooterAvatar);
app.component('footer-details', FooterDetails);

// Navigation bar
import NavigationBar from './components/navbar/NavigationBar.vue'
import NavigationBarRight from './components/navbar/NavigationBarRight.vue'
import NavigationBarLink from './components/navbar/NavigationBarLink.vue'
import NavigationBarContent from './components/navbar/NavigationBarContent.vue'
app.component('navigation-bar', NavigationBar);
app.component('navigationbar-right', NavigationBarRight);
app.component('navigationbar-link', NavigationBarLink);
app.component('navigationbar-content',NavigationBarContent)



app.use(vuetify)
app.use(router)
app.mount('#app')

// Include globaly all widgets
import BaseCard from './components/widgets/card/BaseCard.vue';
import CardInfo from './components/widgets/card/CardInfo.vue';
import CardContainer from './components/widgets/card/CardContainer.vue';
import CardItemDetail  from './components/widgets/card/CardDetail.vue';
import BaseButton from './components/widgets/button/BaseButton.vue';
import BaseDialog from './components/widgets/dialog/BaseDialog.vue';

// Include globaly all components
import ListSkill from './components/ListSkill.vue';
import ListWorkshop from './components/ListWorkshop.vue';
import ListScholarship from './components/ListScholarship.vue';
import ListUniversity from './components/ListUniversity.vue';
import CardDetail from './components/CardDetail.vue';
import TitleView from './components/TitleView.vue';

//university detail
import EachUniversity from './components/unversity/EachUniversityDetail.vue';
import EachMajor from './components/unversity/EachMajorDetail.vue';
import EachScholarship from './components/unversity/EachScholarshipDetail.vue';
import EachWorkshop from './components/unversity/EachWorkshopDetail.vue';


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
//university
app.component('each-univer', EachUniversity);
app.component('each-major', EachMajor);
app.component('each-workshop', EachWorkshop);
app.component('each-scholarship', EachScholarship);

// app.component('card-container', CardContainer);

app.use(router);
app.use(vuetify);
app.mount('#app');
