

<form wire:submit.prevent='submit'>
    @csrf
    <x-backend.alert-message  />
    <div class="form-group">
        <x-backend.input-label for="title" required="true" value="{{ __('Title') }}" />
        <x-backend.text-input wire:model="title" id="title" class="shadow-sm form-control" type="text" name="title"
            required placeholder="Enter title" value="{{ $title }}" />
        @error('title')
            <x-backend.input-error :messages="$message" class=" text-danger" />
        @enderror
    </div>
    <div class="form-group">
        <x-backend.input-label for="description" required="true" value="{{ __('Description') }}" />
        <div wire:ignore>
            <textarea class="form-control" id="description" wire:model='description'>{{ $description }}</textarea>
        </div>
        @error('description')
            <x-backend.input-error :messages="$message" class=" text-danger" />
        @enderror
    </div>

    <div class="form-group">
        <x-backend.input-label for="photo" required="true" value="{{ __('Photo') }}" />
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <x-backend.text-input wire:model="photo" id="photo" class="shadow-sm form-control" type="text"
                name="photo" required placeholder="Enter path to the Picture" value="{{ $photo }}" />
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        @error('photo')
            <x-backend.input-error :messages="$message" class="text-danger" />
        @enderror

    </div>

    <div class="form-group">
        <x-backend.input-label for="status" required="true" value="{{ __('Status') }}" />
        <x-backend.select-input wire:model='status' :options="['' => 'Select an option', 'active' => 'Active', 'inactive' => 'Inactive']" :selected="$status" />

        @error('status')
            <x-backend.input-error :messages="$message" class="text-danger" />
        @enderror
    </div>
    <div class="mb-3 form-group">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
</form>

@push('scripts')
    <script>
        // $(document).ready(function() {
            $('#description').summernote({
                    placeholder: "Write short description.....",
                    tabsize: 2,
                    height: 150,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('description', contents);
                        }
                    }
                // });
            // Livewire.hook('afterFirstRender', () => {
            //     $('#description').summernote({
            //         placeholder: "Write short description.....",
            //         tabsize: 2,
            //         height: 150,
            //         callbacks: {
            //             onChange: function(contents, $editable) {
            //                 @this.set('description', contents);
            //             }
            //         }
            //     });
            // });
        });
    </script>
@endpush

