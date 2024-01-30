$(document).ready(function(){
    let pageNum = 1;
   $('.next').on('click',function(){
        let id = $(this).data('id');
        let next = id+1;
        let prev = id;
        
        let nextPage = '#page'+next;
        let prevPage = '#page'+prev;

        $(nextPage).show();
        $(nextPage).css('left','0');
        $(nextPage).css('visibility','visible');
        $(prevPage).hide();

   })

});