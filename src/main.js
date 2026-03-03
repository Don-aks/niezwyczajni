import Header from '@/modules/Header';
import Nav from '@/modules/Nav';
import ScrollAnimator from '@/modules/ScrollAnimator';
import Swipers from '@/modules/Swipers';
import AboutBannerLinks from '@/modules/AboutBannerLinks';
import AboutMissionSliderArrows from '@/modules/AboutMissionSliderArrows';
import StickyCta from '@/modules/StickyCta';
import Videos from '@/modules/Videos';

import '@/styles/reset.scss';
import '@/styles/fonts.scss';
import '@/styles/variables.scss';
import '@/styles/utilities.scss';
import '@/styles/globals.scss';
import '@/styles/animations.scss';

import '@/components/icon.scss';
import '@/components/buttons/btn.scss';
import '@/components/section.scss';
import '@/components/header/header.scss';
import '@/components/nav/nav.scss';
import '@/components/contact-info/contact-info.scss';
import '@/components/footer/footer.scss';
import '@/components/sticky-cta/sticky-cta.scss';

new Header();
new Nav();
const swipers = new Swipers();
new ScrollAnimator();
new AboutBannerLinks(swipers.instances);
new AboutMissionSliderArrows(swipers.instances);
new Videos();
new StickyCta();
