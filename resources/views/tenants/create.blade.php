<x-app-layout>


<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{route('tenants.store')}}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tanent Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="domain_name" class="form-label">Domain Name</label>
                        <input type="text" class="form-control" id="domain_name" name="domain_name" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter name" />
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Tenant</button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
