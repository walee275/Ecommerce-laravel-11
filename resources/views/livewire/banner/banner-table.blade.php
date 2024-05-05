<div>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Start coding here -->
                    <div class="card">
                        <div class="gap-2 card-header d-flex justify-content-between align-items-center">
                            <div class="input-group flex-grow-1">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Search"
                                    wire:model.live.debounce.300ms='search' required="">
                            </div>
                            <div class="ml-4 input-group w-50">
                                <span class="input-group-text">Status :</span>
                                <select class="form-select" wire:model.live='status'>
                                    <option value="">All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($banners)
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @include('livewire.includes.table-sortable-th', [
                                                    'displayName' => 'Title',
                                                    'name' => 'title',
                                                ])
                                                @include('livewire.includes.table-sortable-th', [
                                                    'displayName' => 'Slug',
                                                    'name' => 'slug',
                                                ])
                                                <th scope="col" class="px-4 py-3 text-secondary"><button
                                                        class="bg-transparent border-0 text-secondary"
                                                        style="outline: none; box-shadow: none; cursor:default">
                                                        Description</button></th>
                                                <th scope="col" class="px-4 py-3 text-secondary"><button
                                                        class="bg-transparent border-0 text-secondary"
                                                        style="outline: none; box-shadow: none; cursor:default">
                                                        Photo </button></th>
                                                <th scope="col" class="px-4 py-3 text-secondary"><button
                                                        class="bg-transparent border-0 text-secondary"
                                                        style="outline: none; box-shadow: none; cursor:default">Status
                                                    </button></th>
                                                @include('livewire.includes.table-sortable-th', [
                                                    'displayName' => 'Created At',
                                                    'name' => 'created_at',
                                                ])
                                                @include('livewire.includes.table-sortable-th', [
                                                    'displayName' => 'Updated At',
                                                    'name' => 'updated_at',
                                                ])
                                                <th scope="col" class="px-4 py-3 text-secondary"><button
                                                        class="bg-transparent border-0 text-secondary"
                                                        style="outline: none; box-shadow: none; cursor:default">Actions
                                                    </button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $banner)
                                                <tr wire:key='{{ $banner->id }}'>
                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->slug }}</td>
                                                    <td>{!! $banner->description !!}</td>
                                                    <td>{{ asset($banner?->photo) }}</td>
                                                    <td
                                                        class="@if (strtolower($banner->status) == 'active') text-success @else text-danger @endif">
                                                        {{ $banner->status }}</td>
                                                    <td>{{ $banner->created_at->format('Y-m-D H:i:s A') }}</td>
                                                    <td>{{ $banner->updated_at->format('Y-m-D H:i:s A') }}</td>
                                                    <td>
                                                        <button class="btn btn-danger">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h5 class="text-center text-danger"> No Records Found</h5>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">Per Page</span>
                                <select class="form-select" wire:model.live='perPage'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{ $banners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
