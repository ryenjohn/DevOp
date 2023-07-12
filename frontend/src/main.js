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
// Admin page (test)
import SearchBar from './components/searchbar/SearchBar.vue'
import listUser from './components/adminpage/ListUser.vue'
app.component('search-bar', SearchBar);
app.component('list-user', listUser);

// HidedeLimiter
import HidedeLimiter from './components/hidedelimiters/HidedeLimiter.vue'

// Footer bar
import FooterBar from './components/footer/FooterBar.vue'
import FooterIcon from './components/footer/FooterIcon.vue'
import FooterAvatar from './components/footer/FooterAvatar.vue'
import FooterDetails from './components/footer/FooterDetails.vue'

// side bar 
import SideBar from './components/navbars/SideBar.vue'
app.component("side-bar",SideBar)
// Navigation bar
import NavigationBar from './components/navbars/NavigationBar.vue'
import NavigationBarRight from './components/navbars/NavigationBarRight.vue'
import NavigationBarLink from './components/navbars/NavigationBarLink.vue'

import NavigationBarContent from './components/navbars/NavigationBarContent.vue'
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






app.component('hidede-limiter', HidedeLimiter);
app.component('navigation-bar', NavigationBar);
app.component('navigationbar-right', NavigationBarRight);
app.component('navigationbar-link', NavigationBarLink);

app.component('card-item', CardItemDetail);
app.component('base-card', BaseCard);
app.component('card-info', CardInfo);
app.component('card-container', CardContainer);
app.component('base-button', BaseButton);
app.component('base-dialog', BaseDialog);


app.component('title-text', TitleView);

//university
app.component('footer-bar', FooterBar);
app.component('footer-icon', FooterIcon);
app.component('footer-avatar', FooterAvatar);
app.component('footer-details', FooterDetails);




//About page
import AboutOurSchoolMission from '../src/components/about/OurSchool/OurSchoolMission.vue'
app.component('aboutmissionour-school', AboutOurSchoolMission);
import AboutOurSchoolVision from '../src/components/about/OurSchool/OurSchoolVision.vue'
app.component('aboutvisionour-school', AboutOurSchoolVision);

import AboutOurTeam from '../src/components/about/OurTeam/AboutOurTeam.vue'
app.component('aboutour-team', AboutOurTeam);

import OurTeamMember from '../src/components/about/OurTeam/OurTeamMember.vue'
app.component('ourteam-member', OurTeamMember);

//Contact page
import ContactBar from '../src/components/contact/ContactBar.vue'
app.component('contact-bar', ContactBar);




app.use(router);
app.use(vuetify);
app.mount('#app');

