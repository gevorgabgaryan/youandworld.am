
// #mainNav .navbar-brand
   let strbrend=document.querySelector('#mainNav .navbar-brand').innerHTML

  document.querySelector('#mainNav .navbar-brand').innerHTML=''
       k=0
     
    var partnerbutton=setInterval(()=>{
        document.querySelector('#mainNav .navbar-brand').innerHTML+=strbrend[k++];
      
        if(k==strbrend.length+1){
              document.querySelector('#mainNav .navbar-brand').innerHTML='';
              k=0;
             
        }
    },200)

// comment

    $(document).ready(function($){
  $('.form-group').each(function(i){

  })

  $('#commentform').on('click', '#submit', function(e){
    e.preventDefault();
    
     var comParent=$(this);
     $('.wrap_result').css('color','green').text('Մեկնաբանությոան պահպանում').fadeIn(500, function(){
       var data=$('#commentform').serializeArray();

       $.ajax({
        url:$('#commentform').attr("action"),
        data:data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        type:"POST",
        datatype:'JSON',
        success:function(html){

          if(html.error){


                  
                  $('.wrap_result').css('color', 'red').append('<br><strong> Սխալ </strong>'+html.error.join('<br>'));
                  $('.wrap_result').delay(2000).fadeOut(500);

          }else {
            $('.wrap_result').append('<br><strong>Ավելացվել է </strong>').delay(2000).fadeOut(500,function(){
                      

        $('#respond').before('  <div class="comment-box" id="comments">'+html.comment+'</div>');

                 
                    })

          }
        
            
       },
        error:function(){

          $('.wrap_result').css('color', 'red').append('<br><strong> Սխալ </strong>');
          $('.wrap_result').delay(2000).fadeOut(500);



        }

       })

     });

  })
})

    // topbutton
    window.addEventListener('scroll',()=>{

      // if(document.body.scrollTop>50){
            document.getElementById('topbutton').style.display='block' ; 
     // }else{
     //        document.queryselector('#topbutton').style.display=''; 
     // }
  
   })
