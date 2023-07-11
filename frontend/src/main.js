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
app.component('navigation-bar', NavigationBar);
app.component('navigationbar-right', NavigationBarRight);
app.component('navigationbar-link', NavigationBarLink);

//About page
import AboutOurSchoolMission from '../src/components/about/OurSchool/OurSchoolMission.vue'
app.component('aboutmissionour-school', AboutOurSchoolMission);
import AboutOurSchoolVision from '../src/components/about/OurSchool/OurSchoolVision.vue'
app.component('aboutvisionour-school', AboutOurSchoolVision);

import AboutOurTeam from '../src/components/about/OurTeam/AboutOurTeam.vue'
app.component('aboutour-team', AboutOurTeam);

import OurTeamMember from '../src/components/about/OurTeam/OurTeamMember.vue'
app.component('ourteam-member', OurTeamMember);



app.use(vuetify)
app.use(router)
app.mount('#app')
