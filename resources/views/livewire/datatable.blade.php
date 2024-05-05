<div>
    {{-- @dd($model) --}}
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Start coding here -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </span>
                                <input type="text"
                                    class="form-control"
                                    placeholder="Search"
                                    required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">User Type :</span>
                                <select class="form-select">
                                    <option value="">All</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Joined</th>
                                            <th scope="col">Last Update</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td class="text-success">Admin</td>
                                            <td>Created_at</td>
                                            <td>Updated_at</td>
                                            <td>
                                                <button class="btn btn-danger">X</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
