 $(function(){
   var a=audiojs.createAll({
     trackEnded: function(){
       var next=$('ol li.playing').next();
       if (!next.length)
       next=$('ol li').first();
       next.addClass('playing').siblings().removeClass('playing');
       audio.load($('a', next).attr('data-src'));
       audio.play();
     }
   });
   var audio=a[0];
   first=$('ol a').attr('data-src');
   $('ol li').first().addClass('playing');
   audio.load(first);
   $('ol li').click(function(e){
     e.preventDefault();
     $(this).addClass('playing').siblings().removeClass('playing');
     audio.load($('a', this).attr('data-src'));
     audio.play();
   });
 });
