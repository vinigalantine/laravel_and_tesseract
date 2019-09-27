$(function(){ 
  $body = $("body");
  $loading = $(".loading-screen");
});

// Ajax Request - if (success) { return true } else { return false }
function requestAjax(method_request,uri,data_request = []){
  var result =  $.ajax({
    method: method_request,
    url: uri,
    dataType: 'json',
    data: data_request,
    async: false
  });

  if(result.status == 200 || result.status == 201)
    return { code:result.status, data:result.responseJSON, status:true }
  else
    return { code:result.status, data:result.responseText, status:false }
}

function requestAjaxImage(method_request,uri,id_form){
  var result =  $.ajax({
    method: method_request,
    url: uri,
    cache:false,
    processData: false,
    dataType: 'json',
    data:  new FormData($('#'+id_form)[0]),
    async: false
  });

  if(result.status == 200 || result.status == 201)
    return { code:result.status, data:result.responseJSON, status:true }
  else
    return { code:result.status, data:result.responseText, status:false }
}

// Add loading
function addLoading(){
  $loading.addClass("active");
}

// Remove loading
function removeLoading($time = 200){
  setTimeout(function(){
    $loading.removeClass("active"); 
  },$time)
}

// Create tooltips (Tooltips need this because they are opt-in)
function loadTooltip() {
  $(".tooltips").tooltip({trigger: "hover"});
}

function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#'+input.id'-img').attr('src', e.target.result);
    }
             
    reader.readAsDataURL(input.files[0]);
  }
}
  
        $(".img-prev").change(function(){
            readURL(this);
        });