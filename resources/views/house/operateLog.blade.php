@extends('layouts.default')

@section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('house/css/H-ui.min.css')}}" />
@stop

@section('content')

        <div class="box">
                <div class="box-body">


                        <div class="Hui-article" style="height:625px;">
                                <article class="cl pd-20">

                                        <form action="{{url('house/operateLog')}}" method="post">
                                                <span>@lang('house_translate.Operation_time')：</span>
                                                <div class="check-box">
                                                        <input type="text" name="stime" id="stime" class="form-control" value="@if(!empty($stime)){{$stime}}@endif"  style="display:inline-block"/>
                                                </div>
                                                -
                                                <div class="check-box">
                                                        <input type="text" name="etime" id="etime" class="form-control" value="@if(!empty($etime)){{$etime}}@endif" />
                                                </div>
                                                <input type="submit" class="btn btn-default" name="search" value="@lang('house_translate.search')">
                                                <div class="mt-20">
                                                        <table class="table table-border table-bordered table-bg table-hover table-sort" style="width: 80%">
                                                                <thead>
                                                                <tr class="text-c" id="theader">

                                                                        {{--<th width="">ID</th>--}}
                                                                        <th width="">@lang('house_translate.User_name')</th>
                                                                        <th width="">@lang('house_translate.Update_log')</th>
                                                                        <th width="">@lang('house_translate.Date')</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                        @foreach($result as $k=>$v)
                                                                                <tr class="text-c">
                                                                                        {{--<td>{{$v->id}}</td>--}}
                                                                                        <td>{{$v->operate_name}}</td>
                                                                                        <td>{{$v->operate}}</td>
                                                                                        <td>{{date('Y-m-d H:i:s',$v->operate_time)}}</td>
                                                                                </tr>
                                                                        @endforeach        
                                                                </tbody>
                                                        </table>
                                                </div>
                                        </form>

                                </article>
                                <!-- 分页 -->
                        </div>

                        @if (!empty($result))
                                <div class="page_list">
                                        {{$result->appends(Request::input())->links()}}
                                        <div style="display:inline-block; margin-bottom:25px;">
                                        <span class="r">@lang('house_translate.Common_data')：<strong>{{$total}}</strong> @lang('house_translate.strip')</span>
                                        </div>
                                </div>
                        @endif

                </div>
        </div>


@stop

@section('js')

        <script>
                //常规用法 日期
                laydate.render({
                        elem: '#stime'
                });
                laydate.render({
                        elem: '#etime'
                });

        </script>

@stop


