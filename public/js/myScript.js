$(document).ready(function(){
  $('.dlt-btn').on('click',function(){
    //alert('hi');
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
  });
  $('.next').on('click',function(){
        let id = $(this).data('id');
       
        var author = $(this).data('author');

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

     
        if( id ==1){
    
          var type = $('#type').val();
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc1',
            method: 'POST',
            data: {type:type, author:author},
            success:function(data){
              $('#s_id').val(data);
             
            }
          });
         
        }else if(id == 2){
          var cdata = $('input[name="classification"]:checked').val();
          var sid = $('#s_id').val();
        
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc2',
            method: 'POST',
            data:{cdata:cdata,sid:sid},
            success:function(data){
              $('#s_id2').val(data);
              console.log(data)
             
            }
          });
        }
        else if(id == 3){
          var cdata = $('input[name="reviewers"]').val();
          var sid = $('#s_id2').val();
      
        
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc3',
            method: 'POST',
            data:{cdata:cdata,sid:sid},
            success:function(data){
              console.log(data)
              $('#s_id3').val(data);
            }
          });
        }
        else if(id == 4){
          var cdata = $('input[name="language"]:checked').val();
          var sid = $('#s_id3').val();
      
        
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc4',
            method: 'POST',
            data:{cdata:cdata,sid:sid},
            success:function(data){
              console.log(data)
              $('#s_id4').val(data);
            }
          });
        }
        else if(id == 5){
          var cdata = $('#comment').val();
          var sid = $('#s_id4').val();
      
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc5',
            method: 'POST',
            data:{cdata:cdata,sid:sid},
            success:function(data){
              console.log(data)
              $('#s_id5').val(data);
            }
          });
        }
        else if(id == 6){
          var title = $('input[name="title"]').val();
          var abstract = $('input[name="abstract"]').val();
          var keyword = $('input[name="keyword"]').val();
          var sid = $('#s_id5').val();
      
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/inc6',
            method: 'POST',
            data:{title:title,abstract:abstract,keyword:keyword,sid:sid},
            success:function(data){
              console.log(data)
              $('#s_id6').val(data);
            }
          });
        }else{
          console.log('Eror');
        }
     

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