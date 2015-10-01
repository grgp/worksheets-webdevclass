const ANIMATION_TIME = 600;
const CAROUSEL_WIDTH = 400;
const NB_OF_PHOTOS = 4;
const TIME_BETWEEN_PHOTOS = 3000;
var activePhoto = 1;
var timer;

var clickLeft = function(){
  changeListOrderLeft();
  $('#slides ul').animate({left: getPos() + CAROUSEL_WIDTH}, ANIMATION_TIME);
  setActivePhoto(-1);
  resetTimer();
}

var clickRight = function(){
  $('#slides ul').animate({left: getPos() - CAROUSEL_WIDTH}, ANIMATION_TIME, changeListOrderRight );
  setActivePhoto(+1);
  resetTimer();
}

var getPos = function(){
  return $('#slides ul').position().left ;
}

var changeListOrderRight = function(){
  $('#slides ul').css('left', 0); 
  $('#slides ul').find("li:last").after($('#slides ul').find("li:first"));
}

var changeListOrderLeft = function(){
  $('#slides ul').find("li:first").before($('#slides ul').find("li:last"));
  $('#slides ul').css('left',-CAROUSEL_WIDTH); 
}

var setActivePhoto = function(nb){
  activePhoto += nb;
  if(activePhoto>NB_OF_PHOTOS)
    activePhoto -= NB_OF_PHOTOS;
  if(activePhoto<1)
    activePhoto += NB_OF_PHOTOS;

  $('.circle').removeClass('active');
  $('.'+activePhoto).addClass('active');
}

var jumpToSlide = function(slide){
  var jump = slide - activePhoto;
  if (jump>0){
    for(var i = 0; i < jump  ;i++){
      $('#slides ul').animate({left: getPos() - CAROUSEL_WIDTH}, 0, changeListOrderRight );
      setActivePhoto(+1);
    }
  }
  else{
    for(var i = 0; i < -jump  ;i++){
      changeListOrderLeft();
      $('#slides ul').animate({left: getPos() + CAROUSEL_WIDTH}, 0);
      setActivePhoto(-1);
    }
  }
  resetTimer();
}

var showPreview = function(){

}

var time = function(){
  clickRight();
}

var resetTimer = function(){
   clearTimeout(timer);
   timer = setTimeout(time, TIME_BETWEEN_PHOTOS);
}

var addCircles = function(){
  for (var i = 1;i<NB_OF_PHOTOS + 1;i++){
    $('.circles ul').append('<li><div onClick="jumpToSlide('+i+')" class="circle '+ i+'"></div></li>')
  }
  $('.'+activePhoto).addClass('active');
  var width = 40*NB_OF_PHOTOS-20;
  $('.circles').css('width', width);
  $('.circles').css('margin-left', (CAROUSEL_WIDTH-width)/2);
}


$(document).ready(function(){
  addCircles();
  resetTimer();
})