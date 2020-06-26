@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/articles" method="post" enctype="multipart/form-data" class="create-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title" class="required-label">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title">
                        @error('title')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="summary" class="required-label">Summary:</label>
                        <input type="text" name="summary" class="form-control" value="{{old('summary')}}" id="summary">
                        @error('summary')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="category_id" class="required-label">Category:</label>
                        <select type="text" name="category_id" class="form-control category"
                                data-placeholder="Select Category" id="category_id">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{old('category_id')==$category->id?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tags" class="required-label">Tags:</label>
                        <select type="text" name="tags[]" multiple class="form-control tags"
                                data-placeholder="Select Tags" id="tags]">
                            <option value=""></option>
                            @foreach($tags as $tag)
                                <option
                                    value="{{$tag->id}}"{{in_array($tag->id,old('tags',[]))?'selected':''}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 mb-1">
                    <div class="form-group">
                        <label class="required-label">Cover Image</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image"
                                   accept="image/jpeg,image/png,image/gif">
                            <label class="custom-file-label" for="cover_image">Choose Cover Image (image ratio should be
                                16/9)</label>
                        </div>
                        @error('cover_image')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="body" class="required-label">Body:</label>
                        <textarea id="body" name="body">{{old('body')}}</textarea>
                        @error('body')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-info">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css"/>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckeditor/adapters/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.category').select2({
                placeholder: $(this).attr('data-placeholder')
            });
            $('.tags').select2({
                placeholder: $(this).attr('data-placeholder'),
                tags: true,
                tokenSeparators: [',', ' ', '.']
            });
            CKEDITOR.replace('body', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.on('instanceReady', function (ev) {
                ev.editor.dataProcessor.htmlFilter.addRules({
                    elements: {
                        img: function (el) {
                            // Add bootstrap "img-responsive" class to each inserted image
                            el.addClass('img-fluid');

                            // Remove inline "height" and "width" styles and
                            // replace them with their attribute counterparts.
                            // This ensures that the 'img-responsive' class works
                            var style = el.attributes.style;

                            if (style) {
                                // Get the width from the style.
                                var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                    width = match && match[1];

                                // Get the height from the style.
                                match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                                var height = match && match[1];

                                // Replace the width
                                if (width) {
                                    el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                                    el.attributes.width = 'auto';
                                }

                                // Replace the height
                                if (height) {
                                    el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                                    el.attributes.height = 'auto';
                                }
                            }

                            // Remove the style tag if it is empty
                            if (!el.attributes.style)
                                delete el.attributes.style;
                        }
                    }
                });
            });
            $('#cover_image').on('change', function (e) {
                let file = e.target.files[0];
                $(this).parent().find('.custom-file-label').text(file.name);
            });
        });

        submitForm = (e) => {
            $('.create-form').submit();
        };
    </script>
@endpush
