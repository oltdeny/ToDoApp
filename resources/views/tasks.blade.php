@extends('layouts.app')
@section('content')
    <div class="card-body">
        @include('errors')
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group">
                    <label for="Task" class="col-sm-3 control-label">Task</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task_name" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                Add Task
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(count($completedTasks)>0 || count($currentTasks)>0)
        <div class="card">
            <div class="card-body">
                <table class="table table-stripped task-table">
                    <thead>
                    <th>Current tasks:</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach($currentTasks as $currentTask)
                            <td>
                                <td class="table-text">
                                    <div>{{$currentTask->id}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$currentTask->name}}</div>
                                </td>
                                <td>
                                    <form action="{{url('task/'.$currentTask->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>
                                <form action="{{url('update/'.$currentTask->id)}}" method="post">
                                    {{csrf_field()}}
                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="currentTask_name" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-info">
                                            Edit
                                        </button>
                                </form>
                                </td>
                                <td>
                                    <form action="{{url('complete/'.$currentTask->id)}}" method="post">
                                        {{csrf_field()}}
                                        <button class="btn btn-success">
                                            Complete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-stripped task-table">
                    <thead>
                    <th>Completed tasks:</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach($completedTasks as $completedTask)
                        <td>
                        <td class="table-text">
                            <div>{{$completedTask->id}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$completedTask->name}}</div>
                        </td>
                        <td>
                            <form action="{{url('task/'.$completedTask->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{url('complete/'.$completedTask->id)}}" method="post">
                                {{csrf_field()}}
                                <div style="color: #1c7430">
                                    Completed
                                </div>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
