$(function(){ 
  $body = $("body");
  $loading = $(".loading-screen");
});

// Ajax Request - if (success) { return true } else { return false }
function requestAjax(http_type,uri,data_request = []){
  var result =  $.ajax({
    type: http_type,
    url: uri,
    dataType: 'json',
    data: data_request,
    async: false
  });

  if(result.status == 200 || result.status == 201)
    return { code:result.status, data:result.responseJSON, status:true }
  else
    return { code:result.status, data:result.responseJSON, status:false }
}

function requestAjaxImage(http_type,uri,form_id){
  var formData = new FormData($('#'+form_id)[0]); 
  var result =  $.ajax({
    type: http_type,
    url: uri,
    dataType: 'json',
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    async: false
  });

  if(result.status == 200 || result.status == 201)
    return { code:result.status, data:result.responseJSON, status:true }
  else
    return { code:result.status, data:result.responseJSON, status:false }
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
      $('#'+input.id+'-prev').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}