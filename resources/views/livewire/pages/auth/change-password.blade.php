<x-app-layout title="Change Password">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change Password</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <x-backend.alert-message />

                            <div class="form-group row">
                                <x-backend.input-label for="current-password"
                                    class="col-md-4 col-form-label text-md-right" :value="__('Current Password')" />

                                <div class="col-md-6">
                                    <x-backend.text-input wire:model="current_password" id="current-password"
                                        class="form-control" type="password" name="current_password" required
                                        autocomplete="current-password" />
                                    <x-backend.input-error :messages="$errors->get('current_password')" class="mt-2" />

                                </div>
                            </div>

                            <div class="form-group row">
                                <x-backend.input-label for="new-password" class="col-md-4 col-form-label text-md-right"
                                    :value="__('New Password')" />

                                <div class="col-md-6">
                                    <x-backend.text-input wire:model="new_password" id="new-password"
                                        class="form-control" type="password" name="new_password" required
                                        autocomplete="new-password" />
                                    <x-backend.input-error :messages="$errors->get('new_password')" class="mt-2" />

                                </div>
                            </div>

                            <div class="form-group row">
                                <x-backend.input-label for="new-confirm-password"
                                    class="col-md-4 col-form-label text-md-right" :value="__('New Confirm Password')" />

                                <div class="col-md-6">
                                    <x-backend.text-input wire:model="new_confirm_password" id="new-confirm-password"
                                        class="form-control" type="password" name="new_confirm_password" required
                                        autocomplete="new-password" />
                                    <x-backend.input-error :messages="$errors->get('new_confirm_password')" class="mt-2" />

                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
