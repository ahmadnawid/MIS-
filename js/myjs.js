$(document).ready(function(){
    $('ul.submenu:not(.active)').css('display','none');
$('ul#main-menu li:not(.active)').mouseover(function(){
 var a = $(this).attr('id');
 //alert(a);
 $(this).addClass('hover');
 $('#sub-menu').css({'background':'#d8d8d8'});
 //$('ul.submenu>li>a').css({'background':'none'});
 $('ul.submenu.active').css('display','none');
 $('ul[menu='+a+']').css('display','block');
 }).mouseout(function(){
 var a = $(this).attr('id');
   $(this).removeClass('hover');
   $('#sub-menu').css({'background':'url('+base_url+'images/sub-nav.png)'});
   
 //$('ul.submenu>li>a').css({'background':'none'});
 $('ul.submenu.active').css('display','block');
 $('ul[menu='+a+']').css('display','none');
 })
 $('ul.dropdown-menu li').mouseover(function(){
     $(this).parent().prev().css('background','#555657');
 })
 $("ul.nav-tabs a").click(function (e) {
  e.preventDefault();  
    $(this).tab('show');
});
$(".sub ul li a").click(function (e) {
    $(".sub ul li a").css('border','none');
    $(this).css({'border':'none','border-bottom':'3px solid #33ac3f'});
});
$("ul.submenu li.dropdown a").mouseout(function (e){
    $(this).css({'background':'none'});
});
 //-----------------for registration----------
 $("form#student_register").submit(function(e){
        e.preventDefault();
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
       $('img#loader_reg').css('visibility','visible');
        $.ajax({
             url: formURL,
             type: 'POST',
             data:  formData,
             mimeType:"multipart/form-data",
             contentType: false,
             cache: false,
              processData:false,
                success:function(result){
                    $('img#loader_reg').css('visibility','hidden');
                    if(result==0)
                    {
                        alert('فیلد های ضروری را به دقت خانه پری کنید.')
                    }
                    else
                    {
                      $('#student_register').each(function(){ 
                        this.reset();   //Here form fields will be cleared.
                    });  
                    }
                }
        })  
 })
 //----------------for staff registration------------
 $("form#add_stuff").submit(function(e){
     e.preventDefault();
     var formObj = $(this);
     var formURL = formObj.attr("action");
     var formData = new FormData(this);
        $.ajax({
             url: formURL,
             type: 'POST',
             data:  formData,
             mimeType:"multipart/form-data",
             contentType: false,
             cache: false,
              processData:false,
                success:function(result){
                    if(result==0)
                    {
                        alert('متاسفانه کارمند جدید اضافه نشد,لطفا فیلدهای ضروری را به دقت پر نمایید.')
                    }
                    else
                    {
                      alert(result);
                      $('#add_stuff').each(function(){ 
                        this.reset();   //Here form fields will be cleared.
                    });  
                    }
                }
        })  
 })
 //-----------------for student mark data entry----------
 $("form#make_shuqa").submit(function(e){
        e.preventDefault();
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
             url: formURL,
             type: 'POST',
             data: formObj.serialize(),
             cache: false,
                success:function(result){
                    if(result==0)
                    {
                        alert('some problem in inserting student mark occured');
                    }
                    else
                    {
                        $('#making_shuqa').html(result).css('display','block');
                        $('#make_shuqa').each(function(){
                        this.reset();   //Here form fields will be cleared.
                    });   
                    }
                }
        })  
 })

 //-----------------adding new subject---------- 
 $("form#add_subject").submit(function(e){
        e.preventDefault();
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
             url: formURL,
             type: 'POST',
             data: formObj.serialize(),
             cache: false,
                success:function(result){
                    if(result==0)
                    {
                        alert('لطفا تمام فیلد های ضروری راپر کنید،همچنان کود مضمون نباید تکراری باشد');
                    }
                    else
                    {
                        alert(result);
                        $('#add_subject').each(function(){
                        this.reset();   //Here form fields will be cleared.
                    });   
                    }
                }
        })  
 })
//-----------------assign subject---------- 
 $("form#assign_subject").submit(function(e){
        e.preventDefault();
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
             url: formURL,
             type: 'POST',
             data: formObj.serialize(),
             cache: false,
                success:function(result){
                    if(result==0)
                    {
                        alert('تمام فیلد ها را انتخاب کنید');
                    }
                    else
                    {
                        alert(result);
                        $('#assign_subject').each(function(){
                        this.reset();   //Here form fields will be cleared.
                    });   
                    }
                }
        })  
 })
})
////load district in onchange of province
function load_district(id,html_respone)
{
    $.ajax({
                url:base_url+'setting/common_data/get_districts',
                type:'POST',
                data:{province:$('#'+id).val()},
                success:function(result){
                $('#'+html_respone).html(result);
                }
        })  
}
function load_data(form_id,target_controller,target_tag)
{
    $('#'+target_tag).css('opacity','0.1');
    $('img[data="'+target_tag+'"]').css('visibility','visible');
    $.ajax({
                url:base_url+target_controller,
                type:'POST',
                data:$('#'+form_id).serialize(),
                success:function(result){
                $('#'+target_tag).html(result).css('display','block');
                $('img[data="'+target_tag+'"]').css('visibility','hidden');
                $('#'+target_tag).css('opacity','1');  
                } 
        })
}
function sum_mark(input)
{
    if(!$.isNumeric(input.val()))
    {
        input.val('');
    }
    else
    {
       var x = input.attr('data');
       var sum = 0;
       $('input[data='+x+']').each(function(){
        if($(this).val()!='')
        {
            sum += Number($(this).val());  
        }
        if(Number(sum)>100)
        {
            $(this).val('');
        }
        else
        { 
            $('#total_mark'+x).val(sum);  
        } 
       })
    } 
}
function input_focus(focused_input)
{
   focused_input.blur(); 
}
function load_subject_pishniz(input_id,target_controller,target_tag)
{
   $.ajax({
                url:base_url+target_controller,
                type:'POST',
                data:{id:input_id.val()},
                success:function(result){
                $('#'+target_tag).html(result);
                }
        })    
}
//this function is for loading data in modal
function load_modal_data(identity,target_controller,target_tag)
{
    $('#'+target_tag).css('height','500px').html('<img style="position: relative;top:40%;right:45%;" src="'+base_url+'images/ajax-loader.gif"/>');
    $.ajax({
                url:base_url+target_controller,
                type:'POST',
                data:{identity:identity},
                success:function(result){
                $('#'+target_tag).css('height','').html(result); 
                } 
        })
}
//for enabling input
function enable_input(button_id,class_name,btn_save_id)
{
    $('.'+class_name).removeAttr('disabled');
    $(button_id).css('display','none');
    $('#'+btn_save_id).css('display','block');
}
//this function is for update data in modal
function update_modal_data(form_id,target_controller,target_tag)
{
    $('#'+target_tag).css('opacity','0');
    $('#modal-loader').css('display','block');
        $.ajax({
             url: base_url+target_controller,
             type: 'POST',
             data: $('#'+form_id).serialize(),
                success:function(result){
                    //if(result==0)
//                    {
//                       $('#'+target_tag).html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>تبریک میگم!</strong> موفقانه تصحیح شد.'); 
//                    }
                    //else
                    //{
                      $('#'+target_tag).html(result);   
                    //}
                    $('#modal-loader').css('display','none');
                    $('#'+target_tag).css('opacity','1');
                } 
        })
}
//this function is for paging
function load_page_pagination(target_url,html_response,starting,form_id)
{
    var fd = new FormData();
    var other_data = $('#'+form_id).serializeArray();
    $.each(other_data,function(key,input){
        fd.append(input.name,input.value);
    });
    fd.append('starting',starting);
    fd.append('form_id',form_id);
    fd.append('per_page',$('#per_page').val());
    $('#'+html_response).css('opacity','0.1');
    $('img#loader').css({'visibility':'visible','opacity':'1 !important'});
    $.ajax({
        url: target_url,
        data: fd,
        contentType: false,
        processData: false,
        type: 'POST',
        success:function(data){
         $('#'+html_response).html(data);
         $('#loader').css('visibility','hidden');
         $('#'+html_response).css('opacity','1');
        }
    });
}
$(function() {
    $('#s_photo').submit(function(e) {
        e.preventDefault();
        $('#full-width *').css('opacity','0');
        $('#modal-loader').css({'display':'block','opacity':'1'});
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
             url: formURL,
             type: 'POST',
             data:  formData,
             mimeType:"multipart/form-data",
             contentType: false,
             cache: false,
              processData:false,
                success:function(result){
                        $('#full-width').html(result);
                }
        })
    })
});
function load_dropdown_data(form_id,target_controller,target_dropdwon)
{
     $.ajax({
                url:base_url+target_controller,
                type:'POST',
                data:$('#'+form_id).serialize(),
                success:function(result){
                $('#'+target_dropdwon).html(result); 
                } 
        })
}
function checkbox(own,tag_id,own_dropdown,other_dropdown)
{
    own.attr('checked','checked');
    $('#'+tag_id).removeAttr('checked');
    $('#'+other_dropdown).css('display','none');
    $('#'+own_dropdown).css('display','block');
}
function printDiv(id) {

  var html = "";

  $('link').each(function() { // find all <link tags that have
    if ($(this).attr('rel').indexOf('stylesheet') !=-1) { // rel="stylesheet"
      html += '<link rel="stylesheet" href="'+$(this).attr("href")+'" />';
    }
  });
  html += '<body onload="window.focus(); window.print()">'+$("#"+id).html()+'</body>';
  var w = window.open("","print");
  if (w) { w.document.write(html); w.document.close() }

}