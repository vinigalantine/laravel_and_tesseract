@extends('base.app') 

@section('content')
    <form id="img-form">
        <div class="row">
                <div class="col-md-4" id="preview-img-div">
                    <img src="">
                </div>
                <div class="col-md-8">
                    <input type="file" name="">
                </div>
        </div>    
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        function sendImage(){
            addLoading()
            var result = requestAjaxImage("POST","/ocr/read","img-form");
            if(result.status){
                console.log(result.data);
            }
        }
    </script>
@endsection