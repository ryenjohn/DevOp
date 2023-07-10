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

// contents
import contentList from './components/contents/ContentList.vue'
import scholarshipContent from './components/contents/ScholarshipWorkshopList.vue'
app.component('content-list', contentList);
app.component('scholarship-workshop-card', scholarshipContent);


// map
import mapShow from './components/Map/MapShow.vue'
app.component('map-show', mapShow);



// Include globaly all widgets
import BaseCard from './components/widgets/card/BaseCard.vue';
import CardInfo from './components/widgets/card/CardInfo.vue';
import CardContainer from './components/widgets/card/CardContainer.vue';
import CardItemDetail  from './components/widgets/card/CardDetail.vue';
import BaseButton from './components/widgets/button/BaseButton.vue';
import BaseDialog from './components/widgets/dialog/BaseDialog.vue';




// content title
import TitleView from './components/contents/ContentTitle.vue';







app.component('card-item', CardItemDetail);
app.component('base-card', BaseCard);
app.component('card-info', CardInfo);
app.component('card-container', CardContainer);
app.component('base-button', BaseButton);
app.component('base-dialog', BaseDialog);


app.component('title-text', TitleView);





app.use(vuetify)
app.use(router)
app.mount('#app')

