<!doctype html>
<html>
<head>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                    <th>{{ Form::checkbox(null, null, '', array('id'=>'select-all')) }}</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Score</th>
                                    <th>Role</th>
                                    <th>Industry</th>
                                    <th>Views</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ Form::checkbox(null, $user->id, null, array('class'=>'view-user')) }}</th>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->mobile}}</td>
                                        <td>{{ $user->profile_score}}</td>
                                        <td>{{ $user->role}}</td>
                                        <td>{{ $user->industry}}</td>
                                        <td>{{ $user->views}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $users->appends(Request::except('page'))->render() !!}
                            Total Records {{ $users->total() }}
                            <div class="form-group">
                                {{ Form::button('Mark as View', array('class'=>'btn btn-success mark-view'))}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-all').change(function() {
            if($(this).is(':checked')){
                $('.view-user').prop('checked', true);
            }else{
                $('.view-user').prop('checked', false);
            }
        });

        $(".mark-view").click(function(){
            var ids = [];
            $(".view-user:checked").each(function(){
                ids.push($(this).val());
            });

            if(ids.length == 0){
                toastr.error('Please select one record');
                return false;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{url('/mark_view_user')}}",
                type: "POST",
                dataType: 'json',
                data: {"ids[]" : ids, _token: '{{csrf_token()}}'},
                success: function(res) {
                    if(res.success){
                        toastr.success('Success!!');
                        location.reload();                       
                    }else{
                        toastr.error('Something want wrong');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    toastr.error('Something want wrong');
                }
            });
        });
    })
</script>