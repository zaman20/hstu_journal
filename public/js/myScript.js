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

  $('.dlt-btn').on('click',function(){
    let id = $(this).data('id');
    $('#setId').val(id);

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        });
        $('#dltForm').submit();
      }
    });
  })


});