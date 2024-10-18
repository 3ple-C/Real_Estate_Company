/*
  Template Name: NewVilla - Real Estate HTML Template
  Author Name: Hook theme
  Author URL: https://themeforest.net/user/hooktheme
  Version: 1.0.0
*/
AOS.init({
  once: true,
  disable: function () {
    var maxWidth = 767;
    return window.innerWidth < maxWidth;
  },
});


"use strict";


const preLoader = function () {
  let preloaderWrapper = document.getElementById("preloader");
  window.onload = () => {
    let isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
    if (!isMobile) {
      setTimeout(function () {
        preloaderWrapper.classList.add("preloaded");
      }, 300);
      setTimeout(function () {
        preloaderWrapper.remove();
      }, 1000);
    } else {
      preloaderWrapper.remove();
    }
  };
};
preLoader();

/* getSiblings */
var getSiblings = function (elem) {
  const siblings = [];
  let sibling = elem.parentNode.firstChild;
  while (sibling) {
    if (sibling.nodeType === 1 && sibling !== elem) {
      siblings.push(sibling);
    }
    sibling = sibling.nextSibling;
  }
  return siblings;
};

/* Slide Up */
var slideUp = (target, time) => {
  const duration = time ? time : 500;
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.boxSizing = "border-box";
  target.style.height = target.offsetHeight + "px";
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

/* Slide Down */
var slideDown = (target, time) => {
  const duration = time ? time : 500;
  target.style.removeProperty("display");
  let display = window.getComputedStyle(target).display;
  if (display === "none") display = "block";
  target.style.display = display;
  const height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = height + "px";
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

/* Get window top offset */
function TopOffset(el) {
  let rect = el.getBoundingClientRect(),
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return { top: rect.top + scrollTop };
}

/* Header sticky activation */
const headerStickyWrapper = document.querySelector("header");
const headerStickyTarget = document.querySelector(".header__sticky");

if (headerStickyTarget) {
  let headerHeight = headerStickyWrapper.clientHeight;
  window.addEventListener("scroll", function () {
    let StickyTargetElement = TopOffset(headerStickyWrapper);
    let TargetElementTopOffset = StickyTargetElement.top;

    if (window.scrollY > TargetElementTopOffset) {
      headerStickyTarget.classList.add("sticky");
    } else {
      headerStickyTarget.classList.remove("sticky");
    }
  });
}

/* Scroll up activation */
const scrollTop = document.getElementById("scroll__top");
if (scrollTop) {
  scrollTop.addEventListener("click", function () {
    window.scroll({ top: 0, left: 0, behavior: "smooth" });
  });
  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      scrollTop.classList.add("active");
    } else {
      scrollTop.classList.remove("active");
    }
  });
}


/* active class remove class activation */
const activeClassAction = function (toggle, target) {
  const to = document.querySelector(toggle),
    ta = document.querySelector(target);
  if (to && ta) {
    to.addEventListener("click", function (e) {
      e.preventDefault();
      let triggerItem = e.target;
      if (triggerItem.classList.contains("active")) {
        triggerItem.classList.remove("active");
        ta.classList.remove("active");
      } else {
        triggerItem.classList.add("active");
        ta.classList.add("active");
      }
    });
    document.addEventListener("click", function (event) {
      if (
        !event.target.closest(toggle) &&
        !event.target.classList.contains(toggle.replace(/\./, ""))
      ) {
        if (
          !event.target.closest(target) &&
          !event.target.classList.contains(target.replace(/\./, ""))
        ) {
          to.classList.remove("active");
          ta.classList.remove("active");
        }
      }
    });
  }
};

activeClassAction(".account__currency--link", ".dropdown__currency");
activeClassAction(".language__switcher", ".dropdown__language");


/* Offcanvas Mobile Menu Function */
const offcanvasHeader = function () {
  const offcanvasOpen = document.querySelector(
    ".offcanvas__header--menu__open--btn"
  ),
    offcanvasClose = document.querySelector(".offcanvas__close--btn"),
    offcanvasHeader = document.querySelector(".offcanvas__header"),
    offcanvasMenu = document.querySelector(".offcanvas__menu"),
    body = document.querySelector("body");
  /* Offcanvas SubMenu Toggle */
  if (offcanvasMenu) {
    offcanvasMenu
      .querySelectorAll(".offcanvas__sub_menu")
      .forEach(function (ul) {
        const subMenuToggle = document.createElement("button");
        subMenuToggle.classList.add("offcanvas__sub_menu_toggle");
        ul.parentNode.appendChild(subMenuToggle);
      });
  }
  /* Open/Close Menu On Click Toggle Button */
  if (offcanvasOpen) {
    offcanvasOpen.addEventListener("click", function (e) {
      e.preventDefault();
      if (e.target.dataset.offcanvas != undefined) {
        offcanvasHeader.classList.add("open");
        body.classList.add("mobile_menu_open");
      }
    });
  }
  if (offcanvasClose) {
    offcanvasClose.addEventListener("click", function (e) {
      e.preventDefault();
      if (e.target.dataset.offcanvas != undefined) {
        offcanvasHeader.classList.remove("open");
        body.classList.remove("mobile_menu_open");
      }
    });
  }

  /* Mobile submenu slideToggle Activation */
  let mobileMenuWrapper = document.querySelector(".offcanvas__menu_ul");
  if (mobileMenuWrapper) {
    mobileMenuWrapper.addEventListener("click", function (e) {
      let targetElement = e.target;
      if (targetElement.classList.contains("offcanvas__sub_menu_toggle")) {
        const parent = targetElement.parentElement;
        if (parent.classList.contains("active")) {
          targetElement.classList.remove("active");
          parent.classList.remove("active");
          parent
            .querySelectorAll(".offcanvas__sub_menu")
            .forEach(function (subMenu) {
              subMenu.parentElement.classList.remove("active");
              subMenu.nextElementSibling.classList.remove("active");
              slideUp(subMenu);
            });
        } else {
          targetElement.classList.add("active");
          parent.classList.add("active");
          slideDown(targetElement.previousElementSibling);
          getSiblings(parent).forEach(function (item) {
            item.classList.remove("active");
            item
              .querySelectorAll(".offcanvas__sub_menu")
              .forEach(function (subMenu) {
                subMenu.parentElement.classList.remove("active");
                subMenu.nextElementSibling.classList.remove("active");
                slideUp(subMenu);
              });
          });
        }
      }
    });
  }

  if (offcanvasHeader) {
    document.addEventListener("click", function (event) {
      if (
        !event.target.closest(".offcanvas__header--menu__open--btn") &&
        !event.target.classList.contains(
          ".offcanvas__header--menu__open--btn".replace(/\./, "")
        )
      ) {
        if (
          !event.target.closest(".offcanvas__header") &&
          !event.target.classList.contains(
            ".offcanvas__header".replace(/\./, "")
          )
        ) {
          offcanvasHeader.classList.remove("open");
          body.classList.remove("mobile_menu_open");
        }
      }
    });
  }

  /* Remove Mobile Menu Open Class & Hide Mobile Menu When Window Width in More Than 991 */
  if (offcanvasHeader) {
    window.addEventListener("resize", function () {
      if (window.outerWidth >= 992) {
        offcanvasHeader.classList.remove("open");
        body.classList.remove("mobile_menu_open");
      }
    });
  }
};
offcanvasHeader();



/* lightbox Activation */
const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
    <div class="gloader visible"></div>
    <div class="goverlay"></div>
    <div class="gcontainer">
    <div id="glightbox-slider" class="gslider"></div>
    <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example">{nextSVG}</button>
    <button class="gprev gbtn" tabindex="1" aria-label="Previous">{prevSVG}</button>
    <button class="gclose gbtn" tabindex="2" aria-label="Close">{closeSVG}</button>
    </div>
    </div>`;
const lightbox = GLightbox({
  touchNavigation: true,
  lightboxHTML: customLightboxHTML,
  loop: true,
});

/* hero thumbnail swiper activation */
var swiper = new Swiper(".hero__thumbnail--swiper", {
  slidesPerView: 1,
  loop: true,
  clickable: true,
  spaceBetween: 30,
  speed: 1700,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: ".hero__thumbnail--slider .swiper-pagination",
    clickable: true,
  },
});

/* product swiper column4 activation */
var swiper = new Swiper(".featured__column4", {
  slidesPerView: 4,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    1366: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: ".featured__inner .swiper-button-next",
    prevEl: ".featured__inner .swiper-button-prev",
  },
});

/* popular featured column5 activation */
var swiper = new Swiper(".popular__featured--column5", {
  slidesPerView: 5,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 1200,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    1200: {
      slidesPerView: 5,
      spaceBetween: 30,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


/* testimonial swiper column2 activation */
var swiper = new Swiper(".testimonial__swiper--column2", {
  slidesPerView: 2,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    1200: {
      spaceBetween: 30,
      slidesPerView: 2,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 30,
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: ".testimonial__container .swiper-button-next",
    prevEl: ".testimonial__container .swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

/* blog column3 activation */
var swiper = new Swiper(".blog__column3", {
  slidesPerView: 3,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    1200: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
    768: {
      spaceBetween: 30,
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
});

/* brand logo column6 activation */
var swiper = new Swiper(".brand__logo--column6", {
  slidesPerView: 6,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    1200: {
      spaceBetween: 30,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 6,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 6,
    },
    576: {
      slidesPerView: 5,
      spaceBetween: 30,
    },
    480: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
    300: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    200: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});

/* about thumbnail swiper activation */
var swiper = new Swiper(".about__thumbnail--swiper", {
  slidesPerView: 1,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 1500,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: ".about__thumbnail--slider .swiper-pagination",
    clickable: true,
  },
});

/* testimonial swiper column1 activation */
var swiper = new Swiper(".testimonial__swiper--column1", {
  slidesPerView: 1,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 1500,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: " .swiper-pagination",
    clickable: true,
  },
});

/* testimonial style4 column1 activation */
var swiper = new Swiper(".testimonial__style4--column1", {
  slidesPerView: 1,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
});

/* best selling column1 activation */
var swiper = new Swiper(".best__selling--column1", {
  slidesPerView: 1,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
});

/* team member column2 activation */
var swiper = new Swiper(".team__member--column2", {
  slidesPerView: 2,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    480: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
});


/* hero swiper column3 activation */
var swiperColumn3 = new Swiper(".hero__swiper--column3", {
  slidesPerView: 3,
  loop: false,
  clickable: true,
  spaceBetween: 15,
  speed: 800,
  breakpoints: {
    350: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    200: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    0: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: " .swiper-button-next",
    prevEl: " .swiper-button-prev",
  },
});

/* hero swiper column1 activation */
var swiper = new Swiper(".hero__swiper--column1", {
  slidesPerView: 3,
  loop: false,
  clickable: true,
  spaceBetween: 20,
  speed: 1500,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  thumbs: {
    swiper: swiperColumn3,
  },
});


/* hero swiper column3 activation */
var swiperColumnGallery = new Swiper(".testimonial__gallery--swiper", {
  slidesPerView: 3,
  loop: true,
  clickable: true,
  spaceBetween: 15,
  speed: 800,
  direction: 'vertical',
  autoHeight: true,
  centeredSlides: true,
  breakpoints: {
    350: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    200: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: " .swiper-pagination",
    clickable: true,
  },

});

/* hero swiper column1 activation */
var swiper = new Swiper(".testimonial__content--swiper", {
  slidesPerView: 1,
  loop: true,
  clickable: true,
  spaceBetween: 20,
  speed: 1500,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
  },
  thumbs: {
    swiper: swiperColumnGallery,
  },
  pagination: {
    el: " .swiper-pagination",
    clickable: true,
  },
});


/* product swiper column4 activation */
var swiper = new Swiper(".featured__column3", {
  slidesPerView: 3,
  loop: false,
  clickable: true,
  spaceBetween: 30,
  speed: 800,
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: " .swiper-pagination",
    clickable: true,
  },
});


/* gallery swiper activation */
var swiper = new Swiper(".gallery__column3", {
  loop: true,
  clickable: true,
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerView: "auto",
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    0: {
      slidesPerView: 1,
    },
  },
});


/* CounterUp Activation */
const wrapper = document.getElementById("funfactId");
if (wrapper) {
  const counters = wrapper.querySelectorAll(".js-counter");
  const duration = 1000;

  let isCounted = false;
  document.addEventListener("scroll", function () {
    const wrapperPos = wrapper.offsetTop - window.innerHeight;
    if (!isCounted && window.scrollY > wrapperPos) {
      counters.forEach((counter) => {
        const countTo = counter.dataset.count;

        const countPerMs = countTo / duration;

        let currentCount = 0;
        const countInterval = setInterval(function () {
          if (currentCount >= countTo) {
            clearInterval(countInterval);
          }
          counter.textContent = Math.round(currentCount);
          currentCount = currentCount + countPerMs;
        }, 1);
      });
      isCounted = true;
    }
  });
}

/* Footer widget Activation */
let accordion = true;
const footerWidgetAccordion = function () {
  accordion = false;
  let footerWidgetContainer = document.querySelector(".main__footer");
  footerWidgetContainer?.addEventListener("click", function (evt) {
    let singleItemTarget = evt.target;
    if (singleItemTarget.classList.contains("footer__widget--button")) {
      const footerWidget = singleItemTarget.closest(".footer__widget"),
        footerWidgetInner = footerWidget.querySelector(
          ".footer__widget--inner"
        );
      if (footerWidget.classList.contains("active")) {
        footerWidget.classList.remove("active");
        slideUp(footerWidgetInner);
      } else {
        footerWidget.classList.add("active");
        slideDown(footerWidgetInner);
        getSiblings(footerWidget).forEach(function (item) {
          const footerWidgetInner = item.querySelector(
            ".footer__widget--inner"
          );

          item.classList.remove("active");
          slideUp(footerWidgetInner);
        });
      }
    }
  });
};

window.addEventListener("load", function () {
  if (accordion) {
    footerWidgetAccordion();
  }
});
window.addEventListener("resize", function () {
  document.querySelectorAll(".footer__widget").forEach(function (item) {
    if (window.outerWidth >= 768) {
      item.classList.remove("active");
      item.querySelector(".footer__widget--inner").style.display = "";
    }
  });
  if (accordion) {
    footerWidgetAccordion();
  }
});

/* fullwidth video  Activation */
const video = document.getElementById("video");
const circlePlayButton = document.getElementById("circle-play-b");
function togglePlay() {
  if (video.paused || video.ended) {
    video.play();
  } else {
    video.pause();
  }
}
if (video) {
  video.addEventListener("click", togglePlay);
  video.addEventListener("playing", function () {
    circlePlayButton.style.opacity = 0;
  });
  video.addEventListener("pause", function () {
    circlePlayButton.style.opacity = 1;
  });

}

/* Price filtering Activation */
const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".price-slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});


/* OffCanvas Sidebar Activation */
function offcanvsSidebar(openTrigger, closeTrigger, wrapper) {
  let OpenTriggerprimary__btn = document.querySelectorAll(openTrigger);
  let closeTriggerprimary__btn = document.querySelector(closeTrigger);
  let WrapperSidebar = document.querySelector(wrapper);
  let wrapperOverlay = wrapper.replace(".", "");

  function handleBodyClass(evt) {
    let eventTarget = evt.target;
    if (!eventTarget.closest(wrapper) && !eventTarget.closest(openTrigger)) {
      WrapperSidebar.classList.remove("active");
      document
        .querySelector("body")
        .classList.remove(`${wrapperOverlay}_active`);
    }
  }
  if (OpenTriggerprimary__btn && WrapperSidebar) {
    OpenTriggerprimary__btn.forEach(function (singleItem) {
      singleItem.addEventListener("click", function (e) {
        if (e.target.dataset.offcanvas != undefined) {
          WrapperSidebar.classList.add("active");
          document
            .querySelector("body")
            .classList.add(`${wrapperOverlay}_active`);
          document.body.addEventListener("click", handleBodyClass.bind(this));
        }
      });
    });
  }

  if (closeTriggerprimary__btn && WrapperSidebar) {
    closeTriggerprimary__btn.addEventListener("click", function (e) {
      if (e.target.dataset.offcanvas != undefined) {
        WrapperSidebar.classList.remove("active");
        document
          .querySelector("body")
          .classList.remove(`${wrapperOverlay}_active`);
        document.body.removeEventListener("click", handleBodyClass.bind(this));
      }
    });
  }
}

/* Search Bar */
offcanvsSidebar(
  ".search__open--btn",
  ".predictive__search--close__btn",
  ".predictive__search--box"
);

/* Location Tab JS */
const countryList = document.querySelectorAll(".location__list");
const countryThumbList = document.querySelectorAll(".location__thumbnail");

if (countryList.length > 0) {
  countryList.forEach((country) => {
    country?.addEventListener("click", (event) => {
      countryList.forEach((childItem) => {
        childItem.classList.remove("active");
      })
      country.classList.add("active");
      // Thumbnail active class
      countryThumbList.forEach((countryThumb) => {
        countryThumb.classList.add("d-none");
        countryThumb.classList.remove("d-block");
        if (countryThumb.dataset.locationName === country.dataset.locationName) {
          countryThumb.classList.remove("d-none");
          countryThumb.classList.add("d-block");
        }
      })
    })
  })
}

/** Service single page app */
const changeContent = (page) => {
  let contentDiv = document.getElementById('content');
  let miniContent = document.getElementById('content2');
  switch (page) {
    case 'survey':
      contentDiv.innerHTML = `
				<div class="services__details--wrapper" id="content">
                        <div class="services__details--thumbnail mb-30">
                            <img src="assets/img/main_pics/image-850x603.jpg" alt="img">
                        </div>
                        <div class="services__details--content">
                            <div class="services__details--content__step mb-30">
                                <h2 class="services__details--title">GENERAL SURVEY</h2>
                                <p class="services__details--desc">We provide comprehensive land survey services, ensuring accurate property boundaries, precise measurements, and reliable land documentation for all types of real estate projects.</p>
                            </div>
                            <div class="services__details--info mb-40 d-flex">
                                <div class="services__details--info__content">
                                    <h3 class="services__details--info__title">What Makes Us Unique</h3>
                                    <p class="services__details--info__desc">Lorem ipsum dolor sit amet, consectetur adipisicin elit
                                        sed do eiusmod tempor incididunt ut labore et </p>
                                    <ul class="services__details--info__ui-content">
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Research beyond the business plan</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span>Marketing options and rates</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> The ability to turnaround consulting</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Customer engagement matters</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="services__details--content__step">
                                <p class="services__details--desc">Need something changed or is there something not quite working the way you envisaged? Is your van a
                                    little old and tired and need refreshing? Lorem Ipsum is simply dummy text of the printing and typesett
                                    industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
                                    only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
			`;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">General Survey</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/survey (2).jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Inquiry & Investigation</h3>
                                    <p class="widget__img--gallery__desc">Lorem ipsum dolor sit amet, conse adipisicing elit,
                                        sed do eiusmod tempor</p>
                                </div>
                            </div>
      `;
      break;

    case 'supply':
      contentDiv.innerHTML = `
				<div class="services__details--wrapper" id="content">
                        <div class="services__details--thumbnail mb-30">
                            <img src="assets/img/main_pics/image-850x603 (2).jpg" alt="img">
                        </div>
                        <div class="services__details--content">
                            <div class="services__details--content__step mb-30">
                                <h2 class="services__details--title">BUILDING CONTRACTORS AND BUILDING MATERIALS SUPPLY</h2>
                                <p class="services__details--desc">Our building contractor services oversee all aspects of construction, ensuring projects are completed to the highest standards. Additionally, we supply top-quality building materials, providing everything needed to complete your project efficiently and reliably, from start to finish. With a commitment to excellence, we manage everything from initial planning to final execution, delivering results that exceed expectations.</p>
                            </div>
                            <div class="services__details--info mb-40 d-flex">
                                <div class="services__details--info__content">
                                    <h3 class="services__details--info__title">Materials we supply</h3>
                                    <p class="services__details--info__desc">Our goal is to provide a seamless experience from start to finish: </p>
                                    <ul class="services__details--info__ui-content">
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Structural components (lumber, steel)</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span>Finishing materials (drywall, flooring)</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Fixtures and fittings (plumbing, electrical)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="services__details--content__step">
                                <p class="services__details--desc">We begin by collaborating closely with clients to understand their vision and requirements. By overseeing all aspects of construction and supplying top-quality building materials, we ensure that your projects are not only completed efficiently but also built to last. With our expertise at your side, you can trust that your vision will be realized with precision and care, resulting in a successful outcome every time.</p>
                            </div>
                        </div>
                    </div>
			`;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">Building Contractors and materials supply</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/building-materials.jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Construction & Development</h3>
                                    <p class="widget__img--gallery__desc">Our team assists in developing detailed project plans that outline timelines, budgets, and design specifications.</p>
                                </div>
                            </div>
      `;
      break;

    case 'consultancy':
      contentDiv.innerHTML = `
        <div class="services__details--wrapper" id="content">
            <div class="services__details--thumbnail mb-30">
                <img src="assets/img/main_pics/offer-house.jpg" alt="img">
            </div>
            <div class="services__details--content">
                <div class="services__details--content__step mb-30">
                    <h2 class="services__details--title">REAL ESTATE PROFESSIONAL CONSULTANCY</h2>
                    <p class="services__details--desc">Our real estate professional consultancy offers expert guidance and tailored solutions for all your property needs. From buying and selling to development and management, our team of seasoned professionals will navigate you through the complex world of real estate with confidence and clarity. 
</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Whether you are considering buying or selling a property, developing a new project, or managing an existing portfolio, we understand that navigating the complexities of the real estate market can be daunting. That's why we take a personalized approach, taking the time to understand your goals and aspirations. By doing so, we can craft tailored solutions that align with your vision and objectives.
                    </p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Our consultancy is built on a foundation of trust and transparency. We believe in fostering open communication with our clients, providing you with the information and insights necessary to make informed decisions. From market analysis to strategic planning, our team is dedicated to equipping you with the knowledge and confidence needed to navigate every step of the process.
In an ever-evolving real estate landscape, we stay ahead of the curve by continuously monitoring market trends and economic indicators. This proactive approach allows us to provide you with timely advice and innovative strategies that enhance your opportunities for success.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">With our expert guidance, you can approach your real estate endeavors with clarity and assurance. We are here to support you at every turn, ensuring that your experience is not only successful but also rewarding. Let us partner with you in achieving your real estate goals, turning your aspirations into reality while navigating the complexities of this dynamic industry together.</p>
                </div>
            </div>
        </div>
      `;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">Real Estate Professional Consultancy</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/real-estate-searching-with-characters_23-2148650960.jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Expert Consultation</h3>
                                    <p class="widget__img--gallery__desc">Personalized advice from experienced professionals to guide you in making informed decisions.</p>
                                </div>
                            </div>
      `;
      break;

    case 'mgt':
      contentDiv.innerHTML = `
        <div class="services__details--wrapper" id="content">
            <div class="services__details--thumbnail mb-30">
                <img src="assets/img/main_pics/selective-focus-design-architecture.jpg" alt="img">
            </div>
            <div class="services__details--content">
                <div class="services__details--content__step mb-30">
                    <h2 class="services__details--title">REAL ESTATE DEVELOPMENT AND MANAGEMENT</h2>
                    <p class="services__details--desc">Real estate development and management involves the planning, construction, and maintenance of properties. We oversee every phase, from initial design to project completion, ensuring quality builds, strategic investments, and efficient management to maximize value and long-term returns for property owners.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc"> At our firm, we take pride in our comprehensive approach to overseeing every aspect of property development and management, from the initial spark of an idea to the ongoing maintenance of a thriving property.
                    </p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Our journey begins with careful planning and design, where we work closely with architects, engineers, and urban planners to create properties that not only meet current market demands but also anticipate future trends. We believe that successful real estate development is as much about foresight as it is about addressing immediate needs. By leveraging our deep understanding of market dynamics and demographic shifts, we craft designs that stand the test of time.
As we move into the construction phase, our team's commitment to quality becomes evident. We collaborate with trusted contractors and suppliers, ensuring that every nail, beam, and fixture meets our exacting standards. Our on-site supervisors maintain a vigilant presence, coordinating the myriad of activities that bring a property to life. This hands-on approach allows us to address challenges swiftly and keep projects on track, both in terms of timeline and budget.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Throughout the entire process, our goal remains constant: to maximize value and long-term returns for property owners. We achieve this through a combination of strategic decision-making, quality execution, and attentive management. Our team's diverse expertise allows us to navigate the complexities of real estate development and management with confidence, turning visions into reality and investments into thriving assets.
By entrusting your real estate endeavors to us, you gain a partner dedicated to realizing the full potential of your properties. From the first blueprint to the day-to-day operations of a completed project, we are committed to excellence in every aspect of real estate development and management.</p>
                </div>
            </div>
        </div>
        `;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">Real Estate Development and Management</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/devmgt.jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Property Listings</h3>
                                    <p class="widget__img--gallery__desc"> A diverse range of homes, land, and investment opportunities tailored to your lifestyle and budget.
                                      </p>
                                </div>
                            </div>
      `;
      break;

    case 'contractors':
      contentDiv.innerHTML = `
        <div class="services__details--wrapper" id="content">
            <div class="services__details--thumbnail mb-30">
                <img src="assets/img/main_pics/selective-focus-design-architecture.jpg" alt="img">
            </div>
            <div class="services__details--content">
                <div class="services__details--content__step mb-30">
                    <h2 class="services__details--title">GENERAL CONTRACTORS</h2>
                    <p class="services__details--desc">Our general contracting services manage every aspect of your construction project, from start to finish. We coordinate skilled teams, source quality materials, and ensure timelines and budgets are met, delivering high-quality results with efficiency and professionalism.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">From the moment a project begins, our team takes charge of the entire process. We start by collaborating closely with you to understand your vision, goals, and specific requirements. This foundational step allows us to create a detailed project plan that outlines timelines, budgets, and key milestones, ensuring that everyone is aligned from the outset.
                    </p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc"> Our network includes experienced tradespeople, subcontractors, and specialists who are dedicated to delivering exceptional results. By fostering strong relationships with these teams, we ensure that the work is performed efficiently and to the highest standards.
                      Sourcing quality materials is another critical aspect of our general contracting services. We leverage our industry connections to procure top-grade materials that not only meet your specifications but also enhance the durability and aesthetic appeal of the finished product. Our commitment to quality extends beyond just the labor; we believe that using superior materials is essential for achieving lasting results.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">In summary, our general contracting services offer a holistic approach to construction management. By overseeing every aspect of your project with efficiency and professionalism, we transform your vision into reality while ensuring that the final outcome exceeds your expectations. With us as your partner in construction, you can be confident that your project will be executed flawlessly from start to finish.</p>
                </div>
            </div>
        </div>
        `;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">Real Estate Development and Management</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/devmgt.jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Market Insights</h3>
                                    <p class="widget__img--gallery__desc"> The latest real estate trends, market reports, and investment opportunities to keep you ahead.
                                      </p>
                                </div>
                            </div>
      `;
      break;

    case 'prop-mgt':
      contentDiv.innerHTML = `
        <div class="services__details--wrapper" id="content">
            <div class="services__details--thumbnail mb-30">
                <img src="assets/img/main_pics/image-850x603 (3).jpg" alt="img">
            </div>
            <div class="services__details--content">
                <div class="services__details--content__step mb-30">
                    <h2 class="services__details--title">PROPERTY MANAGEMENT</h2>
                    <p class="services__details--desc">Our property management services handle the day-to-day operations of your real estate assets. From tenant management and maintenance to rent collection and financial reporting, we ensure your property is well-maintained, maximizing its value and providing peace of mind.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc"> We implement thorough tenant screening processes to attract reliable occupants who will care for your property and pay rent on time. Our proactive approach includes addressing tenant inquiries and concerns promptly, fostering positive relationships that encourage long-term leases and reduce turnover.
                    </p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Maintenance is another critical component of our property management services. We take a hands-on approach to ensure that your property remains in excellent condition. Our team coordinates regular inspections and preventive maintenance to identify potential issues before they escalate into costly repairs. When maintenance requests arise, we respond swiftly, utilizing a network of trusted contractors to address repairs efficiently and effectively. This commitment to upkeep not only enhances tenant satisfaction but also preserves the long-term value of your asset.
Rent collection is managed with precision and professionalism. We establish clear payment processes and utilize modern technology to facilitate timely payments, minimizing delays and ensuring consistent cash flow. Our financial reporting services provide you with transparent insights into your property's performance, including income statements, expense reports, and budget forecasts. This level of transparency empowers you to make informed decisions regarding your investment.</p>
                </div>
                <div class="services__details--content__step">
                    <p class="services__details--desc">Ultimately, our property management services are designed to maximize the value of your real estate assets while providing you with the freedom to focus on other priorities. With our expertise in tenant management, maintenance coordination, rent collection, and financial reporting, we ensure that your property operates smoothly and efficiently. By entrusting us with your property management needs, you gain a partner committed to enhancing your investment’s performance and delivering peace of mind every step of the way.</p>
                </div>
            </div>
        </div>
        `;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">Real Estate Development and Management</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="https://img.freepik.com/premium-vector/qualified-real-estate-agent-concept-realtor-assistance-help-mortgage-contract-real-estate-vector_566886-1658.jpg?ga=GA1.1.1430551096.1723722676&semt=ais_hybrid" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Property Management</h3>
                                    <p class="widget__img--gallery__desc">  We recognize the importance of providing peace of mind to property owners.
                                      </p>
                                </div>
                            </div>
      `;
      break;

    default:
      contentDiv.innerHTML = ` 
        <div class="services__details--wrapper" id="content">
                        <div class="services__details--thumbnail mb-30">
                            <img src="assets/img/main_pics/image-850x603.jpg" alt="img">
                        </div>
                        <div class="services__details--content">
                            <div class="services__details--content__step mb-30">
                                <h2 class="services__details--title">GENERAL SURVEY</h2>
                                <p class="services__details--desc">We provide comprehensive land survey services, ensuring accurate property boundaries, precise measurements, and reliable land documentation for all types of real estate projects. Our team of experienced surveyors utilizes cutting-edge technology and time-tested methodologies to provide accurate, reliable, and detailed land information for a wide range of applications.</p>
                            </div>
                            <div class="services__details--info mb-40 d-flex">
                                <div class="services__details--info__content">
                                    <h3 class="services__details--info__title">What Makes Us Unique</h3>
                                    <!-- <p class="services__details--info__desc"> </p> -->
                                    <ul class="services__details--info__ui-content">
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Ensuring Accurate Property Boundaries</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span>Precise Measurements for All Project Types</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Reliable Land Documentation</li>
                                        <li><span><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9538 2.40018C11.0418 3.23218 10.1538 4.20018 9.28981 5.30418C8.53781 6.25618 7.86181 7.23218 7.26181 8.23218C6.71781 9.12818 6.32181 9.89618 6.07381 10.5362C6.06581 10.5602 6.04981 10.5802 6.02581 10.5962C6.00181 10.6202 5.97381 10.6322 5.94181 10.6322C5.93381 10.6402 5.92581 10.6442 5.91781 10.6442C5.86181 10.6442 5.82181 10.6282 5.79781 10.5962L1.51381 6.24018C1.50581 6.23218 1.60981 6.12818 1.82581 5.92818C2.04181 5.72018 2.25381 5.53218 2.46181 5.36418C2.69381 5.17218 2.81781 5.08418 2.83381 5.10018L5.18581 6.94818C5.87381 6.14018 6.64581 5.34018 7.50181 4.54818C8.78981 3.36418 10.1178 2.35618 11.4858 1.52418C11.5098 1.52418 11.6018 1.63618 11.7618 1.86018L12.0018 2.20818C12.0098 2.24018 12.0098 2.27618 12.0018 2.31618C11.9938 2.34818 11.9778 2.37618 11.9538 2.40018Z" fill="currentColor" />
                                                </svg>
                                            </span> Advanced Technology and Expertise</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="services__details--content__step">
                                <p class="services__details--desc">By providing these comprehensive land survey services, we aim to give you the confidence and clarity needed to move forward with your real estate projects, whether you're a homeowner, developer, or investor. Our accurate property boundaries, precise measurements, and reliable land documentation serve as the solid foundation upon which successful real estate ventures are built.</p>
                            </div>
                        </div>
                    </div>
      `;
      miniContent.innerHTML = `
         <h2 class="widget__step--title">General Survey</h2>
                            <div class="widget__img--gallery">
                                <div class="widget__img--gallery__thumbnail mb-20">
                                    <img src="assets/img/main_pics/survey (2).jpg" alt="img">
                                </div>
                                <div class="widget__img--gallery__content">
                                    <h3 class="widget__img--gallery__title">Inquiry & Investigation</h3>
                                    <p class="widget__img--gallery__desc">We understand the importance of accurate land documentation in real estate transactions </p>
                                </div>
                            </div>
      `;
  }
}
