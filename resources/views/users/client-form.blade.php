<x-app-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null; ?>
        {!! Form::model($client, ['route' => ['clients.update', $id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Client</h4>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label class="form-label">Gender:</label>
                            {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], old('gender', $client->gender), ['class' => 'form-control', 'placeholder' => 'Select Gender']) }}
                        </div>

                        <div class="form-group">
                            <label class="form-label">Date of Birth:</label>
                            {{ Form::date('date_of_birth', old('date_of_birth', $client->date_of_birth), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number:</label>
                            {{ Form::text('phone', old('phone', $client->phone), ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Client Information</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Full Name:</label>
                                    {{ Form::text('name', old('name', $client->name), ['class' => 'form-control', 'required']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-label">Email:</label>
                                    {{ Form::email('email', old('email', $client->email), ['class' => 'form-control', 'required']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-label">New Password:</label>
                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Leave blank to keep current']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-label">Confirm Password:</label>
                                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update Client</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</x-app-layout>