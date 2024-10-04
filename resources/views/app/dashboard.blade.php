<x-tenant-app-layout>
<main class=" bg-light mt-4">


                <div >
                    <div class="row ">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Overview</h5>
                                </div>
                                <div class="card-body">
                                    <p>This is your dashboard where you can view your site’s statistics and manage your content.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-white bg-primary mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Users</h5> 
                                            <p class="card-text mb-3">Manage your user accounts, roles, and permissions.</p>
                                            <a href="{{route('users.index')}}" class="btn btn-light">Manage Users</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title ">Roles</h5>
                                            <p class="card-text mb-3">Define and assign roles within your application.</p>
                                            <a href="{{route('roles.index')}}" class="btn btn-light">Manage Roles</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-danger mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Permissions</h5>
                                            <p class="card-text mb-3">Control access to different parts of your application.</p>
                                            <a href="{{route('permissions.index')}}" class="btn btn-light">Manage Permissions</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
</x-tenant-app-layout>
