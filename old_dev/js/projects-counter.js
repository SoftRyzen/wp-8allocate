/** ####################################################################################################################
 *
 *
 *  ----------------------------------------            CONSTRAINTS            -----------------------------------------
 *
 *
 */// ##################################################################################################################

const $buttonsSwitchPerson = $('.buttons-person');
const $projects = $('.projects');
const $projectFeedbackContainer = $('.project-feedback-container');


/** ####################################################################################################################
 *
 *
 *  ----------------------------            FUNCTIONS WITHOUT JQUERY (PURE CODE)            ----------------------------
 *
 *
 */// ##################################################################################################################

const displayCounterWithProjects = ( numberOfProjects ) => {
  resetDigits();
  const digitBoxes = document.getElementsByClassName('digit');
  if (Number.isInteger(numberOfProjects)) {
    numberOfProjects = numberOfProjects.toString();
  }
  let maxUnits = numberOfProjects.length;
  for (let i = 0; i < maxUnits; i++) {
    ( digitBoxes[ digitBoxes.length - i - 1 ] ).innerText = numberOfProjects[ numberOfProjects.length - i - 1 ];
  }
};

const resetDigits = () => {
  const digitBoxes = document.getElementsByClassName('digit');
  for (let i = 0; i < digitBoxes.length; i++) {
    ( digitBoxes[ i ] ).innerText = 0;
  }
}

/** ####################################################################################################################
 *
 *
 *  ------------------------------            FUNCTIONS WITH JQUERY (BAD CODE)            ------------------------------
 *
 *
 */// ##################################################################################################################

$buttonsSwitchPerson.on('click', 'button', ( event ) => {
  const $button = $(event.currentTarget);
  if ($button.text() === "LFT") {
    $projectFeedbackContainer.slick("slickPrev")
  } else if ($button.text() === "RGHT") {
    $projectFeedbackContainer.slick("slickNext");
  }
})

/** ####################################################################################################################
 *
 *
 *  -----------------------------------------            INITIALIZE            -----------------------------------------
 *
 *
 */// ##################################################################################################################

$projects.slick({
  slidesToShow: 4,
  accessibility: false,
  autoplay: true,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  swipe: false,
  vertical: true,
  autoplaySpeed: 0,
  speed: 2000,
  cssEase:'linear',
});

$projectFeedbackContainer.slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  accessibility: false,
  autoplay: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  swipe: false,
  speed: 600,
});

$projects.on('beforeChange', function ( event, slick, currentSlide, nextSlide ) {
  displayCounterWithProjects(nextSlide + 1);
});
