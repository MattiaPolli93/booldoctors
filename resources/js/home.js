window.Vue = require('vue');

const Home = {
    data() {
        return {
            prova: [],
        }
    },


}


Vue.createApp(Home).mount('#home')

// FUNZIONE HOME
const scrollElements = document.querySelectorAll(".js-scroll");
const elementInView = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;
  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement = (element) => {
  element.classList.add("scrolled");
};

//
const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
  scrollElements.forEach((el) => {
    if (elementInView(el, 1.3)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el)
    }
  })
}
window.addEventListener("scroll", () => {
  handleScrollAnimation();
});


// FUNZIONE DASHBOARD
const scrollElements2 = document.querySelectorAll(".js-scroll2");
const elementInView2 = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;
  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView2 = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement2 = (element) => {
  element.classList.add("scrolled2");
};

//
const hideScrollElement2 = (element) => {
  element.classList.remove("scrolled2");
};

const handleScrollAnimation2 = () => {
  scrollElements2.forEach((el) => {
    if (elementInView2(el, 2)) {
      displayScrollElement2(el);
    } else if (elementOutofView2(el)) {
      hideScrollElement2(el)
    }
  })
}
window.addEventListener("scroll", () => {
  handleScrollAnimation2();
});
