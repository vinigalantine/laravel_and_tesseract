@extends('base.app') 

@section('css')
    <style type="text/css">
        .img-div{
            align-content: right;
        }

        .img-div img{
            width: 200px;
            height: 200px;
            line-height: 200px;
        }

        .erro-font-size{
            font-weight: bold;
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Laravel & Tesseract OCR</h3>
        </div>
        <div class="card-body">
            <form id="ocr-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3 img-div d-flex justify-content-end">
                        <div class="p-2">
                            <img src="{{ asset('img/default.png') }}" id="input-img-prev">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <div class="p-2">
                            <input class="form-control-file input-img" id="input-img" type="file" name="image_to_read" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="p-2 col-md-3">
                        <button type="button" id="submitImg" class="btn btn-success" onclick="sendImage()">Enviar</button>
                    </div>
                </div>    
            </form>
            <div class="row">
                <h4 style="text-align: center; width: 100%;">Texto recuperado:</h4>
                <div class="col-md-4"></div>
                <div class="col-md-4" id="ocr-response" style="text-align: center;">

                </div>
                <div class="col-md-4"></div>
            </div>  
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        function sendImage(){
            addLoading();
            var result = requestAjaxImage("POST","/ocr/read","ocr-form");
            if(result.status){
                clearErrorMsg();
                $('#ocr-response').html(result.data.text);
                removeLoading();
            } else {
                $('#ocr-response').addClass('text-danger erro-font-size')
                $('#ocr-response').html(result.data.message);
                removeLoading();
                setTimeout(function(){
                    clearErrorMsg();
                },3000);
            }
        }

        function clearErrorMsg(){
            $('#ocr-response').removeAttr('style');
            $('#ocr-response').removeClass('text-danger erro-font-size')
            $('#ocr-response').html("");
        }


        $(".input-img").change(function(){
            previewImage(this);
        });
    </script>
@endsection