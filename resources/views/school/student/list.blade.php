@extends('school.master')
@section('title')
<title>RG School Bus Students List</title>
@stop
@section('content')
              <div class="dt_main st">
                <div class="dash_tab_2 students">
                    <div class="sticky">
                      <div class="row align-items-center">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="parent">
                            <h4>Students Management</h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="search_filter">
                            <div class="row align-items-center">
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                {{-- <div class="fill_div">
                                  <a href="javascript:void(0)"><img src="{{asset('assets/images/fil.png')}}" class="img-fluid" alt=""> </a>
                                  <input type="text" placeholder="Search">
                                  <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>   --}}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <div class="parent_table table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-left">Student Name</th>
                          <th class="text-center">Parent Name</th>
                          <th class="text-center">Driver Name</th>
                          <th class="text-center">Status</th>
                          <th class="text-right">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $student)
                        <tr>
                          <td><img src="{{asset('assets/images/tb_1.png')}}" class="img-fluid" alt=""> <span>{{$student->first_name}} {{$student->last_name}}</span></td>
                          <td class="text-center">{{$student?->parent?->first_name}} {{$student?->parent?->last_name}}</td>
                          <td class="text-center">{{$student?->driver?->first_name ??"No Driver"}} {{$student?->driver?->last_name}}</td>
                          <td class="text-center">Active</td>
                          <td class="text-right"><a href="{{url('school/student', $student->id)}}">View Details</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Modal -->
@stop
