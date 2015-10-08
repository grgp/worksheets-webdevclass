$(document).ready(function(){
  $("#readmore_07").click(function(){
      $("#post_07").load("misc/ajax/content_readMore_07.txt").hide().fadeIn(1000);
      $("#readmore_07").hide();
  });

  $("#readmore_08").click(function(){
      $("#post_08").load("misc/ajax/content_readMore_08.txt").hide().fadeIn(1000);
      $("#readmore_08").hide();
  });

  $("#readmore_06").click(function(){
      $("#post_06").load("misc/ajax/content_readMore_06.txt").hide().fadeIn(1000);
      $("#readmore_06").hide();
  });

});