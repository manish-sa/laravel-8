<!doctype html>
<html>
<head>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link defer rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</head>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-primary card-outline">
                        <h3 class="card-title">Interview</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL('search') }}" method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('role', 'Role', array('class' => 'control-label font-weight-bold')) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        {!! Form::select('role[]', $roles, $request->role, ['class' => 'form-control selectpicker', 'multiple'=>'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('industry', 'Industry', array('class' => 'control-label font-weight-bold')) !!}
                                        {!! Form::select('industry[]', $industries, $request->industry, ['class' => 'form-control selectpicker', 'multiple'=>'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('sorting', 'Sorting', array('class' => 'control-label font-weight-bold')) !!}
                                        {!! Form::select('sortable', $sortable, $request->sortable, ['class' => 'form-control selectpicker']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label(' ', '&nbsp;', array('class' => 'control-label font-weight-bold')) !!}
                                    <div class="form-group">
                                        {{ Form::submit('Filter', array('class'=>'btn btn-success'))}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-responsive-lg">
                                <tr>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Score</th>
                                    <th>Role</th>
                                    <th>Industry</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->mobile}}</td>
                                        <td>{{ $user->profile_score}}</td>
                                        <td>{{ $user->role}}</td>
                                        <td>{{ $user->industry}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $users->render() }} 
                            Total Records {{ $users->total() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>