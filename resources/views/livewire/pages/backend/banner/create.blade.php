@extends('backend.layouts.master')

@section('title', 'Ecommerce Laravel || Banner Create')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Add Banner</h5>
        <div class="card-body">
            <form method="post" action="{{ route('banner.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <x-backend.input-label for="inputTitle" required="true" />{{ __('Title') }}</x-backend.input-label>
                    <x-backend.text-input wire:model="form.Title" id="inputTitle" class="block mt-1 w-full" type="text"
                        name="Title" required placeholder="Enter title" />
                    <x-backend.input-error :messages="$errors->get('form.title')" class="mt-2" />
                </div>
                <div class="form-group">
                    <x-backend.input-label for="description"
                        required="true" />{{ __('Description') }}</x-backend.input-label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    <x-backend.input-error :messages="$errors->get('form.description')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo"
                            value="{{ old('photo') }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div><!-- Visit 'codeastro' for more projects -->

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
