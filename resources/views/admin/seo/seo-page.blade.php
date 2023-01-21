@extends('admin.layout')
@section('content')

<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Update Property
                <span class="txb-color">Meta's</span>
            </h5>
        </div>
        <div class="form-main-wrap px-5 py-4">
            <div class="form" class="w-100 mt-5 form-steps-main" method="POST" id="form">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="seo-p-heading">
                               <b>Property ID</b>
                            <div class="seo-p-title"> {{$property->id}} </div> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="seo-p-heading">
                               <b>Property Title</b>
                            <div class="seo-p-title"> {{$property->name}} </div> 
                        </div>
                    </div>
                    <div class="col-md-12 my-2 mb-4">
                        <div class="seo-p-heading">
                               <b>Property Description</b>
                            <div class="seo-p-title"> {{$property->description}} </div> 
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                SEO Title
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" id="title" name="name" @if(!empty($seo)) value="{{$seo->seo_title}}" @endif />
                                <div class="position-absolute field-icon d-flex align-items-center justify-content-center">
                                    <i class="bi bi-card-heading"></i>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                SEO Tags / Keywords
                            </label>
                            <div class="position-relative">
                                <input type="text" class="w-100" id="tags" name="name" @if(!empty($seo)) value="{{$seo->seo_keyword}}" @endif />
                                <div class="position-absolute field-icon d-flex align-items-center justify-content-center">
                                    <i class="bi bi-card-heading"></i>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 mt-3">
                        <div class="form-elements-wrap">
                            <label class="f-medium mb-2">
                                SEO Description
                            </label>
                            <div class="position-relative">
                                <textarea class="w-100 d-block" id="description" cols="4" rows="6" @if(!empty($seo)) value="{{$seo->seo_description}}" @endif> @if(!empty($seo)) {{$seo->seo_description}} @endif </textarea>
                                <div class="output-img d-flex flex-wrap border mt-2 pt-2 px-2 d-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 mt-4">
                        <div class="ms-auto form-submit-btn">
                            <button type="submit" class="border-0 f-medium rounded-btn px-3 py-2 bg-theme text-white" onclick="updateSEODetails({{$property->id}})">
                                Update
                            </button>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
    // updateSeoDetails
    function updateSEODetails(id){
        var title = $('#title').val();
        var tags = $('#tags').val();
        var description = $('#description').val();
        postData = {
            "_token": "{{ csrf_token() }}",
            'id': id,
            'title': title,
            'tags': tags,
            'description': description,
        }
        $.ajax({
            url: "{{ route('admin.update.seo.details') }}",
            data: postData,
            type: 'POST',
            success: function(res) {
                swal({
                    title: `SEO, Details Successfully Updated`,
                    icon: "success",
                    buttons: true,
                    dangerMode: false,
                })
            },
            error: function (jqXHR, exception) {
                displayErrors(jqXHR, exception);
            }
        });
    }
</script>
@endpush