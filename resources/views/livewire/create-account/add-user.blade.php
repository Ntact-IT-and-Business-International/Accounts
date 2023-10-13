<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form wire:submit.prevent="submit" class="m-2">
        <div class="form-group">user_types
            <div class="form-group">
                <label for="Name" class="mb-2">Name<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="name" id="Name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Email" class="mb-2">Email<span style="color:red">*</span></label>
                <input type="email" class="form-control" wire:model="email" id="Email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Name" class="mb-2">User Type<span style="color:red">*</span></label>
                    <select class="form-control form-select" id="UserType" wire:model="user_type">
                    <option>Select One</option>
                    @foreach($user_types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                    </select>
                @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Password" class="mb-2">Password<span style="color:red">*</span></label>
                <input type="password" class="form-control" wire:model="password" id="Password">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ConfirmPassword" class="mb-2">Confirm Password<span style="color:red">*</span></label>
                <input type="password" class="form-control" wire:model="confirm_password" id="ConfirmPassword">
                @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-white"> Submit</button>
                    <div wire:loading wire:target="submit" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
    </form>
</div>
