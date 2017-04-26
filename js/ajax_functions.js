function ajax_search(target_url,html_response,form_id)
{
 $("#loading_image").show();
  $.ajax({
                url:target_url,
                type:'POST',
                data:$('#'+form_id).serialize(),
                success:function(data){
                 $("#loading_image").hide();
                $('#'+html_response).html(data);
                }
        })  
}//*********************************
function load_dropdown(dropdown_id,target_url,dropdown_name,first_dropdown,last_dropdown)
{
    if(first_dropdown==1){
     $("#ajax_image_faculty").show();   
    }
    if(first_dropdown==2){
      $("#ajax_image_dep").show();  
    } 
    if(dropdown_id.val()==0)
    {
        for(var i=first_dropdown;i<=last_dropdown;i++)
        {
           $('#'+dropdown_name+i).html('<option value="0">همه</option>'); 
        }
    }
    else
    {
       $.ajax({
        url:target_url,
        type:'POST',
        data:{id:dropdown_id.val()},
        success:function(response){
          $('#'+dropdown_name+first_dropdown).html(response);
          $("#ajax_image_dep").hide();
          $("#ajax_image_faculty").hide();  
        }
       }) 
    }
}//*************************************
function delete_bfd(url_target,record_id,response){
                        var bfd_data={branch_id:record_id}
                        $.ajax({
                               url:url_target,
                                type:'POST',
                                data:bfd_data,
                                success:function(data){
                                  $('#'+response).html(data);  
                                }
                        })//--------------------------------------------------
} //
function delete_bfd_record(target1,response,form_id,target2){
                                $.ajax({
                                           url:target1,
                                            type:'POST',
                                            data:$('#'+form_id).serialize(),
                                            success:function(data){
                                                    $.ajax({
                                                            url:target2,
                                                            type:'POST',
                                                            data:$('#'+form_id).serialize(),
                                                            success:function(data){
                                                                       $('#'+response).html(data);
                                                                       }
                                                                    })  
                                            }
                                        })
                            }//-------------------------------------------- 
function edit_bfd_record(url_target,tp,html_respose,form_id,$url){
    (function($,W,D){
                        var JQUERY4U = {};
                        JQUERY4U.UTIL ={
                            setupFormValidation: function(){
                                if(tp=='d'){
                                            $("#"+form_id).validate({
                                                rules: {
                                                        dep_name:{
                                                                    required:true,
                                                                    minlength:2,
                                                                    maxlength:80
                                                                 },
                                                        dep_boss: {
                                                                    required:true,
                                                                    minlength:3,
                                                                    maxlength:80
                                                                  },
                                                        pr_id: {
                                                                    required: true,
                                                                   },
                                                        br_id: {
                                                                    required: true,
                                                                   },
                                                        fc_id:{
                                                                    required:true
                                                                    },
                                                    },
                                             messages: {
                                                        dep_name:{
                                                                    required: "لطفا نام دیپارتمنت را وارد کنید",
                                                                    minlength:'نام دیپارتمنت کمتر از دوحرف بوده نمیتواند',
                                                                    maxlength:"نام دیپارتمنت بیشتر 80 حرف بوده نمیتواند"
                                                                    },
                                                        dep_boss:{
                                                                    required:"لطفا نام رییس را وارد کنید",
                                                                    minlength:"نام رییس کمتر اسه حرف بوده نمیتواند",
                                                                    maxlength:"نام رییس نمیتواند بیشتر از 80 حرف باشد"
                                                                    },
                                                        pr_id:{
                                                                        required:"لطفا ولایت را انتخاب کنید"
                                                                        },
                                                        br_id: {
                                                                    required: "لطفا شعبه را انتخاب کنید"
                                                                    },
                                                        fc_id:{
                                                                    required:"لطفا فاکولته را انتخاب کنید"
                                                                    }
                                                                    },
                                                 submitHandler: function(form) {
                                                                                $.ajax({
                                                                                       url:url_target,
                                                                                        type:'POST',
                                                                                        data:$('#'+form_id).serialize(),
                                                                                        success:function(data){
                                                                                                 $.ajax({
                                                                                                        url:$url,
                                                                                                        type:'POST',
                                                                                                        data:$('#'+form_id).serialize(),
                                                                                                        success:function(data){
                                                                                                                   $('#'+html_respose).html(data);
                                                                                                                   }
                                                                                                                })
                                                                                        }//success function
                                                                                })
                                                                                }
                                });//validate function   
                                }
                                else if(tp=="f"){
                                                $("#"+form_id).validate({
                                                                rules: {
                                                                    faculty_name:{
                                                                                required:true,
                                                                                minlength:2,
                                                                                maxlength:80
                                                                             },
                                                                    faculty_boss: {
                                                                                required:true,
                                                                                minlength:3,
                                                                                maxlength:80
                                                                              },
                                                                    province_id:{
                                                                                required:true
                                                                                },
                                                                    branch_name: {
                                                                                required: true,
                                                                               }
                                                                },
                                                                messages: {
                                                                    faculty_name:{
                                                                                required: "لطفا نام فاکولته را وارد کنید",
                                                                                minlength:'نام فاکولته کمتر از2 حرف بوده نمیتواند',
                                                                                maxlength:"نام فاکولته بیشتر از 80 کرکتر بوده نمیتواند"
                                                                                },
                                                                    faculty_boss:{
                                                                                required:"لطفا نام رییس را وارد کنید",
                                                                                minlength:"نام رییس نمیتواند کمتر از سه حرف باشد",
                                                                                maxlength:"نام رییس نمیتواند بیشتر از 80 حرف باشد"
                                                                                },
                                                                    province_id:{
                                                                                    required:"لطفا ولایت را انتخاب کنید"
                                                                                    },
                                                                    branch_name: {
                                                                                required: "لطفا نام شعبه را انتخاب کنید"
                                                                                },
                                                                                },
                                               submitHandler: function(form) {
                                                                                $.ajax({
                                                                                       url:url_target,
                                                                                        type:'POST',
                                                                                        data:$('#'+form_id).serialize(),
                                                                                        success:function(data){
                                                                                                 $.ajax({
                                                                                                        url:$url,
                                                                                                        type:'POST',
                                                                                                        data:$('#'+form_id).serialize(),
                                                                                                        success:function(data){
                                                                                                                   $('#'+html_respose).html(data);
                                                                                                                   }
                                                                                                                })
                                                                                        }//success function
                                                                                })
                                                                                }
                                });//validate function   
                                    }//end if
                                    else if(tp=="b"){
                                                  jQuery(function($){
                                                            $("#br_phone").mask("(0) 999 99 99 99",{placeholder:"-"});
                                                            });//---------------------------------------------------------------
                                        $("#"+form_id).validate({
                                                rules: {
                                                    br_pr:{
                                                                required:true
                                                             },
                                                    br_name:{
                                                                required:true,
                                                                minlength:3,
                                                                maxlength:80
                                                             },                
                                                    br_boss: {
                                                                required:true,
                                                                minlength:3,
                                                                maxlength:80
                                                              },
                                                    br_address: {
                                                                required: true,
                                                                minlength:10,
                                                                maxlength:256
                                                               },
                                                    br_phone: {
                                                                required: true
                                                              },
                                                     br_email: {
                                                                required: true,
                                                                email:true,
                                                                minlength:16,
                                                                maxlength:64
                                                              }
                                                },
                                                messages: {
                                                    br_pr:{
                                                                required: "لطفا ولایت را انتخاب کنید"
                                                                },
                                                     br_name:{
                                                                required:"لطفا نام شعبه را وارد کنید",
                                                                minlength:"نام شعبه نمیتواند کمتر از 3 حرف باشد",
                                                                maxlength:"نام شعبه نمتیواند بیشتر از 80 حرف باشد"
                                                                },
                                                    br_boss:{
                                                                required:"لطفا نام رییس را وارد کنید",
                                                                minlength:"نام رییس نمیتواند کمتر از سه حرف باشد",
                                                                maxlength:"نام رییس نمیتواند بیشتر از 80 حرف باشد"
                                                                },
                                                    br_address: {
                                                                required: "لطفا آدرس را وارد کنید",
                                                                minlength:"آدرس نمیتواند کمتر از 10 کرکترباشد",
                                                                maxlength:"آدرس نمیتواند بیشتر از 256 کرکترباشد"
                                                                },
                                                    br_phone: {
                                                                required: "لطفا شماره تلفون را واردکنید"
                                                                },
                                                  br_email: {
                                                                required: "لطفا ایمیل آدرس  شعبه  را وارد کنید",
                                                                email:"ایمیل آدرس درست نمی باشد",
                                                                minlength:'ایمیل آدرس نمیتواند کمتر از 10 کرکتر باشد',
                                                                maxlength:"ایمیل آدرس نمیتواند بیشتر از 64 کرکتر باشد"
                                                                }
                                                                },
                                             submitHandler: function(form) {
                                                        $.ajax({
                                                               url:url_target,
                                                                type:'POST',
                                                                data:$('#'+form_id).serialize(),
                                                                success:function(data){
                                                                         $.ajax({
                                                                                url:$url,
                                                                                type:'POST',
                                                                                data:$('#'+form_id).serialize(),
                                                                                success:function(data){
                                                                                           $('#'+html_respose).html(data);
                                                                                           }
                                                                                        })
                                                                }//success function
                                                                                })
                                                    }
                                        });//validate function
                                    }//endif
                                 }
                             }
            //when the dom has loaded setup form validation rules
            $(D).ready(function($){JQUERY4U.UTIL.setupFormValidation();});
            })(jQuery, window, document); 
}//*****************************************
function edit_branch(url_target,id_bfd,fa_id,type,form_id,extra){
                        if(type=="b"){
                                    var branch_data={branch_id:id_bfd}
                             }else if(type=="f"){
                                    var branch_data={branch_id:id_bfd,faculty_id:fa_id}
                             }
                             else if(type=="d"){
                                                var branch_data={branch_id:id_bfd,faculty_id:fa_id,department_id:extra}
                                               
                                    }//---------------------------------- 
                             $.ajax({
                                           url:url_target,
                                           type:'POST',
                                           data:branch_data,
                                           success:function(response){
                                              $("#"+form_id).html(response); 
                                           }//
                                        }); 
    
} //end of edit_branch
function load_page_pagination(target_url,html_response,starting,string)
{
    data_item = {   starting:starting,
                    province:$('#province').val(),
                    faculty:$('#faculty1').val(),
                    department:$('#faculty2').val(),
                }
   $.ajax({
                url:target_url,
                type:'POST',
                data:data_item,
                success:function(data){
                $('#'+html_response).html(data);
                }
        })   
}
