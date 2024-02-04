$(document).ready(function(){
    let pageNum = 1;
   $('.next').on('click',function(){
        let id = $(this).data('id');
        let next = id+1;
        let prev = id;
        
        let nextPage = '#page'+next;
        let prevPage = '#page'+prev;
          let progressBar ='#p'+next;

        $(progressBar).addClass('active');
        $(nextPage).show();
        $(nextPage).css('left','0');
        $(nextPage).css('visibility','visible');
        $(prevPage).hide();

   });
   $('.back').on('click',function(){
     let id = $(this).data('id');
     let next = id;
     let prev = id-1;
     
     let nextPage = '#page'+next;
     let prevPage = '#page'+prev;
       let progressBar ='#p'+prev;

     $(progressBar).addClass('active');
     $(nextPage).hide();
     $(prevPage).show();
     $(prevPage).css('left','0');
     $(prevPage).css('visibility','visible');
     

});



});